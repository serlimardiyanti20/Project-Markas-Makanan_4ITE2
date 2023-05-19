<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->insert(['role' => 'Admin']);
        $this->db->table('roles')->insert(['role' => 'User']);
    }
}
