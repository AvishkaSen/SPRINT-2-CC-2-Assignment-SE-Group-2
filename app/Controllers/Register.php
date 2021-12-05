<?php

namespace App\Controllers;

class Register extends BaseController
{

    public function index()
    {
        // Redirects the user to the register page when the button is clicked in the home page
        return view('register.php');  
    }
    

    public function create() {

        $validation =  \Config\Services::validation(); // Validation library is loaded
        $formdata = $this->request->getPost(); // Gets data from the registration form's post method
    
        if($validation->run($formdata, 'registration')) { // LOADS AND CHECKS A SET OF CUSTOM FORM VALIDATIONS THAT I HAVE CREATED IN "app/Config/Validation.php" FILE!!

            // get the data from the form
            $email = $this->request->getPost('email');
            $model = new \App\Models\userModel;

            // If the validations are successful
            $users = new \App\Entities\Users($this -> request ->getPost());
            $users -> password = password_hash($users->password, PASSWORD_DEFAULT); // Hashes the password

            // Inserts account registration information into the database
            $model->insert($users); 


            //   Setting up the company account profile   //

            // get account type
            $account_type = $this->request->getPost('type');
            
            // check if account type is company
            if($account_type == "Company") {
            
                // gets data on the just entered company
                $query1 = $model -> query("SELECT * FROM registrations WHERE email = '$email'"); 
                $row = $query1 -> getRow();

                $model2 = new \App\Models\companyProfileModel;

                // Gets and uploads information to the profile database
                $model2 = $model2 -> save([
                    'company_acc' => $row -> id,
                    'companyname' => '',
                    'companydesc' => '',
                    'jobcategories' => '',
                    'employment_types' => '',
                ]);

            }
            
            return view('login'); 

        } else {

            // if the validations fail

            // Loads an array of the custom error messages I created in "app/Config/Validation.php" file!!
            $errorArray = $validation->getErrors();

            echo '<div class="alert2">
            <strong> ERROR! </strong>
            <br>
            <b>' . implode('<br>', $errorArray) . '</b> 
            </div>';          

            return view('register'); 

        }

    }
}
?>

