<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_coordinates extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'latitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'longitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'country_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('coordinates');
        echo "<li>Created  table Coordinates</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('coordinates');
    }
}