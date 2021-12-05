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
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/profile.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/footer.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        

    </head>

    <body>

        <?php 

            // Regens session
            session();
            session() -> regenerate(); 

            if(!isset($_SESSION['UserID']))
            {

        ?>
            <header>
                <h1 class="heading">FutureSeekers</h1>

                <nav>
                    <ul class="nav-links">
                        <li><a href="<?php echo base_url('Home/home')?>">Home</a></li>
                        <li><a href="<?php echo base_url('Jobs/index')?>">Jobs</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="<?php echo base_url('Login/index')?>" class="cta">Login</a> <!-- Login here -->

            </header>

        <?php

            // if user is an applicant
            } else if ($_SESSION["Type of User"] == "Applicant") {

        ?>

            <header>
                <h1 class="heading">FutureSeekers</h1>

                <nav>
                    <ul class="nav-links">
                        <li><a href="<?php echo base_url('Home/home')?>">Home</a></li>
                        <li><a href="<?php echo base_url('Jobs/index')?>">Jobs</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>

                <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->

            </header>


        <?php
            } else if ($_SESSION["Type of User"] == "Company") {
        ?>

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

        <?php
            } else if ($_SESSION["Type of User"] == "Admin") {
        ?>

                <!--Nav -->
                <header>
                    <h1 class="heading">FutureSeekers</h1>
                    <nav>
                        <ul class="nav-links">
                            <li><a href="<?php echo base_url('Home/home')?>">Home</a></li>
                            <li><a href="<?php echo base_url('Admin/index')?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('Admin/users')?>">Users</a></li>
                            <li><a href="<?php echo base_url('Admin/ads')?>">Job Adverts</a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="<?php echo base_url('myProfile/index')?>">My Profile</a></li>
                        </ul>
                    </nav>
                    <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->
                </header>

        <?php
            }
        ?>


        <!-- Displays the user's account / profile information -->
        <?php
        
            // Regens session
            session();

            $userModel = new \App\Models\userModel;
                
            // Checks if user is logged in
            if (isset($_SESSION['UserID']) == true) 
            { 

                $userId = session()->get('UserID'); // Gets the user ID from the session session
                $userName = session()->get('First Name'); // Gets the User's Name from the session

                // Runs query to get approved ads of the user
                $query = $userModel -> query("SELECT * FROM registrations WHERE id = $userId"); 

                foreach ($query -> getResult() as $row) 
                {
            ?>

                <h1 id="header2"> Welcome <?php echo $userName?>! </h1>

                <div class="container rounded bg-white mt-1 mb-5 border border-dark p-5">
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="d-flex flex-column align-items-center p-3 py-5">

                                <h3 id="header1"> Your account settings information: </h3>

                                <div class="profile p-4">

                                    <ul>

                                        <li>ID: <b><?php echo $row -> id?></b></li>
                                        <li>First Name: <b><?php echo $row -> fname?></b> </li>
                                        <li>Last Name <b><?php echo $row -> lname?></b></li>
                                        <li>E-mail: <b><?php echo $row -> email?></b></li>
                                        <li>Account Type: <b><?php echo $row -> type?></b></li>
                                        <li>Approved: <b><?php echo $row -> approved?></b></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-5 border-right ">
                            <div class="p-3 py-5">

                                <div class="d-flex justify-content-between align-items-center mb-3 ">
                                    <h4 id="header1" class="text-right">Account Settings: </h4>
                                </div>

                                <form action=<?php echo site_url('myProfile/updateAcc')?> method="post">

                                    <div class="row mt-2">

                                        <div class="col-md-6">
                                            <label class="labels">First Name</label>
                                            <input type="text" class="form-control" placeholder="First name" name="fname">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="labels">Last Name</label>
                                            <input type="text" class="form-control"placeholder="last name" name="lname">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Email Address</label>
                                            <input type="email" class="form-control" placeholder="email address" name="email" required>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row mt-2">

                                        <!--- Button to update account information entered -->
                                        <div class="col-md-6 text-center">
                                            <input class="btn btn-outline-primary profile-button" type="submit" value="Save Changes"> </input>
                                        </div>

                                        <!-- Deletes the user's account -->
                                        <div class="col-md-6 text-center">
                                            <button class="btn btn-outline-danger profile-button" type="button" onclick="location.href='<?php echo base_url('myProfile/deleteAcc/'.$row -> id)?>'">Delete Profile</button>
                                        </div>
                                        
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                }
            ?>

        <?php
            } else {
        ?>
                
            <!-- If user is not logged in -->    
            <div class="alert">
                <strong> ERROR! </strong> You are not logged in! Please log in to view profile information.
            </div>;

        <?php
            }
        ?>


        <!-- User profile information section -->
        <?php
        
            // Regens session
            session();

            $userModel = new \App\Models\userModel;
                
            // Checks if user is a company account and is approved
            if ($_SESSION["Type of User"] == "Company" && ($_SESSION['Approved']) == "No") 
            {
        
        ?>

            <div class="container rounded bg-white mt-1 mb-1" id="applyDiv"> <!-- Hidden by default -->
                <div class="row">
                    <div class="col-md-12 border-right">
                        <div class="d-flex flex-column align-items-center">
                        
                            <div class="profile px-5 py-5 border border-danger">
                                <label> <b> Your account is not approved by our site admins! </b></label>
                                <label> <i> You will be able to edit your company profile to jobs after your account gets approved. </i> </label>
                                <label> <i> Please make necessary payment fees and email the bank statement to out customer support at 'futureseekershelp@gmail.com', and our admins will approve your company account within 24 hours. </i> </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <?php

            // If the user is a company account and is approved
            } else if ($_SESSION["Type of User"] == "Company" && ($_SESSION['Approved']) == "Yes") 
            {

                $userId = session()->get('UserID'); // Gets the user ID from the session session

                // Runs query to get approved ads of the user
                $query = $userModel -> query("SELECT * FROM companyprofile WHERE company_acc = $userId"); 

                foreach ($query -> getResult() as $row) 
                {

        ?>
                <!--Profile information section -->
                <div class="container rounded bg-white mt-1 mb-5 border border-dark p-5">
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="d-flex flex-column align-items-center p-3 py-5">

                                <h3 id="header1"> Your Company Profile Information: </h3>

                                <div class="profile p-5">

                                    <ul>

                                        <li>Company Name: <b><?php echo $row -> companyname?></b></li>
                                        <li>About Us: <b><?php echo $row -> companydesc?></b> </li>
                                        <li>Job Categories: <b><?php echo $row -> jobcategories?></b></li>
                                        <li>Employment Types: <b><?php echo $row -> employment_types?></b></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Profile details edit section -->
                        <div class="col-md-5 border-right ">
                            <div class="p-3 py-5">

                                <div class="d-flex justify-content-between align-items-center mb-3 ">
                                    <h4 id="header1" class="text-right">Profile Information: </h4>
                                </div>

                                <form action=<?php echo site_url('myProfile/updateProfile')?> method="post">

                                    <div class="row mt-2">

                                        <div class="col-md-6">
                                            <label class="labels">Company Name:</label>
                                            <input type="text" class="form-control" placeholder="company name" name="companyname">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="labels">About Us:</label>
                                            <input type="text" class="form-control"placeholder="description" name="companydesc">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Job Categories:</label>
                                            <input type="text" class="form-control" placeholder="categories" name="jobcategories">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Employment Types:</label>
                                            <input type="text" class="form-control" placeholder="employment types" name="employment_types">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row mt-2">

                                        <!--- Button to update/submit profile information entered -->
                                        <div class="col-md-6 text-center">
                                            <input class="btn btn-outline-primary profile-button" type="submit" value="Save Changes"> </input>
                                        </div>
                                        
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>

            <?php 
                }
            }
            ?>


        <br><br>


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
