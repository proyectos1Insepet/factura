<!DOCTYPE html>
<!--
Monitor de facturación
Sistemas Insepet LTDA
-->
<html>
 <head>  
  <meta charset="UTF-8">
  <link REL="stylesheet" TYPE="text/css" HREF="estilo.css">
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impresión de factura</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li><a href="index.php">Ventas</a></li>
    <li><a href="historico.php">Historico</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuracion</a></li>
  </ul>
</nav>
     <div id="resultados">
     <h1>Verifique los datos antes de imprimir</h1>
     </div>
     <p>
     <div class="justificado">
<?php

$serverName = "192.168.110.42"; //serverName\instanceName
$tabl = 'venta';
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_CLIENT_BUFFERED);
$pstock="EXEC SP_COLUMNS $tabl";
$connectionInfo = array( "Database"=>"EstacionNSX", "UID"=>"sa", "PWD"=>"6319O#17B75B21");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$servidor = "localhost";
$username = "root";
$password = "12345";
$dbname = "monitor";
$connect = new mysqli($servidor, $username, $password, $dbname);
$consulta = "SELECT  moneda, volumen FROM configuracion";
$result = $connect->query($consulta);
$row1 = $result->fetch_assoc();
$connect->close();

if (filter_input(INPUT_POST, 'enviar_x')) {
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    $num_venta = filter_input(INPUT_POST, 'num_venta'); /*isset($_POST['num_venta'])? $_POST['num_venta'] : NULL;*/
    $nombre = filter_input(INPUT_POST, 'nombre'); /*isset($_POST['nombre'])? $_POST['nombre'] : NULL;*/
    $nit = filter_input(INPUT_POST, 'nit');/*isset($_POST['nit'])? $_POST['nit'] : NULL;*/
    $dir = filter_input(INPUT_POST, 'dir'); /*isset($_POST['dir'])? $_POST['dir'] : NULL;*/
    $tel = filter_input(INPUT_POST, 'tel');/*isset($_POST['tel'])? $_POST['tel'] : NULL;*/
    $label1 = filter_input(INPUT_POST, 'select1');
    $contenido1 = filter_input(INPUT_POST, 'campo1');
    $label2 = filter_input(INPUT_POST, 'select2');
    $contenido2 = filter_input(INPUT_POST, 'campo2');
    
        

    $sql = "select  FechaFinal, dvc.Fk_IdPosicion, pg.NumeroManguera, 
                        p.Nombre,v.CantidadTotal, v.valortotal, pp.Precio from venta v
                        inner join DetalleVentaCombustible dvc on v.Pk_IdVenta = dvc.Fk_IdVenta
                        inner join PosicionGrado pg on pg.Fk_IdPosicion = dvc.Fk_IdPosicion
                        inner join Producto p on dvc.Fk_IdProducto = p.Pk_IdProducto
                        inner join precioproducto pp on dvc.Fk_IdPrecioProducto = 
                        pp.Pk_IdPrecioProducto WHERE Pk_IdVenta = $num_venta ";
    
    $query = sqlsrv_query( $conn, $sql,$params,$options);
   
    if (!$query) {
        die ('<br>Error(result): ' .print_r(sqlsrv_errors(),true));
    } else {/*echo '<br>Resultado : '.sqlsrv_num_rows($query) .' lineas(s). ';*/}
        if (sqlsrv_num_rows($query) > 0)   {
            $row = sqlsrv_fetch( $query, SQLSRV_FETCH_ASSOC);   
                if( $conn === false ) {
                    die( print_r( '<br>Error2 Fetch: ' .sqlsrv_errors(), true));
                }
            $simbolo = $row1["moneda"]; 
            $volumen = $row1["volumen"];
            $fecha = sqlsrv_get_field( $query, 0); 
            $producto = sqlsrv_get_field( $query, 3); 
            $cantidad = sqlsrv_get_field( $query, 4);
            $valor    = sqlsrv_get_field( $query, 5);
            $precio   = sqlsrv_get_field( $query, 6);
            $precio2  = $precio/1;
            $valor2 = $cantidad*$precio2;
            $fecha2 = date_format($fecha, 'Y-m-d');            
     
            echo "Fecha : ".$fecha2."<br> ";
            echo "Número de transacción : "."$num_venta"."<br>";
            echo "Nombre / Razón social : "."$nombre"."<br>";
            echo "Nit : "."$nit"."<br>" ;
            echo "Dirección : " . "$dir" . "<br>";
            echo "Teléfono : " . "$tel" . "<br>";
            if($contenido1 !=""){
                echo $label1.": ".$contenido1."<br>" ;
            }
            if($contenido2 !=""){
                echo $label2.": ".$contenido2."<br>" ;
            }
            echo "Producto : ". "$producto"."<br>";
            echo "PPU : "."$simbolo"." "."$precio2"."<br>";
            echo "Valor tanqueado : ". "$cantidad"." ".$row1["volumen"]."<br>";
            echo "Importe : "."$simbolo"." "."$valor2"."<br>";
            
} else{
    echo '<br>Sin Resultados.';
    }
    sqlsrv_free_stmt($query);
    
}
sqlsrv_close($conn);

?>
</p> 

<?php
echo '<a  target =_self href="impresora.php?fecha='.$fecha2.'&n_venta='.$num_venta.'&nombre='.$nombre.'&nit='.$nit.'&dir='.$dir.'&tel='.$tel.'&select1='.$label1.'&campo1='.$contenido1.'&select2='.$label2.'&campo2='.$contenido2.'&producto='.$producto.'&ppu='.$precio2.'&cantidad='.$cantidad.'&valor='.$valor2.'">'.'Impresión</a>'."</td> ";
?>
         </div>
    
     </body>
</html>

