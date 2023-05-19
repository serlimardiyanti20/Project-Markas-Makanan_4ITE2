<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Recipes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'int',
            ],
            'judul' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'content' => [
                'type' => 'text',
            ],
            'durasi' => [
                'type' => 'float',
            ],
            'kesulitan' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'photo' => [
                'type' => 'text'
            ],
            'created_at' => [
                'type' => 'timestamp',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'default' => null
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('recipes');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('recipes', 'user_id');
        $this->forge->dropTable('recipes');
    }
}
