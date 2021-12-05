<?php
namespace App\Models;

class adModel extends \CodeIgniter\Model
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $table = 'adverts'; // Give the table name

    // List the columns from the database that we want to use. id is autoincremented, so its not necessary. 
    protected $allowedFields=['jobname', 'advertowner', 'company_name', 'position', 'category', 'location', 'experience', 'salary', 'wfh', 'description', 'poster', 'approved']; 
    protected $returnType = 'App\Entities\Ads';
}

?>

