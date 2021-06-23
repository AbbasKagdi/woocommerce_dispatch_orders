<?php 
require_once "conn.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
$status = isset($_GET['status']) ? $_GET['status'] : "all";
if($status != "all")
    $result = $woocommerce -> get('orders', array('page' => $page, 'per_page' => $per_page, 'status' => $status));

else
    $result = $woocommerce -> get('orders', array('page' => $page, 'per_page' => $per_page));

$response = $woocommerce->http->getResponse();
$headers = $response->getHeaders();
$total = $headers['x-wp-total'];

echo json_encode(array('meta'=>$total, 'data'=>$result));
?>