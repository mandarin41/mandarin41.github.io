<?php
	session_start();
	if(isset($_SESSION['login'])) $jingle=$_SESSION['login'];
	else $jingle="гость";
	if (isset($_SESSION['count'])==false)
	{
	$_SESSION['count']=0;
	}
	$_SESSION['category']='list';
?>

<?php
	$arr=unserialize(file_get_contents("../txt/a.txt"));
	echo '<head>
				<meta charset="utf-8">
				<title>Список товаров</title>
				<link rel="icon" type="image/png" href="../img/label.png">
		</head>
			<table width = "100%">
			<tr width = "100%">
				<td width = "20%">
					<font size = 6>Список товаров</font>
				</td>
				<td align="center">';
					echo '
						<font size="4">
						<a href="../php/cart.php">Корзина: ', $_SESSION['count'], '</a>
						</font>
						';
				echo'
				</td>
				<td width = "20%" align = "center">
					<p align = "center"><a href = "../index.php"><img src = "../img/label.png" width = "50" height = "50"></a></p>
					<font size = 5>Major Shop</font>
				</td>
				<td width="20%" align = "center">
					<p align="right">';
					echo '<p align="right" style="font-size:20px; color:red">Добро пожаловать, '.$jingle.'!</p>'; 
					echo '</p>
					<form action="../php/exit.php" align="right"><input type="submit" value="Выход"></form>	
				</td>
			</tr>
		</table>
			<table width="100%" border="1" cellpadding="4" cellspacing="0">
			<caption><h3>Каталог товаров</h3></caption>
				<tr>
				<th>Номер</th><th>Артикул</th><th>Название</th><th>Описание</th><th>Вес</th><th>Стоимость</th><th>Доставка</th><th>Картинка</th>';
				
	foreach($arr as $key=>$val){
		$article=$val['article'];
		$name=$val['name']; 
		$description=$val['description']; 
		$weight=$val['weight'];
		$price=$val['price'];
		$delivery=$val['delivery'];
		$pic=$val['pic'];
	
		echo '</tr>
			<td>'.$key.'</td><td>'.$article.'</td><td>'.$name.'</td><td>'.$description.'</td><td>'.$weight.'</td><td>'.$price.'</td>
			<td>'.$delivery.'</td><td><a href="'.$pic.'" target="_blank">Ссылка </a></td>';
	
	}
?>