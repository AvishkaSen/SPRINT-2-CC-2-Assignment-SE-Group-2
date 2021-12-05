<?php

    namespace App\Models;

    class userModel extends \CodeIgniter\Model 
    {

        public function __construct()
        {
            parent::__construct();
        }

        protected $table = 'registrations'; // Give the table name

        protected $allowedFields=['fname', 'lname', 'email', 'password', 'type', 'new', 'approved']; 
        protected $returnType = 'App\Entities\Users';

    }

?>

