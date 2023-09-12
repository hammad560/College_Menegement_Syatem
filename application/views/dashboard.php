<?php include("front/dashboardheader.php") ?>
<style>
</style>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
        <h1 class="">ADMIN DASHBOARD</h1><hr>
        <?php $username = $this->session->userdata('username');?>
        <h3>WELLCOME <?php echo $username?></h3><hr>
        <a href="<?php echo base_url().'admin1/addCollege'?>" class="btn btn-secondary mt-3">ADD COLLEGE</a>
        <a href="<?php echo base_url().'admin1/addCoadmin'?>" class="btn btn-secondary mt-3">ADD COADMIN</a>
        <a href="<?php echo base_url().'admin1/addstudent'?>" class="btn btn-secondary mt-3">ADD STUDENT</a>

        <div class="row mt-4">        
        <table class="table table-striched table-hover ">
        <thead>
        <tr>
            <th class="bg-info text-light">ID</th>
            <th class="bg-info text-light">College Name</th>
            <th class="bg-info text-light">Username</th>
            <th class="bg-info text-light">Email</th>
            <th class="bg-info text-light">Role</th>
            <th class="bg-info text-light">Gender</th>
            <th class="bg-info text-light">Branch</th>
            <th class="bg-info text-light">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php if (count($users)):?>
                <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $user->college_id;?></td>
                <td><?php echo $user->collegename;?></td>
                <td><?php echo $user->username;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->name;?></td>
                <td><?php echo $user->gender;?></td>
                <td><?php echo $user->branch;?></td>
                <td><a href="<?php echo base_url().'admin1/viewstudent/'.$user->college_id;?>" class="btn btn-warning">View Students</a></td>                
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