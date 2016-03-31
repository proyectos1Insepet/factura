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
   <title>Impresión de recibo</title>
 </head>

  <body>
      <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
      <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
        <nav id="cssmenu">
            <ul>
                <li><a href="index.php">Ventas</a></li>
                <li><a href="historico.php">Historico</a></li>
                <li><a href="configuracion.php">Configuracion</a></li>
            </ul>
        </nav>  


<?php
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
        die('No se puedo Imprimir, Verifique su conexion con el Terminal');
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
fwrite($handle,"Factura de venta");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(97). chr(0));//justificado a izquierda
fwrite($handle,"Fecha:               ".$fecha);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Numero de venta:        ".$nventa);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Cliente:            ".$cliente);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Nit:              ".$nit);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Dirección: ".$dir);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Telefono:               ".$tel);
if ($contenido1!=""){
    fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
    fwrite($handle,$label1." :        ".$contenido1);    
}
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Producto:             ".$producto);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"PPU:                    ".$row["moneda"]." ".$ppu);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Cantidad:               ".$cantidad." ".$row["volumen"]);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Valor:             ".$row["moneda"]." ".$valor);
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle,"Impreso por ...");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"Resolucion de facturacion 123-456");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle,"=================================");
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea
fwrite($handle, chr(27). chr(100). chr(1));//salto de linea

fclose($handle); // cierra el fichero PRN
$salida = shell_exec('lpr'.$row["ciudad"]); //lpr->puerto impresora, imprimir archivo PRN
?>
      
  </body>
</html>