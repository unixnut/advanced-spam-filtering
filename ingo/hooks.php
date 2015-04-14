<?php
/**
 * Ingo Hooks configuration file.
 *
 * For more information please see the horde/config/hooks.php.dist file.
 */

// The _ingo_hook_vacation_addresses function sets the
// default addresses used for the vacation module in Ingo. If you don't want
// to lock users to the list of addresses provided by this hook, you also need
// to disable the appropriate setting in Ingo's configuration.

if (!function_exists('_ingo_hook_vacation_addresses')) {
    function _ingo_hook_vacation_addresses($user = null)
    {
        return array($user . '@volleyballwa.com.au');
    }
}
