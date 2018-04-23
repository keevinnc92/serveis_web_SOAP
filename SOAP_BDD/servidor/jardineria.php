<?php

function jardineria(){
$conexion = new mysqli('localhost','root','','jardineria');
$error= $conexion->connect_errno;
if($error!=null){
    echo "Error de conexion en la base de datos";
    exit();
}

$consulta= "SELECT NombreCliente FROM clientes";
mysqli_set_charset($conexion,'utf8');
$resultado = $conexion->query($consulta);
if($resultado!=null){
  $ok = array();
  while ($articulo = $resultado->fetch_assoc()) {
      array_push($ok,$articulo);
  }

}
return json_encode($ok);

}



function jardineriaDos(){
  $conexion = new mysqli('localhost','root','','jardineria');
  $error= $conexion->connect_errno;
  if($error!=null){
      echo "Error de conexion en la base de datos";
      exit();
  }

  $consulta= "SELECT Gama,DescripcionTexto FROM gamasproductos";
  mysqli_set_charset($conexion,'utf8');
  $resultado = $conexion->query($consulta);
  if($resultado!=null){
    $ok = array();
    while ($articulo = $resultado->fetch_assoc()) {
        array_push($ok,$articulo);
    }

  }
  return json_encode($ok);

}

function jardineriaTres(){
  $conexion = new mysqli('localhost','root','','jardineria');
  $error= $conexion->connect_errno;
  if($error!=null){
      echo "Error de conexion en la base de datos";
      exit();
  }

  $consulta= "SELECT CodigoProducto,Nombre,Gama,Descripcion,PrecioVenta FROM productos";
  mysqli_set_charset($conexion,'utf8');
  $resultado = $conexion->query($consulta);
  if($resultado!=null){
    $ok = array();
    while ($articulo = $resultado->fetch_assoc()) {
        array_push($ok,$articulo);
    }

  }
  return json_encode($ok);

}
function jardineriaCuatro($gama){
  $conexion = new mysqli('localhost','root','','jardineria');
  $error= $conexion->connect_errno;
  if($error!=null){
      echo "Error de conexion en la base de datos";
      exit();
  }

  $consulta= "SELECT CodigoProducto,Nombre,Gama,Descripcion,PrecioVenta FROM productos WHERE Gama='herramientas'";
  mysqli_set_charset($conexion,'utf8');
  $resultado = $conexion->query($consulta);
  if($resultado!=null){
    $ok = array();
    while ($articulo = $resultado->fetch_assoc()) {
        array_push($ok,$articulo);
    }

  }
   return json_encode($ok);

}

//turn off the wsdl cache
  ini_set("soap.wsdl_cache_enabled","0");
  $server = new SoapServer("jardineria.wsdl");
	$server->addFunction("jardineria");
	$server->addFunction("jardineriaDos");
	$server->addFunction("jardineriaTres");
	$server->addFunction("jardineriaCuatro");
  $server->handle();

 ?>
