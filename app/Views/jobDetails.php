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
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/jobDetails.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/footer.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <style>

        /* For message echoed when ad is deleted */
        .alert2 {
            padding: 20px;
            background-color: green;
            color: white;
            text-align: center;
        }

        /* For message echoed when CV file related issue arises */
        .alert3 {
            padding: 20px;
            background-color: red;
            color: white;
            text-align: center;
        }

    </style>

    <body>

        <header>
            <h1 class="heading">FutureSeekers</h1>
            <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->
        </header>


        <!-- function for displaying apply section -->
        <script>
            function applyAd() {
                document.getElementById('applyDiv').style.display = "block";
            }      
        </script>



        <!-- displays the user's account / profile information -->
        <?php
        
            // Regens session
            session();

            $advertID = session()->get('AdvertID'); // Gets the advert ID from the session

            $adsModel = new \App\Models\adModel;

            // Runs query to get the advert that the user selected
            $query = $adsModel -> query("SELECT * FROM adverts WHERE id = $advertID"); 


            foreach ($query -> getResult() as $row) 
            {
        ?>
            <div class="container rounded bg-white mt-1 mb-1">
                <div class="row">
                    <div class="col-md-12 border-right">
                        <div class="d-flex flex-column align-items-center p-3 py-5">

                            <h3 id="header1"> Advertisement Information: </h3>
                            
                            <div class="profile">

                                <ul>

                                    <li>Advert ID: <b><?php echo $row -> id?></b></li>
                                    <li>Job Title: <b><?php echo $row -> jobname?></b> </li>
                                    <li>Company: <b><?php echo $row -> company_name?></b> </li>  <!-- company_name -->
                                    <li>Position: <b><?php echo $row -> position?></b> </li>
                                    <li>Category: <b><?php echo $row -> category?></b></li>
                                    <li>Location: <b><?php echo $row -> location?></b> </li>
                                    <li>Years of Experience Needed: <b><?php echo $row -> experience?></b> </li>
                                    <li>Salary: <b><?php echo $row -> salary?></b> </li>
                                    <li>Work From Home: <b><?php echo $row -> wfh?></b> </li> <!-- wfh -->
                                    <li>Description: <b><?php echo $row -> description?></b></li>
                                    <li>Contact Email: <b><?php echo $row -> poster?></b></li>

                                </ul>
                            </div>
                            
                            <div class="row mt-2 p-2">

                                <!-- Creates some sessions if they do not exist already -->
                                <?php

                                    // This is used for applying to an ad. Will show who owns the advert in the AdvertApply table 
                                    session()->set('AdvertOwner', $row -> advertowner);
                                    session()->set('AdvertEmail', $row -> poster);

                                    if(!isset($_SESSION['AdvertID'])) {

                                        // if there is no advertID, sets one. So users can login / register and return to the same job advert they were looking at 
                                        session()->set('AdvertID', $row -> id);
                                    }

                                ?>
                                    
                                <div class="col-md-6 text-center">
                                    <input class="btn btn-outline-success profile-button px-4" type="submit" onclick="applyAd()" value="Apply"> </input> <!--Runs applyAD function-->
                                </div>
                                
                                <div class="col-md-6 text-center">
                                    <button class="btn btn-outline-secondary profile-button" type="button" onclick="location.href='<?php echo base_url('Postings/index')?>'">Go Back</button>
                                </div>
                                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <?php 
            }
        ?>


        <!-- Apply to job advert section -->
        <div class="container rounded bg-white mt-1 mb-1" style="display:none;" id="applyDiv"> <!-- Hidden by default -->
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="d-flex flex-column align-items-center">

                                
                        <!-- if user is not logged in -->
                        <?php if(!isset($_SESSION["UserID"])) 
                        { 
                        ?>
                            <div class="d-flex flex-column align-items-center">

                                <div class="profile px-5 py-5 border border-danger">
                                    <label> <b> You are not logged in! </b></label> 
                                    <label> <i> Please login or register with a new applicant account to register to job adverts! </i> </label>
                                </div>

                                <div class="row mt-2 p-2">
                                    
                                    <div class="col-md-6 text-center">
                                        <a href="<?php echo base_url('Login/index')?>" class="btn btn-outline-primary float-end">Login</a>
                                    </div>
    
                                    <div class="col-md-6 text-center">
                                        <a href="<?php echo base_url('Register/index')?>" class="btn btn-outline-primary float-end">Register</a>
                                    </div>
                                        
                                </div>

                            </div>

                        <?php

                        // If the user is NOT approved 
                        } else if ($_SESSION["Approved"] == "No") {
                        ?>

                            <div class="profile px-5 py-5 border border-danger">
                                <label> <b> Your account is not approved by our site admins! </b></label>
                                <label> <i> You will be able to apply to jobs after your account gets approved. </i> </label>
                            </div>

                        <?php
                        
                        // if the user is either an admin or a company
                        } else if ($_SESSION["Type of User"] == "Company" || $_SESSION["Type of User"] == "Admin") {
                        ?>

                            <div class="profile px-5 py-5 border border-danger">
                                <label> Only applicants can apply to job advertisements!</label>
                                <label> Company accounts and administrators cannot. </label>
                            </div>

                        <?php

                        // if the user is an applicant AND is approved
                        } else if ($_SESSION["Type of User"] == "Applicant") {
                        
                            session();

                            $userId = session()->get('UserID'); // Gets the logged in user's ID from the session
                            $advertID = session()->get('AdvertID'); // Gets the currecnt job advert ID from the session
                            $advertOwner = session()->get('AdvertOwner'); // Gets the job advert owner from the session
                            $advertEmail = session()->get('AdvertEmail'); // Gets the job advert owner's email from the session 

                        ?>

                            <!--Apply to ad form -->
                            <div class="container mt-1 mb-1 p-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-9">
                                        <div class="card border border-success">
                                            <div class="card-header">
                                                Please enter the follwing details to apply to this job ad:
                                            </div>
                                            
                                            <div class="card-body ">
                                                
                                                <form action="<?php echo base_url('applyAd/create')?>" method="POST" enctype="multipart/form-data">

                                                    <div class="row">

                                                        <!-- Applicant First Name -->
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-2">
                                                                <label>First name</label>
                                                                <input type="text" name="fname" class="form-control" required placeholder="enter first name">
                                                            </div> 
                                                        </div>

                                                        <!-- Applicant Last Name -->
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-2">
                                                                <label>Last name</label>
                                                                <input type="text" name="lname" class="form-control" required placeholder="enter last name">
                                                            </div> 
                                                        </div>

                                                        <!-- email -->
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-2">
                                                                <label>Your Email:</label>
                                                                <input type="email" name="email" class="form-control" required placeholder="enter email">
                                                            </div> 
                                                        </div>

                                                        <!-- contact -->
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-2">
                                                                <label>Contact Number:</label>
                                                                <input type="text" name="contact" class="form-control" required placeholder="enter contact number">
                                                            </div> 
                                                        </div>

                                                        <!-- message -->
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-2">
                                                                <label>Short message:</label>
                                                                <textarea name="message" class="form-control" required placeholder="enter message"></textarea>
                                                            </div> 
                                                        </div>

                                                        <!-- Upload CV file -->
                                                        <div class="col-md-12">
                                                            <div class="form-group mt-2">
                                                                <label for="FormControlFile1">Upload your CV [.docx or .pdf] [1 MB MAX]</label>
                                                                <br>
                                                                <input type="file" name="file" class="form-control-file p-2" id="FormControlFile1">
                                                            </div>
                                                        </div>

                                                        <!-- Sets some identifying data -->
                                                        <input type="hidden" name="applicantid" value="<?php echo $userId?>">  <!-- Applying applicant's ID -->
                                                        <input type="hidden" name="advertid" value="<?php echo $advertID?>"> <!-- current advert's ID -->
                                                        <input type="hidden" name="advertowner" value="<?php echo $advertOwner?>"> <!-- advert owner's ID -->
                                                        <input type="hidden" name="advertemail" value="<?php echo $advertEmail?>"> <!-- advert owner's ID (for sending email) --> 

                                                        <!-- apply to this button -->
                                                        <div class="col-md-12">
                                                            <hr>
                                                            <button type="submit" class="btn btn-primary px-4 float-end">Apply to this advert!</button>
                                                        </div>

                                                        
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of Apply to job advert section -->


        <br>

        <!-- THIS SECTION WILL ONLY BE DISPLAYED IF AD BELONGS TO CURRENTLY LOGGED IN COMPANY ACCOUNT OR IF USER IS AN ADMIN -->
        <?php 

            session();

            // Checks if session is set
            if (!isset($_SESSION['UserID'])) {

                // Does nothing
                // This is to bypass the "unidefined array key" error message for below session checking 

            } 

            // Checks if user is the same as the advert owner OR if they are an admin
            else if($_SESSION["UserID"] == $_SESSION["AdvertOwner"] || $_SESSION["Type of User"] == "Admin")
            {

            session();
            
            $advertID = session()->get('AdvertID'); // Gets the current job advert ID from the session
        ?>
            <!-- ADVERT SETTINGS / EDIT SECTION -->
            <div class="container rounded bg-white mt-1 mb-4 border border-dark"> 
                <div class="row">
                    <div class="col-md-12 border-right">

                        <div class="d-flex flex-column align-items-center p-3 py-5">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 id="header1" class="text-right">Advertisement Settings: </h4>
                            </div>

                            <form class="border border-dark p-5" action=<?php echo site_url('Postings/updateAds/'.$row -> id) ?> method="post">

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Job Title:</label>
                                        <input type="text" class="form-control" placeholder="title" name="jobname" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Company Name:</label>
                                        <input type="text" class="form-control" placeholder="company name" name="company_name" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Description:</label>
                                        <input type="text" class="form-control" placeholder="description" name="description" required>
                                    </div>
                                </div>
                                
                                <!-- this is the drop down section -->
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                            <label class="labels">Category</label>
                                            <select class="form-select" name="category" required>
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

                                <div class="row mt-2">

                                    <div class="col-md-6">
                                        <label class="labels">Position</label>
                                        <input type="text" class="form-control" placeholder="position" name="position" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="labels">Location</label>
                                        <input type="text" class="form-control"placeholder="location" name="location" required>
                                    </div>

                                </div>

                                
                                <div class="row mt-2">

                                    <div class="col-md-6">
                                        <label class="labels">Years of Expereince Needed</label>
                                        <input type="text" class="form-control" placeholder="experience" name="experience" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="labels">Salary</label>
                                        <input type="text" class="form-control"placeholder="salary per month" name="salary" required>
                                    </div>

                                </div>

                                <!-- wfh -->
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">
                                        <label>Work From Home</label>
                                        <select class="form-select" name="wfh" required>
                                            <option selected>Select a category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div> 
                                </div>

                                <br>

                                <div class="row mt-2">
                                    
                                    <div class="col-md-6 text-center">
                                        <input class="btn btn-outline-primary profile-button" type="submit" value="Save Changes"> </input>
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <a class="btn btn-outline-danger profile-button" href="<?php echo base_url('Postings/deleteAd/'.$advertID)?>">Delete Advert</a>
                                    </div>
                                    
                                </div>

                            </form>

                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- END OF ADVERT SETTINGS / EDIT SECTION -->


            <!-- VIEW USERS WHO HAVE APPLIED TO THIS JOB SECTION -->
            <div class="container rounded bg-white mt-1 mb-4">
                <div class="row">
                    <div class="col-md-12 mt-4">

                        <div class="card border border-success mb-5 mt-2">
                            <div class="card-header">
                                <h4 id="header1">Users Applied to this ad:</h4>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">

                                    <thead>
                                        <tr>
                                            <th>Applicant Acc ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Contact Number</th>
                                            <th>Message</th>
                                            <th>CV</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                            session();

                                            $applyModel = new \App\Models\applyModel;

                                            // Gets the currecnt job advert ID from the session
                                            $advertID = session()->get('AdvertID'); 

                                            // Runs query to get approved ads of the user
                                            $query = $applyModel -> query("SELECT * FROM advertapply WHERE advertid = '$advertID'"); 

                                            foreach ($query -> getResult() as $row){

                                        ?>
                                            <tr>
                                                <td><?php echo $row -> applicantid ?></td>
                                                <td><?php echo $row -> fname ?></td>
                                                <td><?php echo $row -> lname ?></td>
                                                <td><?php echo $row -> email ?></td>
                                                <td><?php echo $row -> contact ?></td>
                                                <td><?php echo $row -> message ?></td>

                                                <td>
                                                    <a href="<?php echo base_url('uploads/'.$row -> file)?>">
                                                        <button class="btn btn-outline-primary">Download</button> <!-- Download CV-->
                                                    </a>
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
            <!-- END VIEW USERS WHO HAVE APPLIED TO THIS JOB SECTION -->
        
        <?php 
            }
        ?>

        <br>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    
</html>
