<?
$alttext   = 'Áàíÿ &laquo;ËÅÃÊÈÉ ÏÀĞ&raquo;' ;
$titletext = 'Áàíÿ &laquo;ËÅÃÊÈÉ ÏÀĞ&raquo;, Îäåññà' ;
?>
<html>
<head>
<? include ("meta.inc"); ?>
<title><? echo $TitleGlobal; ?> Ôîòîãàëåğåÿ</title>

<script type="text/javascript" src="highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css">

<script type="text/javascript">
    hs.graphicsDir = 'highslide/graphics/';
    hs.outlineType = 'rounded-white';
</script>

</head>

<body bgcolor="#E8AC75" text="#000000" link="#000000" vlink="#000000" alink="#FF0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/about_over.gif','images/service_over.gif','images/gallery_over.gif','images/contacts_over.gif')">
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

      <table width="92%" border="0" cellspacing="0" cellpadding="0" height="94%" align="center">
        <tr valign="top" align="center"> 
          <td> 
<!-- photo gallery /start -->
<? include ("gallery.inc"); ?>
<!-- photo gallery /stop -->
         </td>
        </tr>
      </table>

    </td>
  </tr>
</table>
<? include ("bottom_table.inc"); ?>
</body>
</html>