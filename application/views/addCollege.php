<?php include("front/header.php") ?>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
        <h1>ADD COLLEGE</h1>
        <hr>
        <form action="<?php echo base_url() . 'admin1/createCollege' ?>" class="form-horizontal" method="post">
        <?php if($msg = $this->session->flashdata('message')): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-dismissible alert-success">
                    <?php echo $msg;?>
                    </div>
                </div>
            </div>
            <?php endif;?>            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="Email" class="col-md-3">College Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="collegename" placeholder="Enter collegename"  value="<?php echo set_value('collegename'); ?>" />
                            <?php echo form_error('collegename', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="" class="col-md-3">Branch</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="branch" placeholder="Enter Branch"  value="<?php echo set_value('branch'); ?>"/>
                            <?php echo form_error('branch', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="col-md-3">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <!-- these name come from db -->
                            <option value="">Select</option>
                            <?php if (count($roles)):?>                                                            
                                <?php foreach ($roles as $roles): ?>
                                    <option  value="<?php echo $roles->id; ?>"><?php echo $roles->name; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php echo form_error('role_id', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-4">ADD</button>
            <td><a href="<?php echo base_url().'admin1/dashboard/'?>" class="btn btn-dark">Back</a></td>                            
        </form>
    </div>
</div>
<?php include("front/footer.php") ?>