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

      session();

      // gets the database
      $model = new \App\Models\userModel; // gets the Users database model
      $adModel = new \App\Models\adModel; // gets the Advert database model
      $applyModel = new \App\Models\applyModel; // gets the Apply database model
      $profileModel = new \App\Models\companyProfileModel; // gets the company profile database model

      $adModel -> query("DELETE FROM adverts WHERE advertowner = $id"); // deletes all ads that the user owns
      
      //checks user session if user is a company 
      if($_SESSION['Type of User'] == 'Company'){

        $profileModel -> query("DELETE FROM companyprofile WHERE company_acc = $id"); // deletes their profile information
        $applyModel -> query("DELETE FROM advertapply WHERE advertowner = $id"); // deletes all applicant applies that the user had on their job adverts

      } else if ($_SESSION['Type of User'] == 'Applicant'){

        $applyModel -> query("DELETE FROM advertapply WHERE applicantid = $id"); // deletes all applicant applies that they applied to

      }

      $model->delete($id); // deletes the user account

      // destroys the session
      $session = session(); 
      $session -> destroy();

      // redirects user to the base landing page after account is deleted
      return redirect()->to('/');
      
    }


    // Updates the user's profile settings / basic information 
    public function updateAcc(){

      session();
      $userID = session() -> get('UserID'); // Gets the user ID from the session
      
      $model = new \App\Models\userModel; // gets the database model
      $adModel = new \App\Models\adModel; 


      // gets the specific form data and assigns to variables 
      $fname = $this->request->getPost('fname');
      $lname = $this->request->getPost('lname');
      $email = $this->request->getPost('email');

      // runs the update query and changes the details
      $model -> query("UPDATE registrations SET fname = '$fname' , lname = '$lname' , email = '$email' WHERE id = $userID"); // updates the user's details

      // checks if the user is a company
      if($_SESSION['Type of User'] == 'Company'){

        $adModel -> query("UPDATE adverts SET poster = '$email' WHERE advertowner = $userID"); // updates the email in all owned adverts
        
      } 
      
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