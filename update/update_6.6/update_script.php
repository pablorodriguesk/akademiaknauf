<?php
$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();


$field1 = array(
    'receiver' => array(
        'type' => 'INT',
        'constraint' => '20',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_column('message', $field1);

$field2 = array(
    'temp' => array(
        'type' => 'TEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_column('users', $field2);

$field3 = array(
    'audio_url' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_column('lesson', $field3);



$newsletter_histories = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 20,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'subject' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'description' => array(
        'type' => 'LONGTEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'tried_times' => array(
        'type' => 'INT',
        'constraint' => '11',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'status' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'sent_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'created_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_field($newsletter_histories);
$CI->dbforge->add_key('id', TRUE);
$CI->dbforge->create_table('newsletter_histories', TRUE);


$bbb_meetings = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 20,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'course_id' => array(
        'type' => 'INT',
        'constraint' => '20',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'meeting_id' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'moderator_pw' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'viewer_pw' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'instructions' => array(
        'type' => 'LONGTEXT',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'created_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE,
        'collation' => 'utf8_unicode_ci'
    )
);
$CI->dbforge->add_field($bbb_meetings);
$CI->dbforge->add_key('id', TRUE);
$CI->dbforge->create_table('bbb_meetings', TRUE);


$wasabiConfig1 = array('key' => 'wasabi_key','value' => '');
$CI->db->insert('settings', $wasabiConfig1);

$wasabiConfig2 = array('key' => 'wasabi_secret_key','value' => '');
$CI->db->insert('settings', $wasabiConfig2);

$wasabiConfig3 = array('key' => 'wasabi_bucketname','value' => '');
$CI->db->insert('settings', $wasabiConfig3);

$wasabiConfig4 = array('key' => 'wasabi_region','value' => '');
$CI->db->insert('settings', $wasabiConfig4);

$bbb_setting = array('key' => 'bbb_setting','value' => '{"endpoint":"BigBlueButton Endpoint","secret":"6Hs6eYW8-xxxxxxxx"}');
$CI->db->insert('settings', $bbb_setting);


// update VERSION NUMBER INSIDE SETTINGS TABLE
$settings_data = array('value' => '6.6');
$CI->db->where('key', 'version');
$CI->db->update('settings', $settings_data);