<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecipesCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'recipe_id' => [
                'type' => 'int',
            ],
            'category_id' => [
                'type' => 'int'
            ],
        ]);
        // $this->forge->addForeignKey('recipe_id', 'recipes', 'id');
        // $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->createTable('recipes_categories');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('recipes_categories', 'recipe_id');
        // $this->forge->dropForeignKey('recipes_categories', 'category_id');
        $this->forge->dropTable('recipes_categories');
    }
}
