<?php
namespace App\Models;

class applyModel extends \CodeIgniter\Model
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $table = 'advertapply'; // Give the table name

    // List the columns from the database that we want to use. id is autoincremented, so its not necessary. 
    protected $allowedFields = ['advertid', 'applicantid', 'advertowner', 'fname', 'lname', 'email', 'contact', 'message', 'file']; 
    protected $returnType = 'App\Entities\Apply';
}

?>

