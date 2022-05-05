<?php 
include_once('controllers/AuthenticationController.php');

$data = $authenticated->authUserDetail();

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">

        <?php include('message.php') ?>
      
        <h1>My profile Page</h1>
        <hr>
        <h4>Full Name :  <?= $data['nom'].' '.$data['prenom']; ?></h4>
        <h4>Email :  <?= $data['email']; ?></h4>
        <h5>Created at :  <?= date('d-m-Y', strtotime($data['created_at'])); ?></h5>
        

    </div>
</div>


<?php 
include('includes/footer.php');
?>