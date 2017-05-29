<?php 
	if(isset($_POST['regit'])) {
		session_start();
		$login=htmlspecialchars($_POST['login']);
		$password1=htmlspecialchars($_POST['password1']);
		$logins=file('../txt/logins.txt', FILE_IGNORE_NEW_LINES);
		if (strlen($login)<8)
		{
			echo '<p align="center">Логин слишком<br>короткий.</p>';
			exit;
		}
		for ($i=0; $i<count($logins); $i++)
		{
			if ($login==$logins[$i])
			{
				echo '<p align="center">Этот логин занят.</p>';
				exit;
			}
		}
		if (strlen($password1)<8)
		{
			echo '<p align="center">Пароль слишком<br>короткий.</p>';
			exit;
		}
		file_put_contents('../txt/logins.txt', $login."\n", FILE_APPEND);
		file_put_contents('../txt/passwords.txt', $password1."\n", FILE_APPEND);
		$_SESSION['login']=$login;
		date_default_timezone_set('Etc/GMT-7');
		$_SESSION['logindate']=date("d.m.y H:i");
		file_put_contents('../txt/logs.txt', $_SESSION['login'].', '.$_SESSION['logindate']."\n", FILE_APPEND);
		echo '<script>location.href="../index.php"</script>';
	}
?>
<html>
	<head>
		<title>
			Регистрация
		</title>
		<link rel="icon" type="image/png" href="../img/label.png">
	</head>
	<body>
		<form method="post">
		<p>Логин<br>(8 символов или более):</p>
		<input type="text" name="login" required>
		<p>Пароль<br>(8 символов или более):</p>
		<input type="password" name="password1" required>
		<br>
		<p><input type="submit" value="Зарегистрироваться" name="regit"></p>
		</form
	</body>
</html>