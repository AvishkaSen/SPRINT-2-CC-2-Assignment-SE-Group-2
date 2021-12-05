<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FutureSeekers</title>
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/background.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/register.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/nav.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <style>

        /* error alert message */
        .alert2 {
            padding: 20px;
            background-color: red;
            color: white;
            text-align: center;
        }

    </style>
        
    <body> 

        <!--header-->
        <header>
            <h1 class="heading">FutureSeekers</h1>
        </header>

        <br><br><br>

        <!-- Register Account -->
        <div class="container rounded bg-white mt-4 mb-1 col-md-5 border border-dark"> 
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="d-flex flex-column align-items-center p-3 py-5">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 id="header1" class="text-right text-success display-6 p-2">REGISTER ACCOUNT</h4>
                        </div>

                        <form action=<?php echo site_url('Register/Create') ?> method="post">
                           
                            <div class="row mt-2">

                                <div class="col-md-6">
                                    <label class="labels">First Name:</label>
                                    <input type="text" class="form-control" placeholder="first name" name="fname">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="labels">Last Name:</label>
                                    <input type="text" class="form-control"placeholder="last name" name="lname">
                                </div>

                            </div>
                            

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">E-mail:</label>
                                    <input type="text" class="form-control" placeholder="email address" name="email">
                                </div>
                            </div>
                            
                            <div class="row mt-2">

                                <div class="col-md-6">
                                    <label class="labels">Password:</label>
                                    <input type="password" class="form-control" placeholder="password" name="password">
                                </div>

                                <div class="col-md-6">
                                    <label class="labels">Confirm Password:</label>
                                    <input type="password" class="form-control"placeholder="confirm password" name="pass_confirm">
                                </div>

                            </div>

                            <br>

                            <label class="labels">Account Type:</label>
                            <div class="choice p-2">
                                <input type="radio" name="type" value="Company"> <span>Company</span>
                                <input type="radio" name="type" value="Applicant"> <span>Applicant</span>
                            </div>

                            <!-- Sets data automatically -->
                            <input type="hidden" name="new" value="Yes"> 
                            <input type="hidden" name="approved" value="No">

                            <br>

                            <div class="text-center p-2">
                                <input class="btn btn-outline-success profile-button btn-lg" type="submit" value="Register"> </input>
                            </div> 

                        </form>

                        <label class="p-1"> Already have an account?</label> 
                        <a href='<?php echo base_url('Login/index')?>' class="link-primary">Login here!</a>

                    </div>
                </div>
            </div>

        </div>
        <!-- End of registration form -->

    </body>
</html>

