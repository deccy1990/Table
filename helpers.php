<?php
// HELPER FUNCTIONS
// "require" this file to make use of these functions

// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
if (!defined('SAFE_TO_RUN')) {
    // Prevent direct execution - show a warning instead
    die(basename(__FILE__)  . ' cannot be executed directly!');
}

// To output text safely, it must be escaped using htmlspecialchars()
// These helper functions save typing, so e.g.:
// _e($boop);
// is equivalent to:
// echo htmlspecialchars($boop);

// Also, PHP outputs 'notices' when you access an array item that doesn't exist
// These helper functions save typing, so e.g.:
// _e($data, 'email');
// is equivalent to:
// if (!empty($data['email'])) {
//     echo htmlspecialchars($data['email']);
// }

function _x($variable)
{
    return htmlspecialchars($variable);
}

function _e($variable, $key = null)
{
    if (is_array($variable) and $key != null) {
        if (!empty($variable[$key])) {
            echo _x($variable[$key]);
        }
    } else {
        echo _x($variable);
    }
}
