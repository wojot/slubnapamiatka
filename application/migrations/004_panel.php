<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Panel extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_panel' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'photo_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'video_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'photo_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));
        $this->dbforge->add_key('id_panel', TRUE);
        $this->dbforge->create_table('panel');
    }

    public function down()
    {
        $this->dbforge->drop_table('panel');
    }
}