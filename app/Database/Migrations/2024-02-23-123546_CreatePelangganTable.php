<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_costomer' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'Alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'Telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_costomer', true);
        $this->forge->createTable('Pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('Pelanggan');
    }
}
