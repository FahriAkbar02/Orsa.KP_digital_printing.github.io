<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pesanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_costomer' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'item_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_item' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'size' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id_pesanan', true);
        $this->forge->addForeignKey('id_costomer', 'Pelanggan', 'id_costomer', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('Pesanan');
    }
}
