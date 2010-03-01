<?php
/* 
 * Esta es una funcion de filtrado para
 * escapar los simbolos peligrosos en un ataque de inyeccion
 */
function filtrar ($input)
{
 $malo = array("Ã¡","Ã©","Ã­","Ã³","Ãº",
  "Ã±","<",">","\"","\'","'");

 $bueno = array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&lt;","&gt;","&quot;","&apos;","&apos;");

 $wawa = str_replace($malo,$bueno,$input);
 return $wawa;
}
?>
