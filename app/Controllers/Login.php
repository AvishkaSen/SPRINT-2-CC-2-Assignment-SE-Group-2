<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function index()
    {
        return view('login.php');  
    }
  
    public function create(){
		
		$model = new \App\Models\userModel; // Gets the database

		// Gets the email and password values from the form
		$email = $this->request->getPost('email'); 
		$password = $this->request->getPost('password'); 

		$user = $model->where('email', $email) -> first();

		// Checks if the user exists and if the relevant password matches with the specific user
		if($user !== null && password_verify($password, $user->password)) 
		{
			// If login was successful
	
			// CREATING THE SESSION AND SAVING USER INFO INTO IT
			$session = session(); // initialize the session

			$session->set('UserID', $user -> id); 
			$session->set('First Name', $user -> fname); 
			$session->set('Last Name', $user -> lname); 
			$session->set('Email', $user -> email); 
			$session->set('Type of User', $user -> type); // sets the user type
			$session->set('New', $user -> new); 
			$session->set('Approved', $user -> approved); 
			
			// Checks the account user type
			if(isset($_SESSION["AdvertID"])) 
			{
				// Goes to the job details page if a session is set for the advert 
				return view("jobDetails");
			}
			else 
			{
				// Goes to home page
				return view("Home.php");
			}

		}
		else {

			// Display error if login failed
			echo '<div class="alert2">
			<strong> ERROR! </strong> Login was not successful! Please double check your entries, or User does not exist!
			</div>';
			
			return view("login");

		}
    }
}
?>

