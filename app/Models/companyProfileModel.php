<?php

    namespace App\Models;

    class companyProfileModel extends \CodeIgniter\Model 
    {

        public function __construct()
        {
            parent::__construct();
        }

        protected $table = 'companyprofile'; // Give the table name

        protected $allowedFields=['company_acc', 'companyname', 'companydesc', 'jobcategories', 'employment_types']; 
        protected $returnType = 'App\Entities\companyProfileModel';

    }

?>

