<!DOCTYPE html>
<!--
Monitor de facturación
Sistemas Insepet LTDA
-->
<html>
 <head>
  <meta charset="UTF-8">
  <link REL="stylesheet" TYPE="text/css" HREF="../estilo.css">
  <link rel="icon" href="../favicon.ico">
  <link rel="shortcut icon" href="../favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Headline configuration</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="../insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Language : <a href="../index.php">es</a>/<a href="en/">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li><a href="index.php">Sales</a></li>
    <li class="active"><a href="historico.php">Historical</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuration</a></li>
  </ul>
</nav>
       
  <div>      
      <form id="formulario" name="subirImg" enctype="multipart/form-data" method="post" action="">
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
          <div class="upload">
          <input type="file" name="imagen" value="search"/>
          </div>
          <input type="submit" name="subirBtn" id="subirBtn" value="Submit" />
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
$dbname = "monitor";
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
    $volumen =filter_input(INPUT_POST, 'volumen');
    $puerto = filter_input(INPUT_POST, 'puerto');
    $footer = filter_input(INPUT_POST, 'footer');
    $sql = "UPDATE configuracion SET empresa='$empresa', dir='$dir', ciudad='$ciudad', nit='$nit',tel='$tel',moneda='$moneda',volumen='$volumen',puerto='$puerto',footer='$footer'";
    
    if ($conn->query($sql) === TRUE) {
    echo "Headline inserted correctly";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

 
        
    </body>
</html>
