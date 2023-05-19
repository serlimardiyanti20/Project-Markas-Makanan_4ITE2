<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
class UserRole extends Migration
{
    public function up()
    {
        $field = ['role_id' => ['type' => 'int']];
        $this->forge->addColumn('users', $field);
        // $this->forge->addForeignKey('role_id', 'roles', 'id');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('users', 'role_id');
        $this->forge->dropColumn('users', 'role_id');
    }
}
