<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once( BASEPATH .'core/Controller.php');
require_once( APPPATH .'views/Home.php');

$db =& get_instance();
$res = $db->get_data();
print_r($res);