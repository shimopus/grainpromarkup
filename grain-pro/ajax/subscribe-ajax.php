<?php

function subscribe() {
    $bidType = filter_input(INPUT_POST, 'bid-type', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $knowStation = filter_input(INPUT_POST, 'know-station', FILTER_VALIDATE_BOOLEAN);
    $station = filter_input(INPUT_POST, 'station', FILTER_SANITIZE_STRING);
    $region = filter_input(INPUT_POST, 'region', FILTER_SANITIZE_STRING);
    $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
    $locality = filter_input(INPUT_POST, 'locality', FILTER_SANITIZE_STRING);

    if (!$email) {
        exit();
    } else {
        $body = "Добавьте, пожалуйста, меня к рассылке. Я " . $bidType .
            ". Мой email " . $email . ". ";
        if ($knowStation) {
            $body = $body . "Моя станция '" . $station . "'.";
        } else {
            $body = $body . "Моя станция находится в регионе " . $region . ", " .
                "районе " . $district . ", населенном пункте " . $locality . ".";
        }

        wp_mail('subscribe@grain.pro', "Новая подписка на рассылку", $body);
    }
}

add_action('wp_ajax_subscribe', 'subscribe');
add_action('wp_ajax_nopriv_subscribe', 'subscribe');