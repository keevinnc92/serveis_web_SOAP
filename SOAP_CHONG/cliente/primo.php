
<html>
  <head>
    <title>Comprueba primo</title>
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
                      <?php
                      	if (isset($_POST['number']) ) {
                      		//turn off the WSDL cache
                      		ini_set("soap.wsdl_cache_enabled","0");

                      		$client = new SoapClient("http://localhost/SOAP_CHONG/servidor/primo.wsdl");

                      		$number = $_POST['number'];

                      		$resultado = $client->primo($number);
                          if($resultado){
                            echo "<h2 style='color:green;'>primo correcto</h2>";
                          }else {
                          echo "<h2 style='color:red;'>primo incorrecto</h2>";
                          }



                      	}
                      ?>

                            <input name="number" type="text" id="number" placeholder="introduzca dato">

                        <button class="btn btn-info btn-block login" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
    </div>

  </body>
</html>
