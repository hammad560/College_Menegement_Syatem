<?php include("front/dashboardheader.php") ?>
<div class="container mt-4 bg-secondery">    
    <div class="jumbotron">    
        <h1>EDIT STUDENT </h1>
        <hr>
        <form action="<?php echo base_url('admin1/modifyStudent/' . $studentdata->id) ?>" class="form-horizontal" method="post">
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
                        <label for="Username" class="col-md-3">Student Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="studentname" placeholder="Enter username"  value="<?php echo set_value('studentname', $studentdata->studentname); ?>" />
                            <?php echo form_error('studentname', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="col-md-3">College</label>
                        <select name="college_id" id="role_id" class="form-control">
                        <option value=<?php echo $studentdata->college_id?>><?php echo $studentdata->collegename?></option>
                            <!-- these name come from db -->                    
                            <?php  if (count($college)): ?>
                                <?php  foreach ($college as $college): ?>
                                    <option  value="<?php echo $college->college_id; ?>"><?php echo $college->collegename ; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php echo form_error('college_id', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Gender" class="col-md-3">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value=<?php echo $studentdata->gender;?>><?php echo $studentdata->gender;?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="Email" class="col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" placeholder="Enter email"  value="<?php echo set_value('email', $studentdata->email); ?>" />
                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="course" class="col-md-3">Course</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="course" placeholder="Enter course"  value="<?php echo set_value('course', $studentdata->course); ?>" />
                            <?php echo form_error('course', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <td><a href="<?php echo base_url().'admin1/dashboard/'?>" class="btn btn-dark">Back</a></td>                            
        </form>
    </div>
</div>
<?php include("front/footer.php") ?>