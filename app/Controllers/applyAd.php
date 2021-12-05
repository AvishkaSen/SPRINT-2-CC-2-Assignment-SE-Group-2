<?php

    namespace App\Controllers;
    use App\Models\applyModel;

    class applyAd extends BaseController
    {
        public function create() {


            if($this->request->getPost()) {

                // validations for file uploading
                $rules = [
                    'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,docx,pdf]',
                ];
            }

            if($this->validate($rules)) {

                $file = $this->request->getFile('file'); // gets the uploaded file

                // Gets info from apply form 
                $advertid = $this->request->getPost('advertid'); 
                $advertowner = $this->request->getPost('advertowner'); 
                $applicantid = $this->request->getPost('applicantid'); 
                $advertOwnerEmail = $this->request->getPost('advertemail'); // For sending email to advert owner
                $fname = $this->request->getPost('fname'); 
                $lname = $this->request->getPost('lname'); 
                $email = $this->request->getPost('email'); 
                $contact = $this->request->getPost('contact'); 
                $message = $this->request->getPost('message');


                if($file->isValid() && !$file->hasMoved()) {

                    $file->move('./uploads'); // move the file to the uploads folder

                    // brings up the apply model
                    $model = new \App\Models\applyModel;

                    // Gets and uploads information to the database
                    $model = $model -> save([
                        'advertid' => $advertid,
                        'advertowner' => $advertowner,
                        'applicantid' => $applicantid,
                        'fname' => $fname,
                        'lname' => $lname,
                        'email' => $email,
                        'contact' => $contact,
                        'message' => $message,
                        'file' => $file->getName(), // uploads NAME OF THE FILE. Not the file itself.
                    ]);


                    // email notifications after user has applied ////////////
                    $to = $advertOwnerEmail;
                    $subject = 'New applicant for your ad number '.$advertid.'!';
                    $emailmessage = 'Hello '. $advertOwnerEmail .'! 
                                <br> <br>'
                                .$fname.' '.$lname.' has applied for your ad number '.$advertid.'.
                                <br> Please login to your account to view their application details from the ads page. Relevant uploaded CV is also attatched to this mail.
                                <br>
                                
                                <a href="http://localhost/futureseekers/public/Postings/jobDetailsPage/'.$advertid.'">Go to your ad!</a>
                                <br><br>
                                Thank you for using Futureseekers.lk!';
                                
                    $CVpath = './uploads/'.$file->getName(); // gets the path of the uploaded CV
                             
                    $email = \Config\Services::email(); // loads email instance from config/Email.php

                    $email -> setTo($to); // sets the email to the advert owner
                    $email -> setFrom('futureseekershelp@gmail.com', 'Info'); 
                    $email -> setSubject($subject); // sets the subject of the email
                    $email -> setMessage($emailmessage); // sets the message of the email
                    $email->attach($CVpath); // attaches the file to the email
                    if($email -> send()) // sends the email

                    ///////////////////////////////////////

                    
                    // success message
                    echo '<div class="alert2">
                    <strong> SUCCESS! </strong> You have successfully applied to this job advertisement!
                    </div>';
                    
                    return view("jobDetails");

                }        

            } else {

                // Error message
                echo '<div class="alert3">
                <strong> ERROR! </strong> 
                <br>
                <i>Applying to job advert was not successful! Please double check CV file type and size!</i>
                </div>';

                return view("jobDetails");
            }

        }

    }

?>




