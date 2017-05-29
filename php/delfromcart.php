<?php session_start();
for ($i=0; $i<$_SESSION['count']; $i++)
{
	$itemnumber=$_GET['name'.$i];
	if ($itemnumber!='')
	{
		$itemnumber=$i;
		break;
	}
}
for ($i=$itemnumber; $i<$_SESSION['count']; $i++)
{
	$next=$i+1;
	$_SESSION['name'.$i]=$_SESSION['name'.$next];
	$_SESSION['price'.$i]=$_SESSION['price'.$next];
	$_SESSION['numb'.$i]=$_SESSION['numb'.$next];
}
$_SESSION['count']--;
echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>