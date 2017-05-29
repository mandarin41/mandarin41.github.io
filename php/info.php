<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
	if (isset($_SESSION['count'])==false)
	{
	$_SESSION['count']=0;
	}
	$_SESSION['category']='info';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Контакты</title>
			<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<table border = 2  width = "100%" height = "500">
			<tr class = headline  height = "5%">
			<td align="center">
				<?php
					echo '
						<font size="4">
						<a href="../php/cart.php">Корзина: ', $_SESSION['count'], '</a>
						</font>
						';
				?>
				</td>
				<td colspan ="1" align = "center" valign = "middle">
					<p><a href = "../index.php"><img src = "../img/label.png" width = "50" height = "50"></a></p>
					<font size = 6>Major Shop</font>
				</td>
				<td colspan="3">
					<p align="center"><?php echo "<p align='center' style='font-size:20px; color:red'>Добро пожаловать, ".$jingle."!</p>";?></p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>
				</td>
			</tr>
			<tr>
				<td width = "20%" valign = "top">
					<ul>
						<li><a href = "../html/googlemap.html" target = "pic">Как нас найти в городе</a></li>
						<br>
						<hr>
						<li><a href = "../html/building.html" target = "pic">Как нас найти в здании</a></li>
						<br>
						<hr>
					</ul>
					<p align = "center"><iframe name="info" width="200" height="70"></iframe></p>
				</td>
				<td width = "50%" valign = "center" align = "center">
					<p><iframe name="pic" width="800" height="600"></iframe></p>
				</td>
			</tr>
		</table>
	<body>
</html>
