<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Заказы</title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,cyrillic,cyrillic-ext">
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
<style>
* { font-family:Calibri }
</style>
<link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
<p class="nav text-center">
<a class="linkes" href="index.php">Оплата</a>
<a class="linkes" href="orders.php">Заказы</a>
</p>
<?php 
$hostname = "localhost";
$username = "u0074366_card";
$password = "crcard9911@";
$dbName = "u0074366_card";

mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
 
mysql_select_db($dbName) or die (mysql_error());
 
if ( !isset( $_GET["action"] ) ) $_GET["action"] = "showlist";  
  
switch ( $_GET["action"] ) 
{ 
  case "showlist":
    show_list(); break;
  case "editform":
    get_edit_item_form(); break; 
  case "update":
    update_item(); break; 
  case "delete":
    delete_item(); break;
  default: 
    show_list(); 
}

// Функция выводит список всех записей в таблице БД
function show_list() 
{ 
  $query = 'SELECT id, order_number, cash, currency, card_number, v_name, month, year, cvv FROM payments WHERE 1'; 
  $res = mysql_query( $query ); 
  echo '<h1 class="text-center">Совершённые платежи</h1>'; 
  echo '<div class="col-md-8 col-md-offset-2"><table class="text-center orders" border="1" cellpadding="2" cellspacing="0">'; 
  echo '<tr><th>ID</th><th>Номер заказа</th><th>Стоимость</th><th>Валюта</th><th>Номер карты</th><th>Владелец</th><th>Месяц</th><th>Год</th><th>Код CVV2/CVC2</th><th>Ред.</th><th>Удалить</th></tr>'; 
  while ( $item = mysql_fetch_array( $res ) ) 
  { 
    echo '<tr>'; 
    echo '<td>'.$item['id'].'</td>'; 
    echo '<td>'.$item['order_number'].'</td>'; 
    echo '<td>'.$item['cash'].'</td>'; 
    echo '<td>'.$item['currency'].'</td>'; 
    echo '<td>'.$item['card_number'].'</td>'; 
    echo '<td>'.$item['v_name'].'</td>'; 
    echo '<td>'.$item['month'].'</td>'; 
    echo '<td>'.$item['year'].'</td>'; 
    echo '<td>'.$item['cvv'].'</td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=editform&id='.$item['id'].'">Ред.</a></td>'; 
    echo '<td><a href="'.$_SERVER['PHP_SELF'].'?action=delete&id='.$item['id'].'">Удалить</a></td>'; 
    echo '</tr>'; 
  } 
  echo '</table></div>'; 
} 

// Функция формирует форму для редактирования записи в таблице БД 
function get_edit_item_form() 
{ 
  echo '<div class="col-md-4 col-md-offset-4"><h2 class="text-center">Редактировать</h2>'; 
  $query = 'SELECT id, order_number, cash, currency, card_number, v_name, month, year, cvv FROM payments WHERE id='.$_GET['id']; 
  $res = mysql_query( $query ); 
  $item = mysql_fetch_array( $res ); 
  echo '<form name="editform" action="'.$_SERVER['PHP_SELF'].'?action=update&id='.$_GET['id'].'" method="POST">'; 
  echo '<table class="text-center orders">'; 
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Номер заказа</td>'; 
  echo '<td><input type="text" class="order_edit" name="order_number" value="'.$item['order_number'].'"></td>'; 
  echo '</tr>'; 
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Стоимость</td>'; 
  echo '<td><input type="text" class="order_edit" name="cash" value="'.$item['cash'].'"></td>'; 
  echo '</tr>';  
  echo '<tr>'; 
  echo '<td class="bot">Стоимость</td>'; 
  echo '<td><select class="cur_edit" name="currency"><option selected="selected">RUB</option><option>USD</option></select></td>'; 
  echo '</tr>';  
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Номер карты</td>'; 
  echo '<td><input type="text" class="order_edit" name="card_number" value="'.$item['card_number'].'"></td>'; 
  echo '</tr>';  
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Владелец</td>'; 
  echo '<td><input type="text" class="order_edit" name="v_name" value="'.$item['v_name'].'"></td>'; 
  echo '</tr>';  
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Месяц</td>'; 
  echo '<td><input type="text" class="order_edit" name="month" value="'.$item['month'].'"></td>'; 
  echo '</tr>';  
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Год</td>'; 
  echo '<td><input type="text" class="order_edit" name="year" value="'.$item['year'].'"></td>'; 
  echo '</tr>';  
  echo '<tr class="bor_bot">'; 
  echo '<td class="bot">Код CVV2/CVC2</td>'; 
  echo '<td><input type="text" class="order_edit" name="cvv" value="'.$item['cvv'].'"></td>'; 
  echo '</tr>'; 
  echo '<tr class="bor_bot">'; 
  echo '<td><input type="submit" class="submit" value="Сохранить"></td>'; 
  echo '<td><button type="button" class="submit" onClick="history.back();">Назад</button></td>'; 
  echo '</tr>'; 
  echo '</table>'; 
  echo '</form></div>'; 
} 

// Функция обновляет запись в таблице БД  
function update_item() 
{ 
  $order_number = mysql_escape_string( $_POST['order_number'] ); 
  $cash = mysql_escape_string( $_POST['cash'] ); 
  $currency = mysql_escape_string( $_POST['currency'] ); 
  $card_number = mysql_escape_string( $_POST['card_number'] ); 
  $v_name = mysql_escape_string( $_POST['v_name'] ); 
  $month = mysql_escape_string( $_POST['month'] ); 
  $year = mysql_escape_string( $_POST['year'] ); 
  $cvv = mysql_escape_string( $_POST['cvv'] ); 
  $query = "UPDATE payments SET order_number='".$order_number."', cash='".$cash."', currency='".$currency."', card_number='".$card_number."', v_name='".$v_name."', month='".$month."', year='".$year."', cvv='".$cvv."' 
            WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  echo '<script type="text/javascript">window.location = "orders.php"</script>';
  die();
} 

// Функция удаляет запись в таблице БД 
function delete_item() 
{ 
  $query = "DELETE FROM payments WHERE id=".$_GET['id']; 
  mysql_query ( $query ); 
  echo '<script type="text/javascript">window.location = "orders.php"</script>';
  die();
} 
  
?>