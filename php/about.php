<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
	if (isset($_SESSION['count'])==false)
	{
	$_SESSION['count']=0;
	}
	$_SESSION['category']='about';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>О нас</title>
		<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<table width = "100%">
			<tr width = "100%">
				<td width = "20%">
					<font size = 6>О нас</font>
				</td>
				<td align="center">
				<?php
					echo '
						<font size="4">
						<a href="../php/cart.php">Корзина: ', $_SESSION['count'], '</a>
						</font>
						';
				?>
				</td>
				<td width = "20%" align = "center">
					<p align = "center"><a href = "../index.php"><img src = "../img/label.png" width = "50" height = "50"></a></p>
					<font size = 5>Major Shop</font>
				</td>
				<td width="20%" align = "center">
					<p align="right"><?php echo "<p align='right' style='font-size:20px; color:red'>Добро пожаловать, ".$jingle."!</p>";?></p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>			
				</td>
			</tr>		
		</table>
		<hr>
		<p style='font-size:20px'>Мы не стремимся «нагреться» на покупателях и ржаветь на задворках интернета. 
			<br>Мы действительно влюблены в электронику, следим за новинками и рады делиться всем самым интересным, о чем узнали.
			<br>Для Madrobots мы выбрали гаджеты, которые приводят в восторг.
			<br> В том числе и нас.
			<br>О каждом товаре хочется кричать: «Представляете, что бывает!». 
			<br>Мы намеренно не идем по пути расширения ассортимента, отказываясь от устройств, которые не несут в себе новой идеи или ценности.
			<br>Мы — те самые ребята, что вызвали переполох среди интернет-магазинов гаджетов, начав открыто освещать процесс создания бизнес Madrobots в прямом эфире.
			<br>Так мы нажили себе массу подражателей, открыли глаза на мир «интернет вещей» десяткам тысяч людей, но и заключили много интересных партнерств.
			<br>Madrobots — не «еще один магазин с Маркета, торгующий гаджетами».<br> Мы открыты, всегда реагируем на отзывы наших текущих и потенциальных клиентов.
			<br>Если у вас есть предложение или вы столкнулись с проблемой при размещении заказа на сайте, обязательно напишите на почту основателю Madrobots Николаю Белоусову.<br>
		</p>
	</body>
</html>
