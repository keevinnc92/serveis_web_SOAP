<?php

function hiperpar($a){
  $hiperpar="SI";
  for($i=0;$i<strlen($a);$i++){
      if ($a[$i]%2!=0) {
        $hiperpar="NO";
      }
}
return $hiperpar;
}

//turn off the wsdl cache
  ini_set("soap.wsdl_cache_enabled","0");
  $server = new SoapServer("hiperpar.wsdl");
	$server->addFunction("hiperpar");
  $server->handle();

 ?>
