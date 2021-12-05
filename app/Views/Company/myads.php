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
    <!-- <link rel="stylesheet" href="<?php echo base_url('/assets/css/createad.css') ?>">-->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/footer.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>

    /* For error message echoed in deleteAccounts file in Controller*/
    .alert2 {
        padding: 20px;
        background-color: green;
        color: white;
        text-align: center;
    }

</style>

<body>

<header>
        <h1 class="heading">FutureSeekers</h1>

        <nav>
            <ul class="nav-links">
                <li><a href="<?php echo base_url('Home/home')?>">Home</a></li>
                <li><a href="<?php echo base_url('Postings/index')?>">My Adverts</a></li>
                <li><a href="<?php echo base_url('Createad/index')?>">Create Job Advert</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="<?php echo base_url('myProfile/index')?>">My Profile</a></li>
            </ul>
        </nav>
        <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->
    </header>
    
    <!-- ~~~~~~~ APPROVED JOB ADVERTS ~~~~~~ -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border border-dark p-5">
                    <div class="card-header">
                        <h4>Your Advertisements</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Advert ID</th>
                                    <th>Job Title</th>
                                    <th>Job Position</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>EDIT</th>
                                    <th>REMOVE</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    session();

                                    $adsModel = new \App\Models\adModel;
                                    //$user = session() -> get('Email'); // Gets the user ID from the session
                                    $userID = session() -> get('UserID'); // Gets the user ID from the session

                                    // Runs query to get approved ads of the user
                                    $query = $adsModel -> query("SELECT * FROM adverts WHERE advertowner = '$userID' AND approved = 'Yes'"); 

                                    foreach ($query -> getResult() as $row){

                                ?>
                                    <tr>
                                        <td><?php echo $row -> id ?></td>
                                        <td><?php echo $row -> jobname ?></td>
                                        <td><?php echo $row -> position ?></td>
                                        <td><?php echo $row -> category ?></td>
                                        <td><?php echo $row -> description ?></td>

                                        <td>
                                            <a href="<?php echo base_url('Postings/jobDetailsPage/'.$row -> id)?>" class="btn btn-outline-success float-end btn-sm">Edit</a>
                                        </td>

                                        <td>
                                            <a href="<?php echo base_url('Createad/delete/'.$row -> id)?>" class="btn btn-outline-danger float-end btn-sm">Delete</a>
                                        </td>
                                        
                                    </tr>
                                <?php
                                 } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ~~~~~~~ ADVERTS AWAITING APPROVAL ~~~~~~ -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border border-dark p-5 ">
                    <div class="card-header">
                        <h4>Advertisements Awaiting Approval</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Advert ID</th>
                                    <th>Job Title</th>
                                    <th>Job Position</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Remove</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    session();

                                    $adsModel = new \App\Models\adModel;
                                    $user = session() -> get('Email'); // Gets the user ID from the session

                                    // Runs query to get unapproved ads of the user
                                    $query = $adsModel -> query("SELECT * FROM adverts WHERE advertowner = '$userID' AND approved = 'No'"); 

                                    foreach ($query -> getResult() as $row){

                                ?>
                                    <tr>
                                        <td><?php echo $row -> id ?></td>
                                        <td><?php echo $row -> jobname ?></td>
                                        <td><?php echo $row -> position ?></td>
                                        <td><?php echo $row -> category ?></td>
                                        <td><?php echo $row -> description ?></td>
                                        <td><?php echo $row -> poster ?></td>

                                        <td>
                                            <a href="<?php echo base_url('Createad/delete/'.$row -> id)?>" class="btn btn-outline-danger float-end btn-sm">Delete</a>
                                        </td>
                                        
                                    </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!--Footer-->
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

<!--js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>