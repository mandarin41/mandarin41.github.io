<?php
	if(isset($_POST['addline'])) {
		$text=file_get_contents("../txt/dailynews.txt");
		$textarr=explode("\n",$text);
		$line="\n".htmlspecialchars($_POST['newline']);
		file_put_contents("../txt/dailynews.txt",$line,FILE_APPEND);
		header("Refresh:0");
	}
	if(isset($_POST['choose'])) {
		$ch=$_POST['choice'];
		file_put_contents("../txt/todaynews.txt",$ch);
	}
	if(isset($_POST['delline'])) {
		$text=file_get_contents("../txt/dailynews.txt");
		$textarr=preg_split("/\\r\\n|\\r|\\n/", $text);
		$elem_to_del=$_POST['choice'];
		while (($i = array_search($elem_to_del, $textarr)) !== false) {
			unset($textarr[$i]);
		} 
		$line=implode(PHP_EOL,$textarr);
		file_put_contents("../txt/dailynews.txt",$line);
	}
	if(isset($_POST['addbanner'])) {
		$url=htmlspecialchars($_POST['url']);
		foreach ($_FILES as $key => $val) {
			$fname=$val['name'];  
		}
		$str=$fname." ".$url;
		file_put_contents("../txt/banner.txt",$str);
	}
	if(isset($_POST['adddoc'])) {
		$arr=unserialize(file_get_contents("../txt/cust.txt"));
		if(count(array_keys($arr))==null) $index=1;
		else $index=count(array_keys($arr))+1;
		echo $index;
		$arr[$index]['name']=htmlspecialchars($_POST['name']);
		$arr[$index]['description']=htmlspecialchars($_POST['description']);
		foreach ($_FILES as $key => $val) {
			$finame=$val['name']; 
		}
		
		$arr[$index]['doc']='../pdf/'.$finame;
		file_put_contents("../txt/cust.txt",serialize($arr));
		$index++;
	}
	if(isset($_POST['deldoc'])) {
		$arr=unserialize(file_get_contents("../txt/cust.txt"));
		$number=htmlspecialchars($_POST['num_to_del']);
		unset($arr[$number]);
		file_put_contents("../txt/cust.txt",serialize($arr));
	}
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Администрирование</title>
	<link rel="icon" type="image/png" href="../img/label.png">
