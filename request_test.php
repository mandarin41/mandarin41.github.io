<!DOCTYPE html>
<HTML>
	<HEAD>
		<TITLE></TITLE> 
		<META HTTP-EQUIV="Content type" CONTENT="text/html; charset=windows-1251">
		
	</HEAD>
	<BODY> 
	<H1>Параметры, данные, ключики включенные в HTTP запрос </H1>
	<H2> Параметры, переданные через URL (метод GET) </H2>
<?php
	$K=count ($_GET);
	echo "Обработчику передано методом GET $K параметров: <BR>"; $i=1;
	echo '<TABLE border="1"><TR><TH>No</TH><TH>Ключ</TH><TH>Значение</TH></TR>';
	foreach ($_GET as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>

	<H2> Данные, переданные с запросом (метод POST) </H2>
<?php
	$K=count ($_POST); $i=1;
	echo "Обработчику передано методом POST $K параметров: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>Ключ</TH><TH>Значение</TH></TR>';
	foreach ($_POST as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>	
	<H2> Ключики, переданные в заголовке HTTP запроса (COOKIES) </H2>
<?php
	$K=count ($_COOKIE); $i=1;
	echo "Обработчику передано в заголовке запроса $K ключиков: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>Ключ</TH><TH>Значение</TH></TR>';
	foreach ($_COOKIE as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>	
	<H2> Файлы, переданные с запросом (метод POST) </H2>
<?php
	$K=count ($_FILES); $i=1;
	echo "Обработчику передано $K файлов: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>Ключ (имя пользователя) </TH><TH> Имя на клиенте</TH><TH> Тип</TH><TH> Размер</TH><TH>Ссылка</TH></TR>';
	foreach ($_FILES as $key => $val)
	{$fname=$val['name']; $ftype=$val['type']; $fsize=$val['size'];
	$end_file_name='file'.$key.$fname;
	move_uploaded_file ($val['tmp_name'],$end_file_name);
	echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$fname</TD><TD>$ftype</TD><TD>$fsize</TD><TD><a href=\"$end_file_name\" >ссылка </a></TD></TR>";}
	echo '</TABLE><HR>';
	$backref=$_SERVER['HTTP_REFERER'];
echo "<a href=\"$backref\"> вернуться назад </a>";
	?>
	
</BODY>
</HTML>