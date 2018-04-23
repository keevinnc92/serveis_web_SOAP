
<html>
  <head>
    <title>Comprueba nombre_completo</title>
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
                    <form  id="form1" name="form1" method="post" action="">
                      <?php
                      	if (isset($_POST['nombre']) ) {
                      		//turn off the WSDL cache
                      		ini_set("soap.wsdl_cache_enabled","0");

                      		$client = new SoapClient("http://localhost/SOAP_CHONG/servidor/nombre_completo.wsdl");

                      		$nombre = $_POST['nombre'];
                      		$apellido1 = $_POST['apellido1'];
                      		$apellido2 = $_POST['apellido2'];

                      		$resultado = $client->nombre_completo($nombre,$apellido1,$apellido2);
                          if($resultado){
                             // echo "<h2 style='color:green;'>nombre_completo correcto</h2>";
                             echo "<h2 style='color:green;'>".$resultado."</h2>";

                          }else {
                          echo "<h2 style='color:red;'>--</h2>";
                          }



                      	}
                      ?>

                            <input name="nombre" type="text" id="nombre" placeholder="introduzca nombre">
                            <input name="apellido1" type="text" id="apellido1" placeholder="introduzca primer apellido">
                            <input name="apellido2" type="text" id="apellido2" placeholder="introduzca segundo apellido">

                        <button class="btn btn-info btn-block login" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
    </div>

  </body>
</html>
