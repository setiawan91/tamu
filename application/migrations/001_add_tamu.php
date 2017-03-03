<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tamu extends CI_Migration {

	public function up()
	{
		// Drop table 'tamu' if it exists		
		$this->dbforge->drop_table('tamu', TRUE);

		// Table structure for table 'tamu'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'telp' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'alamat' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('tamu');

		// Dumping data for table 'tamu'
		$data = array(
			array(
				'id' => '1',
				'nama' => 'Mastrayasa',
				'telp' => '085241265975',
				'alamat' => 'Jl. Adas No 124 Bantul Yogyakarta',
			)
		);
		$this->db->insert_batch('tamu', $data);

		

	}

	public function down()
	{
		$this->dbforge->drop_table('tamu', TRUE);
	}
}
