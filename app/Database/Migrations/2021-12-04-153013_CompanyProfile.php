<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyProfile extends Migration
{
    public function up()
    {   

        $this->forge->addField([

            'id'=>[
                'type'=>'INT',
                'constraint'=>5,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'company_acc'=>[ // company account's ID
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'companyname'=>[ // Company's profile name
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'companydesc'=>[ // Company's description
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'jobcategories'=>[ // Job categories that the company offers 
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'employment_types'=>[ // Types of employments that the company deals with
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            
        ]);


        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('CompanyProfile'); 
    }

    public function down()
    {
        $this->forge->dropTable('CompanyProfile'); 
    }
}
