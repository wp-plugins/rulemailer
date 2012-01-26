<?php
/**
 * 
 * @author   Rule Communication - Nordic AB <info@rule.se>
 * @see http://www.rulemailer.se/funktioner/wp/
 * @see Help: http://www.rulemailer.se/funktioner/wp/
 * @package RuleMailer Subscribe WP Plugin
 */

if (!function_exists('add_action')) {
    require_once("../../../wp-config.php");
    require_once("rulemailer_subscribe.php");
}

// checking if plugin enabled and POST params are sent
if (
    !is_array($_POST) or 
    !isset($_POST['email']) or
    !isset($_POST['target_list'])
) {
    die('Oops.-. This is wrong in so many ways.');
} else {
    $RuleMailerSubscribeDispatcher = new RuleMailerSubscribeDispatcher();
    $RuleMailerSubscribeDispatcher->setEmail($_POST['email']);
    $RuleMailerSubscribeDispatcher->setTargetList($_POST['target_list']);
    if (isset($_POST['custom_fields']))
        $RuleMailerSubscribeDispatcher->setCustomFields($_POST['custom_fields']);
    if ('unsubscribe' == $_POST['action'])
        $RuleMailerSubscribeDispatcher->unsubscribe();
    else
        $RuleMailerSubscribeDispatcher->subscribe();
}





