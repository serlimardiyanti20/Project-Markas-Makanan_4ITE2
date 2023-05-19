<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ingredients extends Migration
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
            'bahan' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('recipe_id', 'recipes', 'id');
        $this->forge->createTable('ingredients');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('ingredients', 'recipe_id');
        $this->forge->dropTable('ingredients');
    }
}
