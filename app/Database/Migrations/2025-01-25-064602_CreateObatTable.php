<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateObatTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'nama_obat' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'harga' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
        ],
        'stok' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('obat');
}

    public function down()
    {
        //
    }
}
