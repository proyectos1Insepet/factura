<!DOCTYPE html>
<!--
Monitor de facturación
Sistemas Insepet LTDA
-->
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <meta charset="UTF-8">
  <link REL="stylesheet" TYPE="text/css" HREF="estilo.css">
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Configuración de encabezado</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
 <nav id="cssmenu">
  <ul>
      <li><a href="index.php">Ventas</a></li>
    <li><a href="historico.php">Historico</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li class="active"><a href="configuracion.php">Configuracion</a></li>
  </ul>
</nav>
       
  <div>      
      <form id="formulario" name="subirImg" enctype="multipart/form-data" method="post" action="">
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
          <div class="upload1">
          <input type="file" name="imagen" id="imagen" />
          </div>
          <input type="submit" name="subirBtn" id="subirBtn" value="Ingresar" />
     </form>
  </div>
        

<div id="resultados">
    
<?php 
if (filter_input(INPUT_POST,'subirBtn')) {
	include_once("class_imgUpldr.php"); 
	$subir = new imgUpldr;
	// Inicializamos
	$subir->init($_FILES['imagen']);
}
?>
   
<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "factura";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
if (filter_input(INPUT_POST, 'enviar')) {
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    $empresa = filter_input(INPUT_POST, 'empresa');/*isset($_POST['empresa'])? $_POST['empresa'] : NULL;*/
    $dir = filter_input(INPUT_POST, 'dir'); /*isset($_POST['nombre'])? $_POST['nombre'] : NULL;*/
    $ciudad = filter_input(INPUT_POST, 'ciudad');/*isset($_POST['nit'])? $_POST['nit'] : NULL;*/
    $nit = filter_input(INPUT_POST, 'nit'); /*isset($_POST['dir'])? $_POST['dir'] : NULL;*/
    $tel = filter_input(INPUT_POST, 'tel');/*isset($_POST['tel'])? $_POST['tel'] : NULL;*/
    $moneda = filter_input(INPUT_POST, 'moneda');/*isset($_POST['tel'])? $_POST['tel'] : NULL;*/
    
    $sql = "INSERT INTO datos (empresa, dir, ciudad, nit,tel,moneda) VALUES ('$empresa','$dir','$ciudad','$nit','$tel','$moneda')";
    
    if ($conn->query($sql) === TRUE) {
    echo "Encabezado de factura insertado correctamente";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

 
        
    </body>
</html>
