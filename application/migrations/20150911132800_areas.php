<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_areas extends CI_Migration{

    public function up(){
//        $this->dbforge->create_db('store1');
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('areas');
        echo "<li>Created  table Areas</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('areas');
    }
}