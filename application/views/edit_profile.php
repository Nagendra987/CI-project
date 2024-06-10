<?php
$this->load->view('includes/header.php'); 
?>
<div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3"  action="<?php echo base_url().'edit-profile'; ?>" method="post" enctype="multipart/form-data">
        <a href="<?php echo base_url().'dashboard'; ?>" type="submit" class="btn btn-primary">Update</a>

            <h4 class="display-4  fs-1" style="margin-left: 80px;">Edit Profile</h4><br>
            <?php $msg = FALSE;
				  $class = NULL;
			     if($this->session->flashdata('err'))
					{
					$msg = $this->session->flashdata('err');
					$this->session->set_flashdata('err',NULL);
					$class = "alert alert-danger";
					}
					else if($this->session->flashdata('succ'))
					{
					$msg = $this->session->flashdata('succ');
					$this->session->set_flashdata('succ',NULL);
					$class = "alert alert-success";
					}
					?>
					<?php if($msg) { ?>
					<div class="<?php echo $class; ?> alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> <?php echo $msg; ?>
						</div>
						<?php } ?>
            <?php if($user){
              foreach($user as $val){?>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"  class="form-control" name="name" value="<?= $val['name']??NULL?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text"  class="form-control" name="email" value="<?= $val['email']??NULL?>">
          </div>  

          <div class="mb-3">
            <label class="form-label">Password</label>  
            <input type="password"  class="form-control" name="password" value="<?= $val['password']??NULL?>">
          </div>
          <div class="mb-3">
		    <label class="form-label">Profile </label>
		    <input type="file"  class="form-control" name="profile" value="<?= $val['profile']??NULL?>">
		  </div>
          <?php 
          }
          }
          ?>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>