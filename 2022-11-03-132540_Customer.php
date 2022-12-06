<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id'       => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'unsigned'      => true,
            ],
            'nama_customer'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',   
            ],
            'no_customer'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '30',
            ],
            'alamat'       => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'no_telepon'       => [
                'type'          => 'INT',
                'constraint'    => '20',
            ],
            'created_at'        => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ],
            'updated_at'        => [
                'type'          => 'DATETIME',
                'null'          => TRUE,
            ],
        ]);
        $this->forge->addKey('customer_id', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
