<?php

function feedback() {
    $theme = filter_input(INPUT_POST, 'theme', FILTER_SANITIZE_STRING);
    $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!$email) {
        exit();
    } else {
        wp_mail('shimopus@gmail.com', "Новый запрос с темой '" . $theme . "'" ,
            "Мой email " . $email . ". \r\n" .
            "Мое сообщение: '" . $feedback . "'");
    }
}

add_action('wp_ajax_feedback', 'feedback');
add_action('wp_ajax_nopriv_feedback', 'feedback');