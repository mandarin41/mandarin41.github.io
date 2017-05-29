<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Обратная связь</title>
		<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<table cellspacing="0" width="100%" height=150 border=0>
			<tr class=headline  height="100%">
				<td colspan="4" valign="right" align="right">
					<p align="right"><a href="../index.php"><img src="../img/label.png" width="50" height="50"></a></p>
					
				</td>		
				<td>
					<font size=6 align='right'>Major Shop</font>
				</td>
				<td colspan="3">
					<p align="right"><?php echo "<p align='right' style='font-size:20px; color:red'>Добро пожаловать, ".$jingle."!</p>";?></p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>
				</td>
			</tr>
		</table>
		<hr>
		<p>Введите ваши данные:</p>
		<form action="../php/request_test.php" method="get" enctype="appdata/x-www-urlencoded">
			<input type="text" name="Name" placeholder="Имя">
			<input type="text" name="Surname" placeholder="Фамилия">
			<input type="submit" value="ОТПРАВИТЬ">
		</form>
	</body>
</html>
