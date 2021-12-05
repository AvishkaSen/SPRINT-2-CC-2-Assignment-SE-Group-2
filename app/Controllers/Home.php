<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('landing.php');
    }

    // redirects to the home page
    public function home()
    {
        return view('Home.php');
    }
}
?>



