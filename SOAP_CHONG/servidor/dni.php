<?php

function dni($dni)
{
  $letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
	if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
		return true;
	}else{
    return false;
	}
}

//turn off the wsdl cache
  ini_set("soap.wsdl_cache_enabled","0");
  $server = new SoapServer("dni.wsdl");
	$server->addFunction("dni");
  $server->handle();

 ?>
