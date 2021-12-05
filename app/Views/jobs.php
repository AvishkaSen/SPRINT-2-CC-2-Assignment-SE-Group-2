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

    .alert {
        padding: 20px;
        background-color: green;
        color: white;
        text-align: center;
    }

</style>


<body>

    <?php 

        // Regens session
        session();
        session() -> regenerate(); 

        if(!isset($_SESSION['UserID']))
        {
            // If no user is logged in, display the basic navigation bar
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
                    <li><a href="<?php echo base_url('myProfile/index')?>">My Profile</a></li>
                </ul>
            </nav>

            <a href="<?php echo base_url('Logout/logout')?>" class="cta">Logout</a> <!-- Log out here -->

        </header>


    <?php
        } else if ($_SESSION["Type of User"] == "Company") 
        {
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
        } else if ($_SESSION["Type of User"] == "Admin") 
        {
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
    

    <!-- ~~~~~~~ APPROVED JOB ADVERTS VIEW ~~~~~~ -->

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card border border-dark p-5">

                    <label style="font-size: 25px;">Search:</label>
                    <!--SEARCH BAR-->
                    <div class="card-body"> 
                        <form action="" method="GET">
                            <div class="row">

                                <!-- search bar -->
                                <div class="input-group mb-3 rounded">

                                    <input type="text" class="form-control" placeholder="Search job advertisements" name="search"
                                    value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>">
                                    <!-- gets the entered value from the search box -->

                                    <button type="submit" class="btn btn-outline-success"> Search </button>
                                
                                </div>
                            </div> 
                        </form>
                    </div>
                    <!-- end of search bar -->


                    <!--Filter section -->
                    <label style="font-size: 25px;">Filters:</label>
                    <div class="card-body"> 
                        <form action="" method="GET">
                            <div class="row">

                                <!-- category -->
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label>Category</label>
                                        <select class="form-select" name="category">
                                            <option value="" disabled selected>Select job category</option>
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
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" placeholder="Enter Ciy">
                                    </div> 
                                </div>

                                <!-- experience -->
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>Experience</label>
                                        <input type="text" name="experience" class="form-control" placeholder="Enter Ciy">
                                    </div> 
                                </div>

                                <!-- wfh -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Work From Home</label>
                                        <select class="form-select" name="wfh">
                                            <option selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div> 
                                </div>
 
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-outline-primary mt-4"> Filter</button> 
                                    </div> 
                                </div>
                            </div> 
                        </form>
                    </div>
                    <!-- end of search bar -->
                    

                    <div class="card-header border border-black">
                        <h4>Available Job Advertisements:</h4>
                    </div>


                    <!-- Start of ads view -->
                    <div class="card-body">
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>Ad Title</th>
                                    <th>Job Position</th>
                                    <th>Company</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Experience</th>
                                    <th>Salary</th>
                                    <th>WFH</th>
                                    <th>View Ad</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                    session();
                                    
                                    $adsModel = new \App\Models\adModel;

                                    // Checks if the search box has a value set in it or not, and then searches the data and displays it
                                    if(isset($_GET['search'])) {

                                        // Gets the search value from the search box and runs the query
                                        $searchValue = $_GET['search'];
                                        $query = $adsModel -> query("SELECT * FROM adverts WHERE approved = 'Yes' AND CONCAT(jobname, company_name, position, location, category) LIKE '%$searchValue%' ");

                                        foreach ($query -> getResult() as $row) {
                                ?>
                                        <tr>
                                            
                                            <td><?php echo $row -> jobname ?></td>
                                            <td><?php echo $row -> position ?></td>
                                            <td><?php echo $row -> company_name ?></td>
                                            <td><?php echo $row -> category ?></td>
                                            <td><?php echo $row -> location ?></td>
                                            <td><?php echo $row -> experience ?></td>
                                            <td><?php echo $row -> salary ?></td>
                                            <td><?php echo $row -> wfh ?></td>

                                            <td>
                                                <a href="<?php echo base_url('Postings/jobDetailsPage/'.$row -> id)?>" class="btn btn-outline-success float-end btn-sm">View</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                        }
                                        

                                      // Checks the filter if either category, location, or experience fields are set, and runs the query  
                                    } else if (isset($_GET['category']) || isset($_GET['location']) || isset($_GET['experience']) || isset($_GET['wfh'])) {

                                        // gets the info from the fields
                                        
                                        $category = $_GET['category'] ?? null; // nullable
                                        $location = $_GET['location'];
                                        $experience = $_GET['experience'];
                                        $wfh = $_GET['wfh'];

                                        if( $category !== null || $location !== null || $experience !== null || $wfh !== null) {
                                           
                                            // sets the location
                                            $query = $adsModel -> query("SELECT * FROM adverts WHERE approved = 'Yes' AND category = '$category' OR location = '$location' OR experience = '$experience' OR wfh = '$wfh' ");
                                        }

                                        foreach ($query -> getResult() as $row) {
                                ?>
                                        <tr>
                                            
                                            <td><?php echo $row -> jobname ?></td>
                                            <td><?php echo $row -> position ?></td>
                                            <td><?php echo $row -> company_name ?></td>
                                            <td><?php echo $row -> category ?></td>
                                            <td><?php echo $row -> location ?></td>
                                            <td><?php echo $row -> experience ?></td>
                                            <td><?php echo $row -> salary ?></td>
                                            <td><?php echo $row -> wfh ?></td>

                                            <td>
                                                <a href="<?php echo base_url('Postings/jobDetailsPage/'.$row -> id)?>" class="btn btn-outline-success float-end btn-sm"> View </a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                        }
                                        

                                        // Displays everything from the database by DEFAULT, if no search value is set
                                    }  else {
                                          
                                        $query = $adsModel -> query("SELECT * FROM adverts WHERE approved = 'Yes' ");
    
                                        foreach ($query -> getResult() as $row) {
                                ?>
                                        <tr>
                                            
                                            <td><?php echo $row -> jobname ?></td>
                                            <td><?php echo $row -> position ?></td>
                                            <td><?php echo $row -> company_name ?></td>
                                            <td><?php echo $row -> category ?></td>
                                            <td><?php echo $row -> location ?></td>
                                            <td><?php echo $row -> experience ?></td>
                                            <td><?php echo $row -> salary ?></td>
                                            <td><?php echo $row -> wfh ?></td>

                                            <td>
                                                <a href="<?php echo base_url('Postings/jobDetailsPage/'.$row -> id)?>" class="btn btn-outline-success float-end btn-sm">View</a>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                        }
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- End of ads view -->

                </div>
            </div>
        </div>
    </div>
    <!-- End of job adverts search, view and filter-->

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
    <!--End of footer-->

</body>
</html>
