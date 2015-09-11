<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_cart extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'product_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'count' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cart');
        echo "<li>Created  table Cart</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('cart');
    }
}