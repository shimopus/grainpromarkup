<?php
/**
 * Template Name: Таблица заявок
 */

get_header();

$bidTypeField = get_field_object('bids_type');
$bidTypeValue = $bidTypeField['value'];
$bidTypeKey = $bidTypeField['choices'][$bidTypeValue];

$api_request = "https://grainpro.herokuapp.com/pages/market-table/site?bidType=".$bidTypeKey;

$tableHTML = wp_remote_retrieve_body(wp_remote_get($api_request));

print $tableHTML;

?>



<?php
get_sidebar();
get_footer();

