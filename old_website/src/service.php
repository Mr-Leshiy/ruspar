<html>
<? include ("meta.inc"); ?>
<title><? echo $TitleGlobal; ?> Перечень услуг</title>
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

 <table width="94%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
   <td width="90">&nbsp;</td>
   <td align="center">
<h1>УСЛУГИ, ПРЕДОСТАВЛЯЕМЫЕ НАШИМ ГОСТЯМ:</h1>
   </td>
   <td width="100">&nbsp;</td>
  </tr>
 </table>

      <table width="92%" border="0" cellspacing="0" cellpadding="0" height="94%">
        <tr valign="top">
          <td>

<table width="100%" border="0" cellspacing="0" cellpadding="4">

 <tr>
  <td align=left><li>Посещение бани с 09:00 до 23:00 в будние дни компаниями до 8 человек</td>
  <td align=right><? print str_pad ('', 15, ".", STR_PAD_BOTH);?></td>
  <td align=right nowrap><b>780&nbsp;грн/час</b></td>
 </tr>

 <tr>
  <td align=left><li>Посещение бани с 09:00 до 23:00 в выходные и праздничные дни компаниями до 8 человек</td>
  <td align=right><? print str_pad ('', 15, ".", STR_PAD_BOTH);?></td>
  <td align=right nowrap><b>900&nbsp;грн/час</b></td>
 </tr>

 <tr>
  <td align=left><li>Каждый следующий человек</td>
  <td align=right><? print str_pad ('', 15, ".", STR_PAD_BOTH);?></td>
  <td align=right nowrap><b>110&nbsp;грн/час</b></td>
 </tr>

</table>
<br>
<center>
 <table width="75%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td>
<div style="font-size:10pt;">
* Цены действительны при условии не менее одной процедуры на человека.
<br>
** На существующие цены дополнительные скидки и скидки по дисконтным картам не предоставляются.
</div>
  </td>
 </tr>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="4">
 <tr>
  <td align=left><li>Аренда банного комплекса компаниями до 8 человек без услуг банщиков</td>
  <td align=right><? print str_pad ('', 15, ".", STR_PAD_BOTH);?></td>
  <td align=right nowrap><b>2500&nbsp;грн/час</b></td>
 </tr>

 <tr>
  <td align=left><li>Каждый следующий человек</td>
  <td align=right><? print str_pad ('', 15, ".", STR_PAD_BOTH);?></td>
  <td align=right nowrap><b>110&nbsp;грн/час</b></td>
 </tr>
</table>
<br>

<h2>В эту стоимость входит:</h2></center>
<ul>
<li>Чай из душистого разнотравья - 1 заварник
<br><br>
<li>Натуральный пчелиный мед - 150 грамм
<br><br>
<li>Целебный &laquo;вкусный&raquo; пар в парной из свежей хвои, сена из летнего разнотравья, 
ржаной соломы, душистых трав, поваренной соли, эфирных масел, пива, кваса, прополиса, 
отваров и спиртовых настоек ароматических растений, приготовленный согласно старинных русских традиций.
<br><br>
<li>Воздушная среда в трапезной, насыщенная ароматами сена, свежей травы и хвои,
а также воскуриванием душистой древесины, трав ладана и древесных смол.
<br><br>
<li>Банная обувь, фетровые головные уборы и грубошерстные массажные рукавицы.
<br><br>
<li>Открытый бассейн для охлаждения после посещения парной.
<br><br>
<li>Кадушка - водопад.
<br><br>
<li>Уютная летняя площадка с топчанами для отдыха.
<br><br>
<li>Wi-Fi интернет
<br><br>
<li>Удобная парковка
<br><br>
</ul>

<!-- Индивидуально каждый клиент может воспользоваться следующими услугами -->
<? include ("service_1.inc"); ?> 
<!-- /Индивидуально каждый клиент может воспользоваться следующими услугами -->

<!-- Услуги, предоставляемые массажистом -->
<? include ("service_2.inc"); ?> 
<!-- /Услуги, предоставляемые массажистом -->

<br>
<div align="center" style="font-size: 12pt; color: BROWN; font-weight:bold;">
При семейном посещении банного комплекса детям до 10 лет процедуры<br>
(кроме купели и массажей) проводятся БЕСПЛАТНО
</div>
<br>
<br>
<center><h1>МИЛОСТИ ПРОСИМ, ПРИГЛАШАЕМ В ГОСТИ!</h1></center>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<? include ("bottom_table.inc"); ?>
</body>
</html>