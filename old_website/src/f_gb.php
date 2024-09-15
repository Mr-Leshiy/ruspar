<?
Function Out_gb($filename)
{
$errorstr = "<center>Не найден файл $filename !</center>";
$bgcolor1 = "#FFFED8";
$bgcolor2 = "#E8AC75";
$bgcolor  = $bgcolor1;
if (!is_file($filename) or !is_readable($filename))
{
	echo $errorstr;
}
else
 {
 $fh = fopen($filename, "r") or die($errorstr);
 print '<table width="80%" style="border:1px solid #C16719" border="0" cellspacing="0" cellpadding="10">';

 while (! feof($fh)) :
  $line1 = chop(fgets($fh, 4096));
  $line2 = chop(fgets($fh, 4096));
  $line3 = chop(fgets($fh, 4096));

  if ( $bgcolor == $bgcolor2 )
      $bgcolor = $bgcolor1;
  else
      $bgcolor = $bgcolor2;

  print '<tr bgcolor='.$bgcolor.'><td><div align="justify">'.$line1.'</div><br><br>';
  print '<div align="right">'.$line2.$line3.'</div></td></tr>';

 endwhile;
 print '</table>';

 fclose($fh);
 }
}
?>