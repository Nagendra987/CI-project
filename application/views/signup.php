<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div style="width: 430px;">
    	<form class="shadow w-500 p-3" action="<?php echo base_url().'singup'; ?>" method="POST" enctype="multipart/form-data">

    		<h4 class="display-4  fs-1">Create Account</h4><br>
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
		  <div class="mb-3">
		    <label class="form-label"> Name</label>
		    <input type="text" class="form-control" name="name" >
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" class="form-control" name="email">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" name="password">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Profile Picture</label>
		    <input type="file"  class="form-control" name="profile">
		  </div>

		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <a href="<?php echo base_url().''; ?>" class="link-secondary">Login</a>
		</form>
    </div>
    </div>
</body>
</html>