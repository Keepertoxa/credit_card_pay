<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Оплата кредитной картой</title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,cyrillic,cyrillic-ext">
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">

</head>

<body>
<p class="nav text-center">
<a class="linkes" href="index.php">Оплата</a>
<a class="linkes" href="orders.php">Заказы</a>
</p>
<div class="container">
<div class="row">
<h1 class="text-center">Оплата кредитной картой</h1>
<form name="card_payment" action="payment.php" method="post" onsubmit="return cFM_checktrueAttr($(this));">



<div class="col-md-4 col-md-offset-1">
<h2 class="text-center">Введите данные платежа</h2>
<div class="col-md-12">
	<p class="text-center">Номер заказа: <input type="text" class="order" id="number1" name="order_number" placeholder="" cfm_check="Y" title="номер заказа"></p>
</div>
<div class="col-md-12">
	<p class="text-center">Стоимость: <input type="text" class="order" id="number2" name="cash" placeholder="" cfm_check="Y" title="стоимость заказа"></p>
</div>
<p class="text-center">Валюта: <select class="cur" name="currency">
          <option selected="selected">RUB</option>
          <option>USD</option>
      </select></p>
</div>



<div class="col-md-6">
<div class="col-md-8 card">
<div class="col-md-12">
	<input type="text" class="card_number" id="card_number1" name="card_number1" placeholder="0000" onkeyup="iJump(this);" maxlength="4" size="4" pattern="[0-9]{4}" cfm_check='Y' cFM_confirmInfo='#card_number4' title='номер карты' cFM_function='checkAllInputs'>

	<input type="text" class="card_number" id="card_number2" name="card_number2" placeholder="0000" onkeyup="iJump(this);" maxlength="4" size="4" pattern="[0-9]{4}">

	<input type="text" class="card_number" id="card_number3" name="card_number3" placeholder="0000" onkeyup="iJump(this);" maxlength="4" size="4" pattern="[0-9]{4}">

	<input type="text" class="card_number" id="card_number4" name="card_number4" placeholder="0000" onkeyup="iJump(this);" maxlength="4" size="4" pattern="[0-9]{4}">
</div>

<div class="col-md-8">
	<p class="text-center">
	<input type="text" name="v_name" placeholder="Владелец" cfm_check="Y" title="владельца карты">
        </p>
</div>

<div class="col-md-4">
	<p class="text-center">
	<input type="text" class="dates" name="month" min="01" max="12" class="num_only" onchange="isright(this);" id="month" placeholder="00" onkeyup="iJump(this);" maxlength="2" size="2" pattern="[0-9]{2}" cfm_check='Y' cFM_confirmInfo='#year' title='дату' cFM_function='checkAllInputs'>
	<input type="text" class="dates" name="year" id="year" placeholder="00" onkeyup="iJump(this);" maxlength="2" size="2" pattern="[0-9]{2}">
        </p>
</div>
</div>

<div class="col-md-8 card cvv">
<div class="col-md-12">
</div>
<div class="col-md-9">
</div>
<div class="col-md-3">
	<input type="text" name="cvv" id="cvv" placeholder="CVV" maxlength="3" cfm_check="Y" title="код">
</div>
<div class="col-md-12">
</div>
</div>
</div>
</div>

<div class="col-md-3 col-md-offset-4">
	<p class="text-center">
        <input type="submit" class="submit" name="submit" value="Оплатить">
        </p>
</div>
</form>
</div>
</div>

<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
<script src="validate.js" type="text/javascript"></script>
</body>
</html>