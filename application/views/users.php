<?php include("front/dashboardheader.php") ?>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
        <h1>COADMIN DASHBOARD</h1><hr>
        <?php  $username = $this->session->userdata('username');?>
        <h3>WELLCOME <?php echo $username?></h3><hr>

        <div class="row mt-4">        
        <table class="table table-striched table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>College Name</th>
            <th>Email</th>            
            <th>Gender</th>
            <th>Course</th>
        </tr>
        </thead>
        <tbody>
            <?php  if (count($student)):?>            
                <?php  foreach($student as $std):?>
            <tr>
                <td><?php  echo $std->id;?></td>
                <td><?php echo $std->studentname;?></td>
                <td><?php echo $std->collegename;?></td>                
                <td><?php echo $std->email;?></td>                
                <td><?php  echo $std->gender;?></td>
                <td><?php echo $std->course;?></td>
                
            </tr>
            <?php endforeach;?>
            <?php else:?>
                <td>No recored exist.</td>
            <?php endif;?>
        </tbody>
        </table>
        </div>
        </div>
<?php include("front/footer.php") ?>