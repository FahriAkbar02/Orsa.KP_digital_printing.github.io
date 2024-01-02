<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Data_Customer extends Migration
{
    public function up()
    {
        //
        $this->forge->addField('id');
        $this->forge->addField([
            
            'id_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
           
            'jenis_produk'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            
            'jenis'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'jumlah'          => [
                'type'           => 'INT',
                'constraint'     => '255',
            ],
            'ukuran'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'no_tlpn'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '12',
            ],
            'tanggal'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '110',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'            => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('data_table');
    }

    public function down()
    {
        //
        $this->forge->dropTable('data_table');
    }
}
