<?php
include('../../appg/settings.php');
include('../../appg/init_ajax.php');

$Text = ForceIncomingString('Data', '');
$Type = ForceIncomingString('Type', '');
if($Text != '' && $Type != '') {   
   if(MAGIC_QUOTES_ON) $Text = stripslashes($Text);
   $Text = $Context->FormatString($Text, $Context->Session->User, $Type, FORMAT_STRING_FOR_DISPLAY);
   if ($Type == 'Text') $Text = str_replace(array("\r\n", "\r", "\n"), '<br />', $Text);
   echo($Text);
}
?>