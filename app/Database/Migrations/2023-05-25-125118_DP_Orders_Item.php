<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DP_Orders_Item extends Migration
{

    public function up()
    {
        //
        $this->forge->addField('id');
        $this->forge->addField([

            'id_pelanggan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nama_pelanggan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],

            'item_name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],

            'jenis_item'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'no_tlpn'            => [
                'type'           => 'VARCHAR',
                'constraint'     => '12',
            ],
            'size' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'quantity'           => [
                'type'           => 'INT',
                'constraint'     => 5
            ],
            'price'        => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('order_items');
    }

    public function down()
    {
        //
        $this->forge->dropTable('order_items');
    }
}
