<?php

  namespace App\Controllers;

  class myProfile extends BaseController
  {

    // Goes to the profile page
    public function index()
    {
      return view('myProfile.php');
    }
      
    // Deletes the user account
    public function deleteAcc($id){

      // gets the database
      $model = new \App\Models\userModel;
      $model->delete($id);

      // destroys the session
      $session = session(); 
      $session -> destroy();

      // account deleted message alert
      echo '<div class="alert">
      <strong> SUCCESS! </strong> Your Account has been successfully deleted!
      </div>';

      // redirects user to the landing page
      return view('landing.php');
    }


    // Updates the user's profile settings / basic information 
    public function updateAcc(){

      session();
      $userID = session() -> get('UserID'); // Gets the user ID from the session
      
      $model = new \App\Models\userModel; // gets the database model

      // gets the specific form data and assigns to variables 
      $fname = $this->request->getPost('fname');
      $lname = $this->request->getPost('lname');
      $email = $this->request->getPost('email');

      // runs the update query and changes the details
      $model -> query("UPDATE registrations SET fname = '$fname' , lname = '$lname' , email = '$email' WHERE id = $userID");

      // Changes the current session variables
      $_SESSION["First Name"] = "$fname";
      $_SESSION["Last Name"] = "$lname";
      $_SESSION["Email"] = "$email";

      // reloads the profile page
      return view('myProfile.php');

    }


    // updates the company profile information
    public function updateProfile() {

      session();

      $userID = session() -> get('UserID'); // Gets the user ID from the session
      
      $model = new \App\Models\companyProfileModel; // gets the database model

      // gets the specific form data and assigns to variables 
      $companyname = $this->request->getPost('companyname');
      $companydesc = $this->request->getPost('companydesc');
      $jobcategories = $this->request->getPost('jobcategories');
      $employment_types = $this->request->getPost('employment_types');

      // runs the update query and changes the company profile details
      $model -> query("UPDATE companyprofile SET 
                                    companyname = '$companyname' , 
                                    companydesc = '$companydesc' , 
                                    jobcategories = '$jobcategories' , 
                                    employment_types = '$employment_types' 
                                    
                                    WHERE company_acc = $userID");

      // reloads the profile page
      return view('myProfile.php');
      
    }

  }
    
?>