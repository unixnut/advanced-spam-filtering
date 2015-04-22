<?php
// Filter rules.
// Only the ordering is different to prefs.php; Spam Filter comes second,
// followed by Blacklist
$_prefs['rules'] = array(
    'value' => 'a:5:{i:0;a:2:{s:4:"name";s:9:"Whitelist";s:6:"action";i:' . Ingo_Storage::ACTION_WHITELIST . ';}i:3;a:3:{s:4:"name";s:8:"Vacation";s:6:"action";i:' . Ingo_Storage::ACTION_VACATION . ';s:7:"disable";b:1;}i:2;a:2:{s:4:"name";s:9:"Blacklist";s:6:"action";i:' . Ingo_Storage::ACTION_BLACKLIST . ';}i:1;a:3:{s:4:"name";s:11:"Spam Filter";s:6:"action";i:' . Ingo_Storage::ACTION_SPAM . ';s:7:"disable";b:1;}i:5;a:2:{s:4:"name";s:7:"Forward";s:6:"action";i:' . Ingo_Storage::ACTION_FORWARD . ';}}',
    'locked' => false,
    'type' => 'implicit'
);

// Spam rule.
$_prefs['spam'] = array(
    'value' => 'a:2:{s:6:"folder";s:4:"spam";s:5:"level";i:5;}',
    // Lock this preference to disable the spam rule.
    'locked' => false,
    'type' => 'implicit'
);

// End preferences storage driver entries
