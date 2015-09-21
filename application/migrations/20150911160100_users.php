<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'login' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
        echo "<li>Created  table Users</li><br>";
        $users = array(
            array(
                'login' => 'mher',
                'password' => '123123'
            )
        );
        $this->db->insert_batch('users', $users);
    }

    public function down(){
        $this->dbforge->drop_table('users');
    }
}