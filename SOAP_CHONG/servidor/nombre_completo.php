<?php

function nombre_completo($nombre,$apellido1,$apellido2)
{
 $nombre_completo= $nombre." ".$apellido1." ".$apellido2;
// $nombre_completo="OK";
return $nombre_completo;


}
//turn off the wsdl cache
ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("nombre_completo.wsdl");
$server->addFunction("nombre_completo");
$server->handle();

 ?>