</head>
<body>
	<a href="../index.php">На главную</a>
	<form method="post" enctype="multipart/form-data">
	<table width="100%" border="1">
		<tr>
			<td>
				<p>Номер</p>
			</td>
			<td>
				<input type="text" name="number">
			</td>
			<td width="40%" rowspan="9">
				<form>
					<?php
						$text=file_get_contents("../txt/dailynews.txt");
						$textarr=preg_split("/\\r\\n|\\r|\\n/", $text);
						$count=count($textarr);
						for($i = 0; $i < $count; $i++) {
						echo '<p><input type="radio" name="choice" value="'.$textarr[$i].'">'.$textarr[$i].'</p>';
						}
					?>
					<input type="submit" value="Выбрать" name="choose"> <input type="submit" value="Удалить" name="delline">
					<p><input type="text" name="newline" placeholder="Добавьте новость дня">
					<input type="submit" value="Добавить" name="addline"></p>
				</form>
				<?php
					echo '<p>Выбрано: '.$ch.'</p>';
				?>
			</td>
			<td rowspan="9">
				<p>Рекламный баннер</p>
				<form method="post" enctype="multipart/form-data">
					<p>Выберите картинку: <input type="file" name="banner"></p>
					<p>Введите URL: <input type="text" name="url"></p>
					<input type="submit" name="addbanner" value="Разместить">
				</form>
				<?php
					echo '<p>Размещено: '.$str.'</p>';
				?>
			</td>
			<td rowspan="9">
				<p>Документы</p>
				<form method="post" enctype="multipart/form-data">
					<p>Название</p>
					<input type="text" name="name">
					<p>Аннотация</p>
					<textarea rows="5" cols="40" name="description"></textarea>
					<p>Выберите документ: <input type="file" name="doc"></p>
					<input type="submit" name="adddoc" value="Разместить">
					<?php
					echo '<p>Размещено: '.$finame.'</p>';
					?>
					<p>Номер <input type="text" name="num_to_del"><input type="submit" name="deldoc" value="Удалить"></p>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<p>Артикул</p>
			</td>
			<td>
				<select name="article">
					<option disabled>Выберите артикул</option>
					<option>HOMETECH-1</option>
					<option>HOMETECH-2</option>
					<option>HOMETECH-3</option>
					<option>ELECTRONICS-1</option>
					<option>ELECTRONICS-2</option>
					<option>ELECTRONICS-3</option>
					<option>FURNITURE-1</option>
					<option>FURNITURE-2</option>
					<option>FURNITURE-3</option>
					<option>CHILD-1</option>
					<option>CHILD-2</option>
					<option>CHILD-3</option>
					<option>SPORTS-1</option>
					<option>SPORTS-2</option>
					<option>SPORTS-3</option>
					<option>AUTO-1</option>
					<option>AUTO-2</option>
					<option>AUTO-3</option>
					<option>HOME-1</option>
					<option>HOME-2</option>
					<option>HOME-3</option>
					<option>TOOLS-1</option>
					<option>TOOLS-2</option>
					<option>TOOLS-3</option>
				</select></td>
		</tr>
		<tr>
			<td>
				<p>Название</p>
			</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				<p>Описание</p>
			</td>
			<td>
				<textarea rows="5" cols="40" name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<p>Вес</p>
			</td>
			<td>
				<input type="text" name="weight">
			</td>
		</tr>
		<tr>
			<td>
				<p>Стоимость</p>
			</td>
			<td>
				<input type="text" name="price">
			</td>
		</tr>
		<tr>
			<td>
				<p>Доставка</p>
			</td>
			<td>
				<select name="delivery">
					<option disabled>Выберите доставку</option>
					<option>До двери</option>
					<option>На почту</option>
					<option>Самовывоз</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<p>Картинка</p>
			</td>
			<td>
				<input type="file" name="pic">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Добавить" name="add">
			</td>
			<td>
				<input type="submit" value="Редактировать" name="add">
			</td>
	</table>
	</form>
	<form method="post">
	<table width="25%">
		<tr>
			<td>
				<p>Номер</p>
			</td>
			<td>
				<input type="text" name="number">
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type="submit" value="Удалить" name="del">
			</td>
		</tr>
	</table>
	</form>
	<p><a href="../txt/logs.txt" target="_blank">Открыть историю посещений</a></p>
</body>

<?php
	if(isset($_POST['add'])) {
		$arr=unserialize(file_get_contents("../txt/a.txt"));
		$number=htmlspecialchars($_POST['number']);
		$arr[$number]['article']=htmlspecialchars($_POST['article']);
		$arr[$number]['name']=htmlspecialchars($_POST['name']);
		$arr[$number]['description']=htmlspecialchars($_POST['description']);
		$arr[$number]['weight']=htmlspecialchars($_POST['weight']);
		$arr[$number]['price']=htmlspecialchars($_POST['price']);
		$arr[$number]['delivery']=htmlspecialchars($_POST['delivery']);
		
		foreach ($_FILES as $key => $val) {
			$fname=$val['name']; 
		}
		
		$arr[$number]['pic']='../img/'.$fname;
		file_put_contents("../txt/a.txt",serialize($arr));
	}
	
	if(isset($_POST['del'])) {
		$arr=unserialize(file_get_contents("../txt/a.txt"));
		$number=htmlspecialchars($_POST['number']);
		unset($arr[$number]);
		file_put_contents("../txt/a.txt",serialize($arr));
	}

	$arr=unserialize(file_get_contents("../txt/a.txt"));
	echo '<table width="100%" border="1" cellpadding="4" cellspacing="0">
		  <caption><h3>Каталог товаров</h3></caption>
		  <tr>
		  <th>Номер</th>
		  <th>Артикул</th>
		  <th>Название</th>
		  <th>Описание</th>
		  <th>Вес</th>
		  <th>Стоимость</th>
		  <th>Доставка</th>
		  <th>Картинка</th>';
		  
	foreach($arr as $key=>$val){
		$article=$val['article'];
		$name=$val['name']; 
		$description=$val['description']; 
		$weight=$val['weight'];
		$price=$val['price'];
		$delivery=$val['delivery'];
		$pic=$val['pic'];
		echo '</tr>
			  <td>'.$key.'</td>
			  <td>'.$article.'</td>
			  <td>'.$name.'</td>
			  <td>'.$description.'</td>
			  <td>'.$weight.'</td>
			  <td>'.$price.'</td>
			  <td>'.$delivery.'</td>
			  <td><a href="'.$pic.'" target="_blank">ссылка </a></td>';
	}
?>