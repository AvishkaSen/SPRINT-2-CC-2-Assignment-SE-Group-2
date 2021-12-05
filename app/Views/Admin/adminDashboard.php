<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FutureSeekers</title>
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/background.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/nav.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/home.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/footer.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>


    <body>

        <!--Nav -->
        <header>
            <h1 class="heading">FutureSeekers</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="<?php echo base_url('Home/home')?>">Home</a></li>
                    <li><a href="<?php echo base_url('Admin/index')?>">Dashboard</a></li>
                    <li><a href="<?php echo base_url('Admin/users')?>">Users</a></li>
                    <li><a href="<?php echo base_url('Admin/ads')?>">Job Adverts</a></li>
                    <li><a href="">Reports</a></li>
                    <li><a href="<?php echo base_url('myProfile/index')?>">My Profile</a></li>
                </ul>
            </nav>
            <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->
        </header>


        <div class="bx1 p-5">
            <div>
                <img style="margin-left:50px;" src="<?php echo base_url('/assets/img/admin.png') ?>" alt="bg-img">
            </div>

            <div class="cnt1">
                <span class="admin-head">Administrator Controls</span>

                <div class="dashboard">
                    <a href="<?php echo base_url('myProfile/index')?>" class="btn">My Profile</a>
                    <a href="<?php echo base_url('Admin/users')?>" class="btn">User Management</a>
                    <a href="<?php echo base_url('Admin/ads')?>" class="btn">Advertisement Management</a>
                    <a href="#" class="btn">Reports (Lorem ipsum)</a> 
                </div>

            </div>
        </div>


        <!-- Footer -->
        <footer>
            <div class="row">
            <div class="col desc">
                <h2 class="logo">FutureSeekers</h2>
                <p>Best website to browse and find the perfect job offers suiting your qualifications and career goals</p>
            </div>
            <div class="col location">
                <h3 class="head">Visit us at</h3>
                <p>No. 388 Union Pl,</p>
                <p>Colombo,</p>
                <p>00200.</p>
                <p>0117 675 100</p>
            </div>
            <div class="col socials">
                <h3 class="head">Social Media</h3>
                <ul class="col-s">
                    <li><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
                    <li><i class="fa fa-linkedin-square" aria-hidden="true"></i></li>
                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter-square" aria-hidden="true"></i></li>
                </ul>
            </div>
            <div class="col link">
            <h3 class="head">Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career Details</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            </div>
            <p class="copyright"><i class="fa fa-copyright" aria-hidden="true"></i> 2021 Group 2 Avishka . Dilki . Siduja . Yahya </p>
        </footer>
    </body>
</html>



