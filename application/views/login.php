<?php include("front/header.php") ?>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
        <h1>ADMIN LOGIN</h1>
        <hr>
        <form action="<?php echo base_url() . 'admin/signin' ?>" class="form-horizontal" method="post">
        <?php if($msg = $this->session->flashdata('message')): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-dismissible alert-danger">
                    <?php echo $msg;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="Email" class="col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" placeholder="Enter email"  value="<?php echo set_value('email'); ?>" />
                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="" class="col-md-3">password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Enter password"  value="<?php echo set_value('password'); ?>"/>
                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-4">LOGIN</button>
            <a href="<?php echo base_url() . 'admin' ?>" class="btn btn-dark">Back</a>
        </form>
    </div>
</div>
<?php include("front/footer.php") ?>