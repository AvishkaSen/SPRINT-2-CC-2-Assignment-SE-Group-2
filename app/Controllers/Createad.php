<?php

    namespace App\Controllers;

    class Createad extends BaseController
    {
        public function index()
        {
            return view('Company/createad.php');
        }

        public function create()
        {
            $validation =  \Config\Services::validation(); // Validation library is loaded
            $addata = $this->request->getPost(); // Gets data from the registration form's post method
        
            if($validation->run($addata, 'adverts')) { // LOADS AND CHECKS A SET OF CUSTOM FORM VALIDATIONS THAT I HAVE CREATED IN "app/Config/Validation.php" FILE!!

                // If the validations are successful
                
                $ads = new \App\Entities\Ads($this -> request ->getPost());

                // Inserts registration form data into the database
                $model = new \App\Models\adModel;
                $model->insert($ads); 

                // account deleted message alert
                echo '<div class="alert2">
                <strong> SUCCESS! </strong> Your Advert has been submitted. It will be on display on our site once our admins approve it!
                </div>';
                
                return view('Company/createad'); 

            } else {

                // if the validations fail
                
                echo "<b style='color:white;'> Error: </b>";
                echo "<br><br>";

                $errorArray = $validation->getErrors(); 
                echo "<b style='color:white;'> ". implode("<br>", $errorArray) . "</b>"; 
                echo "<br><br>";
                
                return view('Company/createad'); 

            }

        }
        
        // delete is used to delete the job ad
        public function delete($id)
        {
            $model = new \App\Models\adModel;
            $model->delete($id);
            
            return view('Company/myads');
        }
        
    }

?>

