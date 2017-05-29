<?php session_start();
	session_unset();
	echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>