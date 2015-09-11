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
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('coordinates');
        echo "<li>Created  table Coordinates</li><br>";
        $coordinates = array(
                             array(
                                 'latitude' => '40.184378',
                                 'longitude' => '44.515669',
                                 'country' => 'Armenia'
                             ),
                            array(
                                'latitude' => '39.896226',
                                'longitude' => '116.256010',
                                'country' => 'China'
                            ),
                            array(
                                'latitude' => '38.888928',
                                'longitude' => '-77.013193',
                                'country' => 'Usa'
                            ),
                                array(
                                'latitude' => '55.719184',
                                'longitude' => '37.635633',
                                'country' => 'Russia'
                            ),
                            array(
                                'latitude' => '48.868006',
                                'longitude' => '2.349463',
                                'country' => 'France'
                            ),
                            array(
                                'latitude' => '41.901895',
                                'longitude' => '12.508875',
                                'country' => 'Italy'
                            )
                        );
        $this->db->insert_batch('coordinates', $coordinates);
    }

    public function down(){
        $this->dbforge->drop_table('coordinates');
    }
}