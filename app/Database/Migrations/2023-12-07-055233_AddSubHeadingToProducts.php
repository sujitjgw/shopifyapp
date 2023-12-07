<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubHeadingToProducts extends Migration
{
    public function up()
{
    $fields = [
        'sub_heading' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => true, // if you want this field to be optional
        ],
    ];
    $this->forge->addColumn('shopify_products', $fields);
}

public function down()
{
    $this->forge->dropColumn('shopify_products', 'sub_heading');
}

}
