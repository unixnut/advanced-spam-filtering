<?php
/**
 * $Horde: ingo/config/prefs.php.dist,v 1.30.10.3 2008/06/15 21:14:38 chuck Exp $
 *
 * See horde/config/prefs.php for documentation on the structure of this file.
 */

// Make sure that INGO_STORAGE_* constants are defined.
require_once HORDE_BASE . '/ingo/lib/Storage.php';

// This preference group will only be displayed if the configured
// Ingo_Script:: driver can create script files.
if (!isset($_SESSION['ingo']['script_generate']) ||
    $_SESSION['ingo']['script_generate']) {
    $prefGroups['script'] = array(
        'column' => _("Other Options"),
        'label' => _("Script Updating"),
        'desc' => _("Options about script updating."),
        'members' => array('auto_update'));
}


// The following preferences are only used for Horde_Script:: drivers that use
// scripts.

// Automatically update the script?
$_prefs['auto_update'] = array(
    'value' => 1,
    'locked' => false,
    'shared' => false,
    'type' => 'checkbox',
    'desc' => _("Automatically update the script after each change?")
);

// End script preferences

// The following preferences are only used for Horde_Script:: drivers that can
// do on-demand filtering.

// Show detailed filter status messages?
// a value of 0 = no, 1 = yes
$_prefs['show_filter_msg'] = array(
    'value' => 1,
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Only filter [un]seen messages?
// Values: 0, INGO_SCRIPT_FILTER_UNSEEN, INGO_SCRIPT_FILTER_SEEN
$_prefs['filter_seen'] = array(
    'value' => 0,
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// End on-demand filtering preferences

// If NOT using the 'prefs' storage driver (see conf.php), you can comment out
// the below entries.

// Filter rules.
$_prefs['rules'] = array(
    'value' => 'a:5:{i:0;a:2:{s:4:"name";s:9:"Whitelist";s:6:"action";i:' . INGO_STORAGE_ACTION_WHITELIST . ';}i:5;a:9:{s:4:"name";s:23:"Advanced Spam Filtering";s:7:"combine";s:1:"1";s:10:"conditions";a:1:{i:0;a:4:{s:5:"field";s:13:"X-Spam-Status";s:4:"type";i:1;s:5:"match";s:11:"begins with";s:5:"value";s:3:"Yes";}}s:6:"action";s:1:"2";s:12:"action-value";s:4:"spam";s:4:"stop";s:1:"1";s:5:"flags";i:0;s:7:"disable";b:0;s:2:"id";N;}i:2;a:3:{s:4:"name";s:8:"Vacation";s:6:"action";i:' . INGO_STORAGE_ACTION_VACATION . ';s:7:"disable";b:1;}i:3;a:2:{s:4:"name";s:9:"Blacklist";s:6:"action";i:' . INGO_STORAGE_ACTION_BLACKLIST . ';}i:4;a:2:{s:4:"name";s:7:"Forward";s:6:"action";i:' . INGO_STORAGE_ACTION_FORWARD . ';}}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Blacklist.
// Lock this preference to disable blacklists.
$_prefs['blacklist'] = array(
    'value' => 'a:2:{s:1:"a";a:0:{}s:1:"f";s:0:"";}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Whitelist.
// Lock this preference to disable whitelists.
$_prefs['whitelist'] = array(
    'value' => 'a:0:{}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Vacation notices.
// Lock this preference to disable vacation notices.
$_prefs['vacation'] = array(
    'value' => 'a:8:{s:9:"addresses";a:0:{}s:4:"days";i:7;s:8:"excludes";a:0:{}s:10:"ignorelist";b:1;s:6:"reason";s:0:"";s:7:"subject";s:0:"";s:5:"start";i:0;s:3:"end";i:0;}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Forwarding.
// Lock this preference to disable forwarding.
$_prefs['forward'] = array(
    'value' => 'a:2:{s:1:"a";a:0:{}s:1:"k";i:0;}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);

// Spam rule.
// Lock this preference to disable the spam rule.
$_prefs['spam'] = array(
    'value' => 'a:2:{s:6:"folder";N;s:5:"level";i:5;}',
    'locked' => false,
    'shared' => false,
    'type' => 'implicit'
);
