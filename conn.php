<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'https://tpgreen.shop/',
    'ck_f051cb51f8270a0f23fea0e880a3f94252809078',
    'cs_4b3c7e049485f456d612a92c9e3b4487a527be87',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true, // Force Basic Authentication as query string true and using under HTTPS
        'timeout'=> 10
    ]
);
?>