<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vega 6 Task</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	<div style="width: 430px;">
    	<form class="shadow w-450 p-3" 
    	      action="<?= base_url();?>" 
    	      method="post">

    		<h4 class="display-4  fs-1">LOGIN</h4><br>
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
		    <label class="form-label">User name</label>
		    <input type="email" class="form-control" name="email" name="Enter Email" >
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" name="password" class="form-control" name="pass">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Login</button>
		  <a href="<?php echo base_url().'singup'; ?>" class="link-secondary">Sign Up</a>
		</form>
    </div>
    </div>
</body>
</html>