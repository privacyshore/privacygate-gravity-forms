<?php
/*
Plugin Name: PrivacyGate Payments For Gravity Forms
Plugin URI: https://dash.privacygate.io/
Description: Integrates Gravity Forms with PrivacyGate Payments. PrivacyGate is a service that enables merchants to accept multiple cryptocurrencies directly into a user-controlled wallet.
Version: 1.0.0
Author: PrivacyGate
Author URI: https://dash.privacygate.io
License: GPL-2.0+
Text Domain: gf-privacygate
*/
define('GF_PRIVACYGATE_VERSION', '1.0.0');
define('GF_PRIVACYGATE_SLUG', 'gf-privacygate');
define('PLUGIN_BASENAME', plugin_basename(__FILE__));
define('PLUGIN_FILE', __FILE__);

add_action('gform_loaded', 'load_gf_privacygate_plugin', 5);

function load_gf_privacygate_plugin()
{
    if (!method_exists('GFForms', 'include_addon_framework')) {
        return;
    }

    require_once('class.GFPrivacyGatePlugin.php');
    GFAddOn::register('GFPrivacyGatePlugin');
    add_action('wp', array('GFPrivacyGatePlugin', 'process_confirmation'), 5);
}
