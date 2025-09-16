<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersTest extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => '000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'username' => 'user1',
                'password' => '111',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'username' => 'user2',
                'password' => '222',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'username' => 'user3',
                'password' => '333',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'username' => 'user4',
                'password' => '444',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
