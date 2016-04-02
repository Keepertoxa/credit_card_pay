<?php
require_once 'db.php';
$order_number = isset($_REQUEST['order_number']) ? $_REQUEST['order_number'] : ''; 
$cash = isset($_REQUEST['cash']) ? $_REQUEST['cash'] : ''; 
$currency = isset($_REQUEST['currency']) ? $_REQUEST['currency'] : ''; 
$card_number1 = isset($_REQUEST['card_number1']) ? $_REQUEST['card_number1'] : ''; 
$card_number2 = isset($_REQUEST['card_number2']) ? $_REQUEST['card_number2'] : ''; 
$card_number3 = isset($_REQUEST['card_number3']) ? $_REQUEST['card_number3'] : ''; 
$card_number4 = isset($_REQUEST['card_number4']) ? $_REQUEST['card_number4'] : ''; 
$v_name = isset($_REQUEST['v_name']) ? $_REQUEST['v_name'] : ''; 
$month = isset($_REQUEST['month']) ? $_REQUEST['month'] : ''; 
$year = isset($_REQUEST['year']) ? $_REQUEST['year'] : ''; 
$cvv = isset($_REQUEST['cvv']) ? $_REQUEST['cvv'] : ''; 

$link->query("INSERT INTO payments
SET order_number = '$order_number',
cash = '$cash',
currency = '$currency',
card_number = '$card_number1$card_number2$card_number3$card_number4',
v_name = '$v_name',
month = '$month',
year = '$year',
cvv = '$cvv'");
if ($link->affected_rows == 1){ 
echo '<script type="text/javascript">window.location = "orders.php"</script>';
}
else {
echo '<h1 class="text-center">Что-то пошло не так при попытке оплатить с карты, попробуйте ещё раз.</h1>';
}
exit;
?>