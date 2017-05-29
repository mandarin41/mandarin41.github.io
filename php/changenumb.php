<?php session_start();
for ($i=0; $i<$_SESSION['count']; $i++)
{
	if ($_GET['changenumb'.$i]=='-' && $_SESSION['numb'.$i]>1)
	{
		$_SESSION['numb'.$i]--;
		break;
	}
	if ($_GET['changenumb'.$i]=='+')
	{
		$_SESSION['numb'.$i]++;
		break;
	}
}
echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>