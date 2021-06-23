<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'https://tpgreen.shop/',
    'ck_xxx',
    'cs_xxx',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true, // Force Basic Authentication as query string true and using under HTTPS
        'timeout'=> 10
    ]
);
?>
