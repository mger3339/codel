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
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'role' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
        echo "<li>Created  table Users</li><br>";
    }

    public function down(){
        $this->dbforge->drop_table('users');
    }
}