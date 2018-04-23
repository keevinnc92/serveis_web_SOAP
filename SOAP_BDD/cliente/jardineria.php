
<html>
  <head>
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 30%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
    <title>Comprueba dni</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>

    <div class="container">
        <div class="login-container">
                <div id="output"></div>

                <div class="form-box">
                    <form id="form1" name="form1" method="post" action="">


<button  class="btn btn-info btn-block login" name="clientes" type="submit" value="clientes" id="clientes">Clientes</button>
<button  class="btn btn-info btn-block login" name="clientesDos" type="submit" value="clientesDos" id="clientesDos">Gama productos</button>
<button  class="btn btn-info btn-block login" name="clientesTres" type="submit" value="clientesTres" id="clientesTres">Datos productos</button>
<hr>
<input type="text" placeholder="Buscar">
<button  class="btn btn-success btn-block login" name="clientesCuatro" type="submit" value="clientesCuatro" id="clientesCuatro">Buscar</button>

                    </form>
                </div>
            </div>






            <?php


          if (!empty($_POST) ) {

          ini_set("soap.wsdl_cache_enabled","0");
          $client = new SoapClient("http://localhost/SOAP_BDD/servidor/jardineria.wsdl");
          if (isset($_POST['clientes']) ) {
              $resultado = $client->jardineria();
                $datos= json_decode($resultado,true);
                echo "<table id='customers'><tr>
                <th>Nombre Clientes</th>
                </tr>";

                foreach ($datos as $dato) {
                   echo "<tr><td>".$dato['NombreCliente']."</td></tr>";
                }
                echo "</table>";
          }else if (isset($_POST['clientesDos']) ) {
              $resultado = $client->jardineriaDos();
              $datos= json_decode($resultado,true);
              echo "<table id='customers'><tr>
              <th>Gama </th>
              <th>Descripcion Texto </th>
              </tr>";

              foreach ($datos as $dato) {
                 echo "<tr><td>".$dato['Gama']."</td>";
                 echo "<td>".$dato['DescripcionTexto']."</td></tr>";

              }
              echo "</table>";

          }else if (isset($_POST['clientesTres']) ) {
              $resultado = $client->jardineriaTres();
              $datos= json_decode($resultado,true);
              echo "<table id='customers'><tr>
              <th>CodigoProducto </th>
              <th>Nombre  </th>
              <th>Gama  </th>
              <th>Descripcion  </th>
              <th>PrecioVenta  </th>
              </tr>";

              foreach ($datos as $dato) {
                 echo "<tr><td>".$dato['CodigoProducto']."</td>";
                 echo "<td>".$dato['Nombre']."</td>";
                 echo "<td>".$dato['Gama']."</td>";
                 echo "<td>".$dato['Descripcion']."</td>";
                 echo "<td>".$dato['PrecioVenta']."</td></tr>";

              }
              echo "</table>";

          }else if (isset($_POST['clientesCuatro']) ) {
              $resultado = $client->jardineriaCuatro();

            if (!empty($resultado)) {

              $datos= json_decode($resultado,true);


              echo "<table id='customers'><tr>
              <th>CodigoProducto </th>
              <th>Nombre  </th>
              <th>Gama  </th>
              <th>Descripcion  </th>
              <th>PrecioVenta  </th>
              </tr>";

              foreach ($datos as $dato) {
                 echo "<tr><td>".$dato['CodigoProducto']."</td>";
                 echo "<td>".$dato['Nombre']."</td>";
                 echo "<td>".$dato['Gama']."</td>";
                 echo "<td>".$dato['Descripcion']."</td>";
                 echo "<td>".$dato['PrecioVenta']."</td></tr>";

              }
              echo "</table>";

            }else{
              echo "VACIO";
            }

          }


          }

            ?>








    </div>

  </body>
</html>
