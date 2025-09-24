<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersTest extends Seeder
{
    public function run()
    {
        $users = [
            [
                'user' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null

            ],
            [
                'user' => 'joao',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null
            ],
            [
                'user' => 'paulo',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null
            ],
            [
                'user' => 'nara',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null
            ],
        ];

        $this->db->table('users')->insertBatch($users);

    }
}
