<html>
<head>
<? include ("meta.inc"); ?>
<title><? echo $TitleGlobal; ?> Форма обратной связи</title>
</head>

<body bgcolor="#E8AC75" text="#000000" link="#000000" vlink="#000000" alink="#FF0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/about_over.gif','images/service_over.gif','images/gallery_over.gif','images/contacts_over.gif','images/guestbook_over.gif')">
<? include ("top_table.inc"); ?>
<table width="725" border="0" cellspacing="0" cellpadding="0" align="center" background="images/bg_tab.gif">
  <tr align="center" valign="top"> 
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr align="center" valign="top"> 
          <td><img src="images/logo_down.gif" width="725" height="70"></td>
        </tr>
      </table>
<? include ("menu_table.inc"); ?>
      <table width="92%" border="0" cellspacing="0" cellpadding="0" height="94%">
        <tr valign="top">
          <td align="center">
<table width="100%" height="300" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td align="center" valign="top">
<?php
$ErrorString = array 
(
'Ваше сообщение отправлено!<br><br>Благодарим Вас за отзыв!',
'Вы не ввели свое имя!',
'Некорректно введен е-мейл!', 
'Вы ничего не написали в сообщении!',
'Неверно введен проверочный код!'
); 
$backurl='http://www.ruspar.od.ua'.$_POST['URLfrom'];
$reloadtime=5;
$Capcha = '3933';
$EMail = 'saunaodesa@gmail.com';
$ErrorCode = 0;

$nm=$_POST['xname'];
$em=$_POST['xemail'];
$ms=$_POST['xmessage'];
$ca=$_POST['xcapcha'];
$dt=date('d.m.Y, H:i:s');

$subject = substr ('Отзыв [ЛЕГКИЙ ПАР] /'.$ms.'/'.str_repeat ("*", 50), 0, 70);

if ($nm == '')
{
	$ErrorCode = 1;
}
if (!preg_match("/^([a-z,0-9,-,.,_])+@([a-z,0-9])+(.([a-z,0-9])+)+$/", strtolower($em)))
{
	$ErrorCode = 2;
}
if ($ms == '')
{
	$ErrorCode = 3;
}
if ( $ca != $Capcha )
{
	$ErrorCode = 4;
}

$message = "
IP: ".$_SERVER['REMOTE_ADDR']. " Дата: ".$dt."<br>
==========================================<br>
Имя: ".$nm."<br>
e-mail: ".$em."<br>
Сообщение: ".$ms."<br>";

$headers = 'MIME-Version: 1.0'."
".
   'Content-type: text/html; charset=windows-1251'."
".
   'To: '.'БАНЯ Легкий Пар'.' <'.'ruspar@te.net.ua'.'>'."
".
   'From: <'.$em.'>'."
";

if ( $ErrorCode == 0 )
{
//	mail ($EMail, $subject, $message, $headers);
}
echo ('<h1>'.$ErrorString[$ErrorCode].'</h1>');

print '<META HTTP-EQUIV="Refresh" CONTENT="'.$reloadtime.'; URL='.$backurl.'">';
?>
  </td>
 </tr>
</table>

         </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<? include ("bottom_table.inc"); ?>
</body>
</html>