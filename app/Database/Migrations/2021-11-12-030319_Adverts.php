<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adverts extends Migration
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
            'advertowner'=>[
                'type'=>'INT',
                'constraint'=>5,
                'unsigned'=>true,
            ],
            'jobname'=>[ // job's title section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'company_name'=>[ // company's name section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],  
            'position'=>[ // job's position name section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],  
            'category'=>[ // job catergory section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'location'=>[ // job ad's location section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'experience'=>[ // job ad's experience section
                'type'=>'VARCHAR',
                'constraint'=>50,
            ],
            'salary'=>[ // salary section
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'wfh'=>[ // Work from home section
                'type'=>'VARCHAR',
                'constraint'=>20,
            ], 
            'description'=>[ // description section
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'poster'=>[ // Sets the advert's poster name
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            'approved'=>[ // Sets the advertisement approval (if admin approved or not)
                'type'=>'VARCHAR',
                'constraint'=>255,
            ],
            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('Adverts');
    }

    public function down()
    {
        // drops table when running the cmd command 'php spark migrate:rollback'
        $this->forge->dropTable('Adverts'); 
    }
}
