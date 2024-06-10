<?php
$this->load->view('includes/header.php'); 
?>
<div style="margin-top: 30px;margin-left:30px;">
<?php
if($user){
foreach($user as $value){
?>
<h3> Welcome, <?= $value['name']??NULL;?></h3> 
<?php }} ?>

