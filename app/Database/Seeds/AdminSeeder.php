<?php

    namespace App\Database\Seeds;
    use CodeIgniter\Database\Seeder;

    class AdminSeeder extends Seeder
    {
        public function run()
        {

            // Seeder file creates dummy data for the database when run.

            $data = [
                'id' => 1,
                'fname' => 'Admin',
                'lname' => 'Admin',
                'email' => 'admin123@admin.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'type' => 'Admin',
                'new' => 'No',
                'approved' => 'Yes'
            ];

            $this->db->table('registrations')->insert($data);
        }
        
    }

?>