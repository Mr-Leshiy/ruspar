<? require ("f_gb.php"); ?>
<html>
<head>
<? include ("meta_ua.inc"); ?>
<title><? echo $TitleGlobal_Ua; ?> Книга відгуків</title>
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
<? include ("menu_table_ua.inc"); ?>
      <table width="92%" border="0" cellspacing="0" cellpadding="0" height="94%">
        <tr valign="top">
          <td align="center">
<h1>Книга відгуків</h1>
<p>
<? 
if ( isset($_GET['page']) )
{
	$startpage = $_GET['page'];
}
else
{
	$startpage = '001';
}
$filename = 'gb/gb'.$startpage.'.inc';
Out_gb ($filename); 
?>
<br>
Сторінки: 
<a href="guestbook.php?page=001">1</a>,
<a href="guestbook.php?page=002">2</a>,
<a href="guestbook.php?page=003">3</a>,
<a href="guestbook.php?page=004">4</a>,
<a href="guestbook.php?page=005">5</a>,
<a href="guestbook.php?page=006">6</a>,
<a href="guestbook.php?page=007">7</a>,
<a href="guestbook.php?page=008">8</a>,
<a href="guestbook.php?page=009">9</a>,
<a href="guestbook.php?page=010">10</a>,
<a href="guestbook.php?page=011">11</a>,
<a href="guestbook.php?page=012">12</a>,
<a href="guestbook.php?page=013">13</a>,
<a href="guestbook.php?page=014">14</a>,
<a href="guestbook.php?page=014">15</a>,
<a href="guestbook.php?page=014">16</a>...
<br>

<h1 style="text-shadow: 1px 1px 2px BLACK, 0 0 1em YELLOW, 0 0 0.2em ORANGE; color: RED;">Система відгуків тимчасово відключена</h1>

<!--
<h2>Надішліть, будьласка, свій відгук:</h2>
<form action='feedback.php' method="POST" name="feedback">
<table width="75%" style='border:1px solid #C16719' bgcolor="#FFFED8" cellspacing="0" border="0" cellpadding="5">

 <tr>
  <td align="center">
   <input type="hidden" size=50 name="URLfrom" value="<? echo $_SERVER['PHP_SELF'] ?>">
   <b>Ваше і'мя <font color="#FF0000"><b>*</b></font>:</b><br>
   <input type="text" size=50 name="xname">
  </td>
 </tr>

 <tr>
  <td align="center">
   <b>Ваш e-mail <font color="#FF0000"><b>*</b></font>:</b><br>
   <input type="text" size=50 name="xemail">
  </td>
 </tr>

 <tr>
  <td align="center">
   <b>Ваше повідомлення <font color="#FF0000"><b>*</b></font>:</b><br>
   <textarea name="xmessage" rows="10" cols="50"></textarea>
  </td>
 </tr>

 <tr>
  <td align="center">
   <b>Введить будьласка перевірочний код <font color="#FF0000"><b>*</b></font>:</b><br>
   <img src="images/capcha/captcha.gif" width="150" height="50" border="0"><br>
   <input type="text" size=10 name="xcapcha">
  </td>
 </tr>

 <tr>
  <td align="center">
   <font color="#FF0000"><b>*</b></font> - усі поля мають бути заповнені обов'язково!
  </td>
 </tr>

 <tr>
  <td align="center">
   <input type="submit" name="submit" value="Надіслати відгук">
   <input type="reset" name="reset" value="Очистити форму">
  </td>
 </tr>
</table>	
</form>
-->
</center>

         </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<? include ("bottom_table_ua.inc"); ?>
</body>
</html>