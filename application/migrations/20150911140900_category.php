<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_category extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('category');
        echo "<li>Created  table Category</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('category');
    }
}