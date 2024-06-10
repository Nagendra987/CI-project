<?php
class User_Model extends CI_Model {
    public function __construct() {
        parent::__construct();    
    }

	function inserData($tablename,$data=array()){
        $this->db->insert($tablename,$data);
        return $this->db->insert_id();
    }
	function getData($tablename,$condition=array()){
        $this->db->select('*');
         $this->db->from($tablename);
         $this->db->where($condition);
         $query= $this->db->get();
        return $query->result_array();
    }
    
    public function updateTable($tableName, $updateDate=array(), $condition){
        $this->db->where($condition);
        $this->db->update($tableName, $updateDate);
        $affectedRows = $this->db->affected_rows();
        if($affectedRows>0){
            return true;
        }
        else{
            return false;
        }
    }
}
