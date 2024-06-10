<?php $this->load->view('includes/header.php'); ?>
<?php 
foreach($data as $key=>$value){
?>
<img src="<?= $data[$key]['largeImageURL'];?>" alt="image" style="width: 400px;">
<?php } ?>  