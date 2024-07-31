<?php

/**
 * Plugin Name:       WCRH Custom Form
 * Description:       Add a custom form to your website
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Gavin McGregor
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-form
 *
 * @package Wcrh
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function wcrh_custom_form_block_init()
{
	register_block_type(__DIR__ . '/build');
}
add_action('init', 'wcrh_custom_form_block_init');


// Email Form
add_action('init', 'handle_contact_form_submission');
function handle_contact_form_submission()
{
	if (isset($_POST['form-submit'])) {

		$form = array();
		$form['name'] = sanitize_text_field($_POST['name']);
		$form['email'] = sanitize_email($_POST['email']);
		$form['phone'] = sanitize_text_field($_POST['phone']);
		$form['message'] = sanitize_textarea_field($_POST['message']);

		$message  = "<p>" . "Name: " . $form['name'] . "</p>";
		$message .= "<p>" . "Email: " . $form['email'] . "</p>";
		$message .= "<p>" . "Phone: " . $form['phone'] . "</p>";
		$message .= "<p>" . "Message: " . $form['message'] . "</p>";

		$headers = 'From: <hello@wecanrebuildhim.com>';

		$subject = 'Contact Form Submission | ' . home_url();
		$send_to = 'hello@wecanrebuildhim.com';

		if (wp_mail($send_to, $subject, $message, $headers)) {
			wp_redirect('/email-success/');
			exit;
		}
	}
}
