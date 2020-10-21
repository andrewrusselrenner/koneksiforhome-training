<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paket extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'paketId' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'nama_paket' => [
				'type' => 'VARCHAR',
				'constraint' => 80
			],
			'internet' => [
				'type' => 'VARCHAR',
				'constraint' => 40
			],
			'useetv' => [
				'type' => 'VARCHAR',
				'constraint' => 80
			],
			'kategori' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'price' => [
				'type' => 'INT',
				'constraint' => 100
			],
			'pajak' => [
				'type' => 'INT',
				'constraint' => 80
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

		$this->forge->addPrimaryKey('paketId');
		$this->forge->createTable('paket', true, ['ENGINE' => 'InnoDB']);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('paket', true);
	}
}
