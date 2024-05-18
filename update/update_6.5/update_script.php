<?php
$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();

$home_section_enable_disable = array('key' => 'top_course_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'latest_course_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'top_category_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'upcoming_course_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'faq_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'top_instructor_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'motivational_speech_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$home_section_enable_disable = array('key' => 'promotional_section','value' => '1');
$CI->db->insert('frontend_settings', $home_section_enable_disable);

$payment_gateway = array(
    'identifier' => 'xendit',
    'currency' => 'USD',
    'title' => 'Xendit',
    'keys' => '{"api_key":"xnd_development_44KVee2PG4HeeZxG69R5eXOJHVD7t84FZUIH8dMxa37ZU3bZ8KDKV9ugPfy5fRK","secret_key":"your_xendit_secret_key","other_parameter":"value"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'payu',
    'currency' => 'PLN',
    'title' => 'Payu',
    'keys' => '{"pos_id":"473444","second_key":"e290d48271f6c524e1551a9c8a1fc41b","client_id":"473444","client_secret":"8d4f6d74bb71bdcda3f51be258ea9df9"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'pagseguro',
    'currency' => 'USD',
    'title' => 'Pagseguro',
    'keys' => '{"api_key":"your_pagseguro_api_key","secret_key":"your_pagseguro_secret_key","other_parameter":"value"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'sslcommerz',
    'currency' => 'BDT',
    'title' => 'SSL Commerz',
    'keys' => '{"store_id":"sslcommerz_store_id","store_password":"sslcommerz_store_password"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'skrill',
    'currency' => 'USD',
    'title' => 'Skrill',
    'keys' => '{"skrill_merchant_email":"urwatech@gmail.com","secret_passphrase":"your_skrill_secret_key"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'doku',
    'currency' => 'USD',
    'title' => 'Doku',
    'keys' => '{"client_id":"BRN-0271-1700996849302","shared_key":"SK-BxOS4PfUdIEMHLccyMI3"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'bkash',
    'currency' => 'BDT',
    'title' => 'Bkash',
    'keys' => '{"app_key":"app-key","app_secret":"app-secret","username":"username","password":"passwoed"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'cashfree',
    'currency' => 'INR',
    'title' => 'CashFree',
    'keys' => '{"client_id":"TEST100748308df0665cabda6c2f38b903847001","client_secret":"cfsk_ma_test_71065d7cadf8695e7845e86244bd7011_fff5714b"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);

$payment_gateway = array(
    'identifier' => 'maxicash',
    'currency' => 'USD',
    'title' => 'Maxicash',
    'keys' => '{"merchant_id":"TEST100748308df0665cabda6c2f38b903847001","merchant_password":"cfsk_ma_test_71065d7cadf8695e7845e86244bd7011_fff5714b"}',
    'model_name' => 'Payment_model',
    'enabled_test_mode' => '0',
    'status' => '1',
    'is_addon' => '0',
    'created_at' => '1699525375',
    'updated_at' => '1699525375'
);
$CI->db->insert('payment_gateways', $payment_gateway);


// update VERSION NUMBER INSIDE SETTINGS TABLE
$settings_data = array('value' => '6.5');
$CI->db->where('key', 'version');
$CI->db->update('settings', $settings_data);