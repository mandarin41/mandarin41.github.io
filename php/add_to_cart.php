<?php
session_start();
if (isset($_SESSION['count'])==false)
{
	$_SESSION['count']=0;
}
if(isset($_POST['addgood'])) {
$_SESSION['name'.$_SESSION['count']]=$_SESSION['name'];
$_SESSION['price'.$_SESSION['count']]=$_SESSION['price'];
$_SESSION['numb'.$_SESSION['count']]=htmlspecialchars($_POST['numb']);
$_SESSION['count']++;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<a href="<?php echo '../php/'.$_SESSION['category'].'.php'; ?>">Назад к выбору</a>
<form method="post">
	<p>Название</p>
	<input type="text" value="<?php echo $_SESSION['name']; ?>">
	<p>Цена</p>
	<input type="text" value="<?php echo $_SESSION['price']; ?>">
	<p>Количество</p>
	<input type="text" name="numb">
	<input type="submit" value="Добавить" name="addgood">
</form>
</body>
</html>