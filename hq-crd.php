<?php
/*
Plugin Name: Civil Right Defenders - DIDI
Plugin URI: https://crd.org/database/
Description: Defenders’ Database (DiDi)
Version: 1.0.5
Author: Caag Software
Author URI: https://caagsoftware.com
Text Domain: civil-right-defenders-didi
*/

namespace DIDIPlugin;
require_once('includes/autoloader.php');
if (!defined('WPINC')) {
    die;
}
use DIDIPlugin\DIDIBootstrap\DIDIBootstrapPlugin;
$bootstraper = new DIDIBootstrapPlugin();
define( 'CRD_DIDI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );