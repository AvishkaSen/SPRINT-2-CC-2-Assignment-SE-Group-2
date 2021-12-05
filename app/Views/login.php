<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FutureSeekers</title>
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/background.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/login.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/nav.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    
    <style>

        /* For error message echoed in Login Controller*/
        .alert2 {
            padding: 20px;
            background-color: #f44336;
            color: white;
            text-align: center;
        }

    </style>
    

    <body>

        <header>
            <h1 class="heading">FutureSeekers</h1>
        </header>

        <br><br><br><br><br>

        <!-- Login Form -->
        <div class="container rounded bg-white mt-1 mb-1 col-md-5"> 
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="d-flex flex-column align-items-center p-3 py-5">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 id="header1" class="text-right text-success display-6 p-2">Please enter your login information</h4>
                        </div>

                        <form action=<?php echo site_url('Login/Create') ?> method="post">    

                            <div class="row mt-2">

                                <div class="col-md-12 p-3">
                                    <label class="labels">E-mail Address:</label>
                                    <input class="form-control" placeholder="email" type="email" name="email">
                                </div>

                                <div class="col-md-12 p-3">
                                    <label class="labels">Password:</label>
                                    <input type="password" class="form-control" placeholder="password" name="password">
                                </div>

                            </div>

                            <br>

                            <div class="text-center p-3">
                                <input class="btn btn-outline-Success profile-button btn-lg" type="submit" value="Login to Futureseekers!"> </input>
                            </div> 

                        </form>

                        <label class="p2"> Don't have an account?</label> 
                        <a href='<?php echo base_url('Register/index')?>' class="link-primary">Register here!</a>

                    </div>
                </div>
            </div>

        </div>
        
    </body>

</html>

