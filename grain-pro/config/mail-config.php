<?php

add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = 'smtp.mailgun.org';
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Port       = 587;
	$phpmailer->Username   = 'postmaster@mailer.grain.pro';
	$phpmailer->Password   = 'd2c1636ee9a3d0fd3b7db7131b887c95';
	$phpmailer->SMTPSecure = 'tls';
	$phpmailer->From       = 'site@grain.pro';
	$phpmailer->FromName   = 'Grain.pro WordPress';
}
