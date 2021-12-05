<?php

namespace App\Controllers;

class Postings extends BaseController
{


  public function index()
  {

    session();
    
    // if the user IS NOT logged in
    if(!isset($_SESSION['UserID'])){

      if(isset($_SESSION['AdvertID'])){

        session()->remove('AdvertID');
        return view('jobs.php');

      } else {
          
        return view('jobs.php');
  
      } 

      // below checks if user is an admin, applicant or company account
    } else if ($_SESSION["Type of User"] == "Company") { 

      if(isset($_SESSION['AdvertID']) || isset($_SESSION['AdvertOwner']) || isset($_SESSION['AdvertEmail'])){
      
        session()->remove('AdvertID');
        session()->remove('AdvertOwner');
        session()->remove('AdvertEmail');

        return view('Company/myads.php');

      } else {

        // if the user is not an admin
        return view('Company/myads.php');
      }
      
    } else if ($_SESSION["Type of User"] == "Admin") {

      if(isset($_SESSION['AdvertID']) || isset($_SESSION['AdvertOwner']) || isset($_SESSION['AdvertEmail'])){

        // if the user is an admin
        session()->remove('AdvertID');
        session()->remove('AdvertOwner');
        session()->remove('AdvertEmail');

        return view('Admin/adminads.php');

      } else {

        // redirects to admin ads
        return view('Admin/adminads.php');
      }

    } else if ($_SESSION["Type of User"] == "Applicant") {

      if(isset($_SESSION['AdvertID']) || isset($_SESSION['AdvertOwner']) || isset($_SESSION['AdvertEmail'])){

        // if the user is an applicant
        session()->remove('AdvertID');
        session()->remove('AdvertOwner');
        session()->remove('AdvertEmail');

        return view('jobs.php');

      } else {

        // redirects to job views page
        return view('jobs.php');
      }

    }

  }



  // Done for editing the job ad details
  public function jobDetailsPage($id)
  {

    session();
    
    // Sets the advertisement session to the advertID  
    session()->set('AdvertID', $id); 

    return view('jobDetails');
  }



  // Updates the job advertisement from the view details page 
  public function updateAds($id)
  {

    // begins session
    session();

    $model = new \App\Models\adModel; // gets the database model

    // Gets the data from the edit ad form in job details page and assigns it to variable
    $jobname = $this->request->getPost('jobname');
    $company_name = $this->request->getPost('company_name');
    $category = $this->request->getPost('category');
    $description = $this->request->getPost('description');
    $position = $this->request->getPost('position');
    $location = $this->request->getPost('location');
    $experience = $this->request->getPost('experience');
    $salary = $this->request->getPost('salary');
    $wfh = $this->request->getPost('wfh');


    // Updates the database per edited data
    $model -> query("UPDATE adverts SET 
                                        jobname = '$jobname' ,
                                        company_name = '$company_name' , 
                                        category = '$category' , 
                                        description = '$description', 
                                        position = '$position', 
                                        location = '$location', 
                                        experience = '$experience', 
                                        salary = '$salary',
                                        wfh = '$wfh' 

                                        WHERE id = $id");


    //reloads the page with the job advert Page
    return view('jobDetails');

  }

  // For when deleting the job ad from INSIDE view details page
  public function deleteAd($id)
  {

    // Gets the database model
    $model = new \App\Models\adModel;

    // Deletes the job ad
    $model->delete($id);

    // destroys the job advertID session 
    session()->remove('AdvertID');
    session()->remove('AdvertOwner');

    // Job advert deleted alert message
    echo '<div class="alert2">
    <strong> SUCCESS! </strong> The Advertisement with the ID: "'. $id .'" has been successfully deleted!
    </div>';


    // checks if user is either a company or applicant account
    if ($_SESSION["Type of User"] == "Company") { 

      // Goes to the myads page
      return view('Company/myads');

    } else {
      
      // If the account is admin
      return view('Admin/adminads');

    }

  }

}

