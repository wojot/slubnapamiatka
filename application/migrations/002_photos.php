<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Photos extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_photo' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'order' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id_photo', TRUE);
        $this->dbforge->create_table('photos');
    }

    public function down()
    {
        $this->dbforge->drop_table('photos');
    }
}