<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShopifyProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'shopify_product_id' => [
                'type'       => 'BIGINT',
                'null'       => false,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'image_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            // other fields...
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('shopify_products');
    }

    public function down()
    {
        $this->forge->dropTable('shopify_products');
    }
}