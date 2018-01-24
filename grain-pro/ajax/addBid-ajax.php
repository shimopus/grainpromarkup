<?php

function addBid() {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phoneNumber = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_NUMBER_INT);
    $bidType = filter_input(INPUT_POST, 'bid-type', FILTER_SANITIZE_STRING);
    $ownerInn = filter_input(INPUT_POST, 'owner_inn', FILTER_SANITIZE_NUMBER_INT);
    $elevatorInn = filter_input(INPUT_POST, 'elevator_inn', FILTER_SANITIZE_NUMBER_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
    $volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT);

    if (!$phoneNumber && !$email) {
        exit();
    } else {
        $attachments = array();
     	$uploadedfile = $_FILES['attachmentFile'];

     	if ($uploadedfile) {
            //Get the uploaded file information
            $name_of_uploaded_file =
                basename($uploadedfile['name']);

            //get the file extension of the file
            $type_of_uploaded_file =
                substr($name_of_uploaded_file,
                    strrpos($name_of_uploaded_file, '.') + 1);

            $size_of_uploaded_file =
                $_FILES["uploaded_file"]["size"]/1024/1024;//size in Mbs

            //Settings
            $max_allowed_file_size = 10; // size in Mbs
            $allowed_extensions = array("jpg", "jpeg", "png", "pdf");

            //Validations
            $allowed_file_size = !($size_of_uploaded_file > $max_allowed_file_size);

            //------ Validate the file extension -----
            $allowed_ext = false;
            for($i=0; $i<sizeof($allowed_extensions); $i++)
            {
              if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
              {
                $allowed_ext = true;
              }
            }

            if (!allowed_file_size || !allowed_ext) {
                exit();
            }

            if ( ! function_exists( 'wp_handle_upload' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }

            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

            if ( $movefile && ! isset( $movefile['error'] ) ) {
                $movefile['url'];
            }

            $headers = '';
            $attachments = array($movefile['file']);
        }

        wp_mail('subscribe@grain.pro', "Новая заявка" ,
            "Добавьте, пожалуйста, новую заявку " . $bidType .
            " на элеваторе с ИНН " . $elevatorInn .
            " по цене " . $price .
            " с объемом " . $volume . ". " .
            "Информация обо мне. email - " . $email .
            ", телефон - " . $phoneNumber .
            ", ИНН - " . $ownerInn . ".",
            $headers,
            $attachments
        );

        if ($uploadedfile) {
     	    unlink( $movefile['file'] );
     	}
    }
}

add_action('wp_ajax_add-bid', 'addBid');
add_action('wp_ajax_nopriv_add-bid', 'addBid');