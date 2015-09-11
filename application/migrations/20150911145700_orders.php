<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_orders extends CI_Migration{

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
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'category_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'product_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'count' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');
        echo "<li>Created  table Orders</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('orders');
    }
}