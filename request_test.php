<!DOCTYPE html>
<HTML>
	<HEAD>
		<TITLE></TITLE> 
		<META HTTP-EQUIV="Content type" CONTENT="text/html; charset=windows-1251">
		
	</HEAD>
	<BODY> 
	<H1>���������, ������, ������� ���������� � HTTP ������ </H1>
	<H2> ���������, ���������� ����� URL (����� GET) </H2>
<?php
	$K=count ($_GET);
	echo "����������� �������� ������� GET $K ����������: <BR>"; $i=1;
	echo '<TABLE border="1"><TR><TH>No</TH><TH>����</TH><TH>��������</TH></TR>';
	foreach ($_GET as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>

	<H2> ������, ���������� � �������� (����� POST) </H2>
<?php
	$K=count ($_POST); $i=1;
	echo "����������� �������� ������� POST $K ����������: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>����</TH><TH>��������</TH></TR>';
	foreach ($_POST as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>	
	<H2> �������, ���������� � ��������� HTTP ������� (COOKIES) </H2>
<?php
	$K=count ($_COOKIE); $i=1;
	echo "����������� �������� � ��������� ������� $K ��������: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>����</TH><TH>��������</TH></TR>';
	foreach ($_COOKIE as $key => $val) echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$val</TD></TR>";
	echo '</TABLE><HR>';
	?>	
	<H2> �����, ���������� � �������� (����� POST) </H2>
<?php
	$K=count ($_FILES); $i=1;
	echo "����������� �������� $K ������: <BR>";
	echo '<TABLE border="1"><TR><TH>No</TH><TH>���� (��� ������������) </TH><TH> ��� �� �������</TH><TH> ���</TH><TH> ������</TH><TH>������</TH></TR>';
	foreach ($_FILES as $key => $val)
	{$fname=$val['name']; $ftype=$val['type']; $fsize=$val['size'];
	$end_file_name='file'.$key.$fname;
	move_uploaded_file ($val['tmp_name'],$end_file_name);
	echo "<TR><TD>".$i++."</TD><TD>$key</TD><TD>$fname</TD><TD>$ftype</TD><TD>$fsize</TD><TD><a href=\"$end_file_name\" >������ </a></TD></TR>";}
	echo '</TABLE><HR>';
	$backref=$_SERVER['HTTP_REFERER'];
echo "<a href=\"$backref\"> ��������� ����� </a>";
	?>
	
</BODY>
</HTML>