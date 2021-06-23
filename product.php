<?php

require "conn.php";
echo json_encode($woocommerce -> get('orders')); 

?>