<?php
include_once('confi.php');
error_reporting(E_ALL);

//Get the variables here
$username = isset($_GET['username']) ? mysql_real_escape_string($_GET['username']) :  "";
$password = isset($_GET['password']) ? mysql_real_escape_string($_GET['password']) :  "";
//Get the variables here end
$insertstatement = 'SELECT count(*) co FROM `mytesttable` WHERE username="'.$username.'" AND password="'.$password.'"';

$query123 = mysql_query($insertstatement) or trigger_error(mysql_error()." ".$insertstatement);

while($r = mysql_fetch_array($query123)){
			extract($r);
//echo "count star is $co";
    
}
$co = (int)$co;
$customer_id = '';
if($co == 1){
    //User is availaible
   
$result = array();
$result[] = array("customer_id" => $customer_id,"status" => 1);
}

if($co != 1){
    //User is not availaible
   
    $result = array();
$result[] = array("status" => 0);
}

/* Output header */
	header('Content-type: application/json');
	echo json_encode($result);

?>