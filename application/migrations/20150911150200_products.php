<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_products extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'desc' => array(
                'type' => 'TEXT',
            ),
            'price' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'area_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'total' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');
        echo "<li>Created  table Products</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('products');
    }
}