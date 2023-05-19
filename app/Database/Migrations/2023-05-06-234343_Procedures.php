<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Procedures extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'recipe_id' => [
                'type' => 'int'
            ],
            'prosedur' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'desc' => [
                'type' => 'text'
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('recipe_id', 'recipes', 'id');
        $this->forge->createTable('procedures');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('procedures', 'recipe_id');
        $this->forge->dropTable('procedures');
    }
}
