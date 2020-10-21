<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pelangganId' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'jenis_kelamin' => [
				'type' => 'ENUM',
				'constraint' => ['Laki-Laki', 'Perempuan'],
				'default' => 'Laki-Laki'
			],
			'alamat' => [
				'type' => 'TEXT'
			],
			'telpon' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'created_at' => [
				'type' => 'TIMESTAMP'
			],
			'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
			]
		]);

		$this->forge->addPrimaryKey('pelangganId');
		$this->forge->createTable('pelanggan', true, ['ENGINE' => 'InnoDB']);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan', true);
	}
}
