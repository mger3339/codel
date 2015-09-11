<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_slider extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('slider');
        echo "<li>Created  table Slider</li><br>";
        $slider = array(
            array(
                'img' => 'Atemberaubend-und-unwiderstehlich.jpg'
            ),
            array(
                'img' => 'iphone618.jpg'
            ),
            array(
                'img' => 'Notebook-HP-G42-431BR_3.jpg'
            ),
            array(
                'img' => 'samsung.jpg'
            ),
            array(
                'img' => 'watch1.jpg'
            ),
            array(
                'img' => 'images.jpg'
            ),
            array(
                'img' => 'images_(1).jpg'
            )
        );
        $this->db->insert_batch('slider', $slider);
    }

    public function down(){
        $this->dbforge->drop_table('slider');
    }
}