<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdvertApply extends Migration
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
            'advertid'=>[ // advertisement ID
                'type'=>'INT',
                'constraint'=>5,
                'unsigned'=>true,
            ],
            'advertowner'=>[ // advertisement owner's account ID
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'applicantid'=>[ // applicant's account ID
                'type'=>'INT',
                'constraint'=>5,
                'unsigned'=>true,
            ],
            'fname'=>[ // Applying applicant's first name 
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'lname'=>[ // Applying applicant's last name 
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'email'=>[ // Applying applicant's email address 
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'contact'=>[ // Applying applicant's contact number
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'message'=>[ // Short message from applicant
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'file'=>[ // file name of the uploaded CV
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('AdvertApply'); 
    }

    public function down()
    {
        $this->forge->dropTable('AdvertApply'); 
    }
}
