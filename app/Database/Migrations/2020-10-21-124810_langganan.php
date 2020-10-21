<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Langganan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'langgananId' => [
				'type' => 'INT',
				'constraint' => 120,
				'auto_increment' => true
			],
			'pelangganId' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			],
			'paketId' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'tanggal' => [
				'type' => 'DATE'
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

		$this->db->disableForeignKeyChecks();
		$this->forge->addPrimaryKey('langgananId');
		$this->forge->addForeignKey('pelangganId', 'pelanggan', 'pelangganId', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('paketId', 'paket', 'paketId', 'CASCADE', 'CASCADE');
		$this->forge->createTable('langganan', true, ['ENGINE' => 'InnoDB']);
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('langganan', 'true');
	}
}
