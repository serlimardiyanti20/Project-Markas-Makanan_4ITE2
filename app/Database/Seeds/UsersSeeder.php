<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => md5('admin123'),
            'role_id' => 1
        ]);
        $this->db->table('users')->insert([
            'nama' => 'User',
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => md5('user123'),
            'role_id' => 2
        ]);
    }
}
