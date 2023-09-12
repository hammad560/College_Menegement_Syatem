<?php include("front/dashboardheader.php") ?>        
<div class="container mt-4 bg-secondery">
<td><a href="<?php echo base_url().'admin1/dashboard/'?>" class="btn btn-dark">Back</a></td>                    
        <div class="row mt-4">        
        <table class="table table-striched table-hover">
        <thead>
        <tr>
            
            <th class="bg-info text-light">Student Name</th>
            <th class="bg-info text-light">Colllege Name</th>
            <th class="bg-info text-light">Course</th>
            <th class="bg-info text-light">Email</th>            
            <th class="bg-info text-light">Gender</th>
            <th class="bg-info text-light">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php if (count($students)):?>
                <?php $count = 1; ?>
                <?php foreach($students as $student):?>
            <tr>
                <td><?php echo $student->studentname;?></td>
                <td><?php echo $student->collegename;?></td>
                <td><?php echo $student->course;?></td>
                <td><?php echo $student->email;?></td>
                <td><?php echo $student->gender;?></td>
                <td><a href="<?php echo base_url().'admin1/editStudent/'.$student->id;?>" class="btn btn-primary">EDIT</a>                
                <a href="<?php echo base_url().'admin1/deletestudent/'.$student->id;?>" class="btn btn-danger">DELETE</a></td>                
            </tr>
            <?php endforeach;?>
            <?php else:?>
                <td>No recored exist.</td>
            <?php endif;?>
        </tbody>
        </table>
        </div>
        <?php if($msg = $this->session->flashdata('message')): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-dismissible alert-success">
                    <?php echo $msg;?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
<?php include("front/footer.php") ?>