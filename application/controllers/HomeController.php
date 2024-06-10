<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct() {

        parent::__construct();

    }

   public function singup(){
       if($this->input->post()){
        $postData = $this->input->post();
        $postData['password']= md5($this->input->post('password'));

    
        $file=$_FILES['profile']['name'];
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('profile')) {
        $error = array('error' => $this->upload->display_errors());
        } else {
        $data = $this->upload->data();
        $file_name = $data['file_name'];
        $postData['profile'] = base_url().'assets/uploads/'.$file_name;
        }
        $Check_Insert = $this->User_Model->inserData('users',$postData);
        if($Check_Insert){
        $this->session->set_flashdata('succ'," Singup  Successfully!");
        redirect('singup');

        }
        else{
        $this->session->set_flashdata('err'," Singup Error!");
        redirect('singup');
        }
        redirect('singup');
        }
        $this->load->view('signup');

        }
        public function logout() {
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->sess_destroy();
            redirect('/');
          }

    public function index(){
      if($this->input->post()){
        $postData = $this->input->post();
        $postData['password']= md5($this->input->post('password'));
        $email = $postData['email'];
        $user = $this->User_Model->getData('users',array('email'=>$email));
        if(!empty($user)){
        if($user[0]['password'] == $postData['password']){
           $this->session->set_userdata('userId',$user[0]['id']);
           $this->session->set_userdata('user_email',$user[0]['email']);
           redirect('dashboard');
        }else{
			$this->session->set_flashdata('err'," Incorrect  password!");
            redirect('/');
        }
    }else{

    }
       $this->session->set_flashdata('err'," Singup Error!");
        }else{
            $this->load->view('index');
        }

    }
    
    public function dashboard(){
      if(!empty($this->session->userdata('userId')))
      {
       $userId= $this->session->userdata('userId');
        $data['user'] = $this->User_Model->getData('users',array('id'=>$userId));
    
        $this->load->view('welcome',$data);
        }else{
            redirect('logout');
        }

    }
    public function edit_profile(){

        if($this->input->post()){
            $userId= $this->session->userdata('userId');
            $postData = $this->input->post();
            $postData['password']= md5($this->input->post('password'));

            $file=$_FILES['profile']['name'];
            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('profile')) {
            $error = array('error' => $this->upload->display_errors());
            } else {
            $data = $this->upload->data();
            $file_name = $data['file_name'];
            $postData['profile'] = base_url().'assets/uploads/'.$file_name;
            }
            $Check_Update = $this->User_Model->updateTable('users',$postData,array('id'=>$userId));
            if($Check_Update){
    
            $this->session->set_flashdata('succ'," Singup  Successfully!");
            redirect('edit-profile');
    
            }
            else{
            $this->session->set_flashdata('err'," Singup Error!");
            }
            redirect('edit-profile');
            }
        if(!empty($this->session->userdata('userId')))
        {
         $userId= $this->session->userdata('userId');
          $data['user'] = $this->User_Model->getData('users',array('id'=>$userId));
          $this->load->view('edit_profile',$data);
          }else{
              redirect('logout');
          }
    }

    public function search(){
        if(!empty($this->session->userdata('userId')))
        {
            if($this->input->post()){
               $q =  $this->input->post('q') ;
         $images = $this->get_images($q);
          $this->load->view('view_images',array('data'=>$images['hits']));
    }else{
        redirect('dashboard');
    }
    }else{
        redirect('logout');
    }
    }
    

 public function get_images($q){

$url = "https://pixabay.com/api/?key=35518616-bb9895e30edcd0507ede5229b&q=".$q."&image_type=photo";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}

curl_close($curl);

return json_decode($response,TRUE);
}


 }

   

