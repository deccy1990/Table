<?php
// TT284 CRUD APP (ITERATION B)
// VALIDATE DATA
// "require" this file to check the submitted form data and set $valid to true or false
// feedback (if any) is placed in $feedback, keyed by column name

// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
if (!defined('SAFE_TO_RUN')) {
    // Prevent direct execution - show a warning instead
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
?>

<div class="report file">
    Executing: <?php _e(basename(__FILE__)) ?>
</div>

<div class="report">
    Validating data submitted to the server
</div>

<?php
// Assume data is valid until we find an error
$valid = true;
// Start with no feedback
$feedback = [];

// TODO: Change these checks according to the columns/formats you expect

// Reference for preg_match: https://www.w3schools.com/php/func_regex_preg_match.asp
// Reference for filter_var: https://www.w3schools.com/php/func_filter_var.asp
// Note that preg_match and filter_var take different parameters
// Try out regular expressions at e.g. https://regex101.com/

// If you see a "Notice: Undefined index" message, check that each name you validate
// in $data has an input with that name (not id) in the HTML data form

$value = $data['firstname'];
// ^$ = anchors, [a-zA-Z ] = letters/spaces, {1,30} = 1-30 characters
$format = "/^[a-zA-Z ]{1,30}$/";
// If value does NOT match the format then it is invalid
if (!preg_match($format, $value)) {
    $feedback['firstname'] = 'Server feedback: Only 1-30 letters/spaces are permitted';
    $valid = false;
}

$value = $data['lastname'];
// ^$ = anchors, [a-zA-Z ] = letters/spaces, {1,30} = 1-30 characters
$format = "/^[a-zA-Z ]{1,30}$/";
// If value does NOT match the format then it is invalid
if (!preg_match($format, $value)) {
    $feedback['lastname'] = 'Server feedback: Only 1-30 letters/spaces are permitted';
    $valid = false;
}

$value = $data['email'];
// If value does NOT match the filter then it is invalid
if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
    $feedback['email'] = 'Server feedback: Only valid email addresses are permitted';
    $valid = false;
}
// Also check the maximum length for this field as filter_var doesn't do this
if (strlen($value) > 50) {
    $feedback['email'] = 'Server feedback: Email must be 50 characters or less';
    $valid = false;
}
$value = $data['telephone'];
// ^$ = anchors, [0-9] = digits, {8,12} = 8-12 digits
$format = "/^[0-9]{8,12}$/";
// If value does NOT match the format then it is invalid
if (!preg_match($format, $value)) {
    $feedback['telephone'] = 'Server feedback: Only 8-12 digits allowed';
    $valid = false;
}

if (!$valid) {
    echo '<div class="report message always">Server message: Form data is invalid - please check and try again!</div>';
}
