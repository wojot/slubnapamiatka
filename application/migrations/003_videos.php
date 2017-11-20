<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Videos extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_video' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
        ));
        $this->dbforge->add_key('id_video', TRUE);
        $this->dbforge->create_table('videos');
    }

    public function down()
    {
        $this->dbforge->drop_table('videos');
    }
}