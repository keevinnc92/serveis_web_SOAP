<?php

function primo($num)
{
    $cont=0;
    // Funcion que recorre todos los numero desde el 2 hasta el valor recibido
    for($i=2;$i<=$num;$i++){
        if($num%$i==0)
        {
            # Si se puede dividir por algun numero mas de una vez, no es primo
            if(++$cont>1)
                return false;
        }
    }
    return true;
}

//turn off the wsdl cache
  ini_set("soap.wsdl_cache_enabled","0");
  $server = new SoapServer("primo.wsdl");
	$server->addFunction("primo");
  $server->handle();

 ?>
