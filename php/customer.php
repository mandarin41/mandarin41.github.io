<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
	if (isset($_SESSION['count'])==false)
	{
	$_SESSION['count']=0;
	}
	$_SESSION['category']='customer';
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Страничка потребителя</title>
		<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<table width = "100%">
			<tr width = "100%">
				<td width = "20%">
					<font size = 6>Страничка потребителя</font>
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
					<p align = "center"><a href = "../../index.php"><img src = "../img/label.png" width = "50" height = "50"></a></p>
					<font size = 5>Major Shop</font>
				</td>
				<td width="20%" align = "center">
					<p align="right"><?php echo "<p align='right' style='font-size:20px; color:red'>Добро пожаловать, ".$jingle."!</p>";?></p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>	
				</td>
			</tr>
		</table>
		<hr>
	</body>
</html>

<?php
	$arr=unserialize(file_get_contents("../txt/cust.txt"));
	echo '<table width="100%" border="1" cellpadding="4" cellspacing="0">
			<caption><h3>Список товаров</h3>
			</caption>
				<tr>
					<th>#</th><th>Название</th><th>Аннотация</th><th>Ссылка</th>';
	if($arr){
		foreach($arr as $key=>$val){
			$name=$val['name']; 
			$description=$val['description']; 
			$doc=$val['doc'];
			echo '</tr><td>'.$key.'</td><td>'.$name.'</td><td>'.$description.'</td><td><a href="'.$doc.'" target="_blank">'.$doc.'</a></td>';
		}
	}
?>