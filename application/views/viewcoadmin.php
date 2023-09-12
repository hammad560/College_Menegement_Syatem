<?php include("front/dashboardheader.php") ?>
<div class="container mt-4 bg-secondery">
    <div class="jumbotron">
        <h1>VIEW COADMINS</h1><hr>
        <?php $username = $this->session->userdata('username');?>
        <h3>WELLCOME <?php echo $username?></h3><hr>
        <div class="row mt-4">        
        <table class="table table-striched table-hover">
        <thead>
        <tr>
            <th class="bg-info text-light">ID</th>
            <th class="bg-info text-light">CoAdmin Name</th>
            <th class="bg-info text-light">College Name</th>            
            <th class="bg-info text-light">Email</th>            
            <th class="bg-info text-light">Gender</th>
            <th class="bg-info text-light">Branch</th>            
        </tr>
        </thead>
        <tbody>
            <?php if (count($users)):?>
                <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $user->college_id;?></td>
                <td><?php echo $user->username;?></td>
                <td><?php echo $user->collegename;?></td>                
                <td><?php echo $user->email;?></td>                
                <td><?php echo $user->gender;?></td>
                <td><?php echo $user->branch;?></td>                
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