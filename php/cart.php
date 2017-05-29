<?php
	session_start();
	echo 
		'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<a href="../php/'.$_SESSION['category'].'.php">Назад к выбору</a>
		<table  width="90%" align="center" border="1">';
    for ($i=0; $i<$_SESSION['count']; $i++)
	{
		$sum=$sum+$_SESSION['price'.$i]*$_SESSION['numb'.$i];
		echo '
			<tr>
			<td colspan="3">
			<b>', $_SESSION['name'.$i], '</b>
			<br>
			<br>
			Цена: ', $_SESSION['price'.$i], ' руб.
			<br>
			<form action=changenumb.php>
			Количество: 
			<input type="submit" value="-" name="changenumb', $i, '">
			 ', $_SESSION['numb'.$i], ' 
			<input type="submit" value="+" name="changenumb', $i, '">
			</form>
			<p align="right"><b>Стоимость: ', $_SESSION['price'.$i]*$_SESSION['numb'.$i], ' руб.</b></p>
			</td>
			</tr>
			<tr>
			<td align="right" colspan="3">
			<br>
			<form action="delfromcart.php">
			<input type="submit" value="Удалить из корзины" name="item', $i, '">
			</form>
			</td>
			</tr>
		';
	}
	
	if ($_SESSION['count']==0)
	{
		echo '
			<tr>
			<td colspan="3">
			<br>
			Корзина пуста.
			<br>
			<br>
			</td>
			</tr>
			';
	}
	else
	{
		echo '
			</table>
			<table width="90%" align="center" border="4">
			<tr>
			<td align="right" colspan="3">
			<b>Итого к оплате: ', $sum, ' руб.</b>
			</td>
			</tr>
			</table>
			';
	}
?>