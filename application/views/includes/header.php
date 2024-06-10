<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="margin-left:50px ;">
        <a class="navbar-brand" style="color: white;" href="<?php echo base_url().'dashboard'?>">Dashboard</a>
        </li>
      </ul>
      <form class="d-flex" action="<?= base_url().'search';?>" method="POST" >
        <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav" style="margin-left: 30px;">
      <?php
           $userId= $this->session->userdata('userId');
            $data = $this->User_Model->getData('users',array('id'=>$userId));
            foreach($data as $key=>$value){
              ?>
        <li class="nav-item">
          <?php $profile=$data[$key]['profile']??NULL;
          if(!empty($profile)) {?>
          <img src="<?= $profile??NULL;?>" id="blah" class="img img-circle rounded-circle mb-2" alt="AM.jpeg" width="40px" height="40px"> </img>
          <?php
          }
          else{
            ?><img src="<?php echo base_url().'/assets/uploads/user.png'?>" id="blah" class="img img-circle rounded-circle mb-2" alt="AM.jpeg" width="40px" height="40px"> </img><?php
          }
          ?>
          </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
          <?= $data[$key]['name']??NULL;?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -72px;">

            <li><a class="dropdown-item" href="<?php echo base_url().'edit-profile'?>">Profile</a></li>
         <?php } ?>
            <li><a class="dropdown-item" href="<?php echo base_url().'logout'?>">Logout</a></li>
          </ul>
        </li>  
      </ul>
   
    </div>
  </div>
</nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>