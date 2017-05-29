<?php 
	$login=htmlspecialchars($_POST['login']);
	$password=htmlspecialchars($_POST['password']);
	$logins=file('../txt/logins.txt', FILE_IGNORE_NEW_LINES);
	$passwords=file('../txt/passwords.txt', FILE_IGNORE_NEW_LINES);
	for ($i=0; $i<count($logins); $i++)
	{
		if ($login==$logins[$i] && $password==$passwords[$i])
		{
			session_start();
			$_SESSION['login']=$login;
			date_default_timezone_set('Etc/GMT-7');
			$_SESSION['logindate']=date("d.m.y H:i");
			file_put_contents('../txt/logs.txt', $_SESSION['login'].', '.$_SESSION['logindate']."\n", FILE_APPEND);
			echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
			exit;
		}
	}
	echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>