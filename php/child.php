<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
	if (isset($_SESSION['count'])==false)
	{
	$_SESSION['count']=0;
	}
	$_SESSION['category']='child';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Детские товары</title>
		<link rel = "stylesheet" type = "text/css" href = "../css/style_1.css">
		<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<table cellspacing="0" width="100%" height=1500 border=0>
			<tr class=headline  height="5%">
				<td colspan="2">
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
				<td colspan="1" valign="right" align="right">
					<p align="right"><a href="../index.php"><img src="../img/label.png" width="50" height="50"></a></p>
				</td>		
				<td colspan="2">
					<font size=6>Major Shop</font>
				</td>
				<td colspan="2">
					<p align="right"><?php echo "<p align='right' style='font-size:20px; color:red'>Добро пожаловать, ".$jingle."!</p>";?></p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>
				</td>
			</tr>
			<tr height="10%" class=topline>
				<td  width="12.5%" valign="bottom" align="center">
					<div class="rel"><img src="../img/2.png" height="70" width="120">
					<div class="abs"><p>NEW</p></div></div>
					<a class="note" href="../php/hometech.php">Бытовая<br>Техника</a>
				</td>
				<td  width="12.5%" valign="bottom" align="center">
					<img  src="../img/3.png" height="70" width="120">
					<a class="note" href="../php/electronics.php"><br>Умная<br>электроника</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<div class="rel"><img src="../img/4.png" height="70" width="120">
					<div class="abs"><p>NEW</p></div></div>
					<a class="note" href="../php/furniture.php">Уютная<br>мебель</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<div class="rel"><img src="../img/7.png" height="70" width="120">
					<div class="abs"><p>NEW</p></div></div>
					<a class="note" href="../php/child.php">Детские<br>товары</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<img  src="../img/8.png" height="70" width="120">
					<a class="note" href="../php/sports.php"><br>Все<br>для спорта</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<div class="rel"><img src="../img/9.png" height="70" width="120">
					<div class="abs"><p>NEW</p></div></div>
					<a class="note" href="../php/auto.php">Все<br>для авто</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<img  src="../img/10.png" height="70" width="120">
					<a class="note" href="../php/home.php"><br>Все<br>для дома</a>
				</td>
				<td width="12.5%" valign="bottom" align="center">
					<img  src="../img/11.png" height="70" width="120">
					<a class="note" href="../php/tools.php">Надежные<br>инструменты</a>
				</td>
			</tr>
			<tr class = underhead height = "5%">
				<td colspan = "3">
					<p class = refer><a href = "../index.php">Главная>>></a><a href = "../php/child.php">Детские товары</a></p>
				</td>
				<td colspan = "3" align = "center">
					<form>
					<p>
					<input class = search-input type="search" placeholder="Поиск по сайту" width = "50%"> 
   				    <input type="submit" value="Найти">
					</p>
					</form>
				</td>
				<td width = "10%" align = "right">
					<img class = geo src = "../img/13.png" height = "50" width = "50">
				</td>
				<td width = "10%" align = "right" valign = "center">
					<select>
						<option disabled>Выберите город</option>
						<option>Москва</option>
						<option>Санкт-Петербург</option>
						<option>Самара</option>
						<option>Новосибирск</option>
						<option>Нижний Новгород</option>
						<option>Сочи</option>
						<option>Крым</option>
						<option>Красноярск</option>
					</select>
				</td>
			</tr>
			
 <?php
		$arr=unserialize(file_get_contents("../txt/a.txt"));
		
		for ($i=1, $key=false;$key === false; $i++)
			$key = array_search("CHILD-1", $arr[$i]);
		
		echo '<tr class = good1 height = "20%">
				<td width = 25% colspan = "2">
					<img class = "goods" src = "'.$arr[$i-1]['pic'].'" width = "80%">
				</td>
				<td colspan = "4">
					<font size = "4">'.$arr[$i-1]['name'].'</font>
					<p class="fl">'.$arr[$i-1]['description'].'</p>
				</td>
				<td  colspan = "2" align = "center">
					<font size = 6>'.$arr[$i-1]['price'].'</font>
					<p><form method="post" action="../php/goodpage.php"><input type="submit" value="Купить" name="CHILD-1"  style="height:50px; width:100px"></form></p>
				</td>
			</tr>';
			
		for ($i=1, $key=false;$key === false; $i++)
			$key = array_search("CHILD-2", $arr[$i]);
	
		echo '<tr class = good2 height = "20%">
				<td width = 25% colspan = "2">
					<img class = "goods" src = "'.$arr[$i-1]['pic'].'" width = "80%">
				</td>
				<td  colspan = "4">
					<font size = "4">'.$arr[$i-1]['name'].'</font>
					<p>'.$arr[$i-1]['description'].'</p>
				</td>
				<td  colspan = "2" align = "center">
					<font size = 6>'.$arr[$i-1]['price'].'</font>
					<p><form method="post" action="../php/goodpage.php"><input type="submit" value="Купить" name="CHILD-2"  style="height:50px; width:100px"></form></p>
				</td>
			</tr>';
		
		for ($i=1, $key=false;$key === false; $i++)
			$key = array_search("CHILD-3", $arr[$i]);
		
		echo '<tr class = good3 height = "20%">
				<td width = 25% colspan = "2">
					<img class = "goods" src = "'.$arr[$i-1]['pic'].'" width = "80%">
				</td>
				<td  colspan = "4">
					<font size = "4">'.$arr[$i-1]['name'].'</font>
					<p>'.$arr[$i-1]['description'].'</p>
				</td>
				<td  colspan = "2" align = "center">
					<font size = 6>'.$arr[$i-1]['price'].'</font>
					<p><form method="post" action="../php/goodpage.php"><input type="submit" value="Купить" name="CHILD-3"  style="height:50px; width:100px"></form></p>
				</td>
			</tr>';
	?>
	
			<tr class = down height = "15%">
				<td colspan = "4" valign = "middle" align = "center">
					<hr>
					<p><a href = "../php/info.php">Контакты</a></p>
					<p><a href = "../php/about.php">О нас</a></p>
					<p><a href = "../php/out.php">System of a down</a></p>
					<hr>
				</td>
				<td colspan = "4" valign = "middle" align = "center">
					<hr>
					<p align = "center"><a href = "../index.php"><img src = "../img/label.png" width = "50" height = "50"></a></p>
					<font size = 5>Major Shop</font>	
					<hr>
				</td>
			</tr>
			<tr class = copyright height = "5%" align = "center">
				<td colspan = "8">
					<p>Copyright by Stanislav Tyugai. All rights reserved. NSUEM 2016.</p>
				</td>
			</tr>
		</table>
	<body>
</html>