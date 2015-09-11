<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_shipping extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'shipping_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'shipping_price' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'shipping_img' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('shipping');
        echo "<li>Created  table Shipping</li><br>";
        $shipping = array(
            array(
                'shipping_name' => 'Plane',
                'shipping_price' => '20 ',
                'shipping_img' => 'plane.png'
            ),
            array(
                'shipping_name' => 'Post',
                'shipping_price' => '0',
                'shipping_img' => 'post.png'
            ),
            array(
                'shipping_name' => 'Ship',
                'shipping_price' => '10',
                'shipping_img' => 'ship.png'
            ),
            array(
                'shipping_name' => 'DHL',
                'shipping_price' => '100',
                'shipping_img' => 'dhl.png'
            ),
            array(
                'shipping_name' => 'TNT',
                'shipping_price' => '150',
                'shipping_img' => 'tnt.png'
            )
        );
        $this->db->insert_batch('shipping', $shipping);
    }

    public function down(){
        $this->dbforge->drop_table('shipping');
    }
}