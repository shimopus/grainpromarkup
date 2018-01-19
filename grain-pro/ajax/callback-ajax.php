<?php

function callback() {
    $phoneNumber = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_NUMBER_INT);

    if (!$phoneNumber) {
        exit();
    } else {
        wp_mail('subscribe@grain.pro', "Перезвоните мне" , "Перезвоните, пожалуйста, мне на номер " . $phoneNumber);
    }
}

add_action('wp_ajax_callback', 'callback');
add_action('wp_ajax_nopriv_callback', 'callback');