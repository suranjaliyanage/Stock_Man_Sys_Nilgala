<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) 
{ 

 $sql = "UPDATE purchaseorder SET deleted = 1 WHERE pOrderID = {$orderId}";

 //$orderItem = "UPDATE order_item SET order_item_status = 2 WHERE  order_id = {$orderId}";

 if($connect->query($sql) === TRUE) 
 {
 	$valid['success'] = true;
	$valid['messages'] = "Order Successfully removed...";		
 } 
 else 
 {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while removing the order...";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST