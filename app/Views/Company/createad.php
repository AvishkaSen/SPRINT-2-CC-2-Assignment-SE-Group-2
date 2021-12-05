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
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/createad.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/footer.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

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


    <?php 
        
        session();
        $userID = session() -> UserID; // Gets the userID from the session
        $userEmail = session() -> Email; // Gets the user email from the session

        // Checks if the user account is approved or not
        if($_SESSION["Approved"] == "Yes") 
        {
         
    ?>

        <!--Create ad Form -->
        <div class="container mt-4 mb-5 p-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card border border-dark">
                        <div class="card-header">
                            Please enter the details of your job advertisement:
                        </div>
                        
                        <div class="card-body ">

                            <form action="<?php echo base_url('Createad/create')?>" method="POST">

                                <div class="row">

                                    <!--- jobname -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>Job Ad Title</label>
                                            <input type="text" name="jobname" class="form-control" required placeholder="Enter Ad Title">
                                        </div> 
                                    </div>

                                    <!-- company_name -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" class="form-control" required placeholder="Enter Company name">
                                        </div> 
                                    </div>

                                    <!-- position -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Job Position</label>
                                            <input type="text" name="position" class="form-control" required placeholder="Enter Position">
                                        </div> 
                                    </div>

                                    <!-- category -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Category</label>
                                            <select class="form-select" required name="category">
                                                <option selected>Select a category</option>
                                                <option value="Administration, business and management">Administration, business and management</option>
                                                <option value="Alternative therapies">Alternative therapies</option>
                                                <option value="Animals, land and environment">Animals, land and environment</option>
                                                <option value="Computing and ICT">Computing and ICT</option>
                                                <option value="Construction and building">Construction and building</option>
                                                <option value="Design, arts and crafts">Design, arts and crafts</option>
                                                <option value="Education and training">Education and training</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Facilities and property services">Facilities and property services</option>
                                                <option value="Financial services">Financial services</option>
                                                <option value="Garage services">Garage services</option>
                                                <option value="Hairdressing and beauty">Hairdressing and beauty</option>
                                                <option value="Healthcare">Healthcare</option>
                                                <option value="Heritage, culture and libraries">Heritage, culture and libraries</option>
                                                <option value="Hospitality, catering and tourism">Hospitality, catering and tourism</option>
                                                <option value="Languages">Languages</option>
                                                <option value="Legal and court services">Legal and court services</option>
                                                <option value="Manufacturing and production">Manufacturing and production</option>
                                                <option value="Performing arts and media">Performing arts and media</option>
                                                <option value="Print and publishing, marketing and advertising">Print and publishing, marketing and advertising</option>
                                                <option value="Retail and customer services">Retail and customer services</option>
                                                <option value="Science, mathematics and statistics">Science, mathematics and statistics</option>
                                                <option value="Security, uniformed and protective services">Security, uniformed and protective services</option>
                                                <option value="Social sciences and religion">Social sciences and religion</option>
                                                <option value="Social work and caring services">Social work and caring services</option>
                                                <option value="Sport and leisure">Sport and leisure</option>
                                                <option value="Transport, distribution and logistics">Transport, distribution and logistics</option>
                                            </select>
                                        </div> 
                                    </div>

                                    <!-- location -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label>Location</label>
                                            <input type="text" name="location" class="form-control" required placeholder="Enter Ciy">
                                        </div> 
                                    </div>

                                    <!-- experience -->
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label>Years of Experience Needed</label>
                                            <input type="text" name="experience" class="form-control" required placeholder="Enter Years of Experience">
                                        </div> 
                                    </div>

                                    <!-- salary -->
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label>Salary Per Month</label>
                                            <input type="text" name="salary" class="form-control" required placeholder="Enter Salary">
                                        </div> 
                                    </div>

                                    <!-- wfh -->
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label>Work From Home</label>
                                            <select class="form-select" required name="wfh">
                                                <option selected>Select a category</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div> 
                                    </div>
                                    
                                    <!-- description -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" placeholder="Enter Description" required></textarea>
                                        </div> 
                                    </div>

                                    <!-- default information -->
                                    <input type="hidden" class="form-control" name="advertowner" value="<?php echo $userID?>"> <!-- Links advertisement to company account's ID-->
                                    <input type="hidden" class="form-control" name="poster" value="<?php echo $userEmail?>"> <!-- Links advertisement to company account's ID-->
                                    <input type="hidden" class="form-control" name="approved" value="No"> <!-- Sets ads to unapproved by default for Admin approval-->

                                    <div class="col-md-12">
                                        <hr>
                                        <button type="submit" class="btn btn-primary px-4 float-end">Submit Advertisement!</button>
                                    </div>

                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 

        } else {

    ?>
        <!-- Displays an error if the user account is not approved yet -->
        <div class="alert">
            <strong> ERROR! </strong> 
            <br>
            <b>Your account is not approved yet by our site Admins. You can post jobs after being approved! </b>
            <br>
            <i> Please make necessary payments fees and email the bank statement to out customer support at 'futureseekershelp@gmail.com', and our admins will approve your company account within 24 hours. </i>
        </div>;
    
    <?php
        }   
    ?>

    
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

</body>
</html>
