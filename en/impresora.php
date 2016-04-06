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
   <title>Invoice Printing</title>
 </head>

  <body>
      <header class="header"><a href="index.php"> <img src="../insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Language : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li class="active"><a href="index.php">Sales</a></li>
    <li><a href="historico.php">Historical</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuration</a></li>
  </ul>
</nav>  



<?php
require('/fpdf/fpdf.php');
    
$servidor = "localhost";
$username = "root";
$password = "12345";
$dbname = "monitor";
$connect = new mysqli($servidor, $username, $password, $dbname);
$consulta = "SELECT logo, empresa, dir, ciudad, nit, tel, moneda,volumen, puerto FROM configuracion";
$result = $connect->query($consulta);
$row = $result->fetch_assoc();
$connect->close();
if(($handle = @fopen($row["puerto"], "w")) === FALSE){
        die('It can not print. Please check the printer configuration');
    }
$fecha   =  filter_input(INPUT_GET, 'fecha');
$nventa  =  filter_input(INPUT_GET, 'n_venta');
$cliente =  filter_input(INPUT_GET, 'nombre');
$nit =  filter_input(INPUT_GET, 'nit');
$dir =  filter_input(INPUT_GET, 'dir');
$tel =  filter_input(INPUT_GET, 'tel');
$producto = filter_input(INPUT_GET, 'producto');
$ppu      = filter_input(INPUT_GET, 'ppu');
$cantidad = filter_input(INPUT_GET, 'cantidad');
$valor    = filter_input(INPUT_GET, 'valor');
$label1 = filter_input(INPUT_GET, 'select1');
$contenido1 = filter_input(INPUT_GET, 'campo1');
$label2 = filter_input(INPUT_GET, 'select2');
$contenido2 = filter_input(INPUT_GET, 'campo2');
/*$dato = $_POST['datos'];  */

fwrite($handle,chr(27). chr(64));//reinicio

//fwrite($handle, chr(27). chr(112). chr(48));//ABRIR EL CAJON
fwrite($handle, chr(27). chr(100). chr(0));//salto de linea VACIO
fwrite($handle, chr(27). chr(33). chr(8));//negrita
fwrite($handle, chr(27). chr(97). chr(1));//centrado
fwrite($handle,"=================================");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(32). chr(3));//ESTACIO ENTRE LETRAS
fwrite($handle,$row["empresa"]);
fwrite($handle, chr(27). chr(32). chr(0));//ESTACIO ENTRE LETRAS
fwrite($handle, chr(27). chr(100). chr(0));//salto de linea VACIO
fwrite($handle, chr(27). chr(33). chr(8));//negrita
fwrite($handle, chr(27). chr(100). chr(0));//salto de linea VACIO
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,$row["dir"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,$row["ciudad"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,$row["nit"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,$row["tel"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Invoice");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(97). chr(0));//justificado a izquierda
fwrite($handle,"Date:                ".$fecha);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Operation number:         ".$nventa);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Customer:            ".$cliente);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"VAT:              ".$nit);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Address:  ".$dir);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Phone:          ".$tel);
if ($contenido1!=""){
    fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
    fwrite($handle,$label1." :          ".$contenido1);    
}
if ($contenido2!=""){
    fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
    fwrite($handle,$label2." :        ".$contenido2);    
}
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Product:              ".$producto);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"PPU:                    ".$row["moneda"]." ".$ppu);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Quantity:               ".$cantidad." ".$row["volumen"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Value:             ".$row["moneda"]." ".$valor);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle,"Printing by ...");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Data invoice");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea

fclose($handle); // cierra el fichero PRN
$salida = shell_exec('lpr'.$row["ciudad"]); //lpr->puerto impresora, imprimir archivo PRN
?>
