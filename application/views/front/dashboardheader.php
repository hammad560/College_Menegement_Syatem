<!DOCTYPE html>
<html lang="en">
<head>
    <title>College Management System</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <!-- Other meta tags, title, etc. -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- At the bottom of the <body> section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="<?php echo base_url().'assets/js/bootstrap..min.js'?>"></script>
    <script src="<?php echo base_url().'assets/jquery.min.js'?>"></script>    
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <h2 class="text-light">College Management System</h2>
            <div class="dropdown">
    <button class="btn btn-light dropdown-toggle mr-4" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        SETTING |
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php 
               $user_id = $this->session->userdata("role_id");
               if($user_id == '1'):
        ?>
        <li><a class="dropdown-item" href="<?php echo base_url().'admin1/dashboard'?>">DASHBOARD</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url().'admin1/coadmin'?>">VIEW COADMIN</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url().'admin/logout'?>">LOGOUT</a></li>
        <?php else:?>
            <li><a class="dropdown-item" href="<?php echo base_url().'admin/logout'?>">LOGOUT</a></li>
        <?php endif;?>
    </ul>
</div>
            </div>
    </nav>
 

    