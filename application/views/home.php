<?php include("front/header.php") ?>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
     <h1>ADMIN AND CO-ADMIN LOGIN</h1><hr>
    <div class="row">
    <?php if ($checkAdminExit > 0): ?>

<?php else: ?>
    <div class="col-lg-4">
        <a href="<?php echo base_url().'admin/adminregistration'?>" class="btn btn-primary">ADMIN REGISTER</a>
    </div>
<?php endif; ?>


    <div class="col-lg-4">
        <a href="<?php echo base_url().'admin/login' ?>" class="btn btn-primary">ADMIN LOGIN</a>
    </div>
    </div>
    </div>
</div>
<?php include("front/footer.php") ?>