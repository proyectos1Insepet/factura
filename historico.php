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
  
  <title>Histórico de ventas</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li><a href="index.php">Ventas</a></li>
    <li class="active"><a href="historico.php">Historico</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuracion</a></li>
  </ul>
</nav>
       
        

<div id="resultados">
    <h1>Histórico de ventas</h1>
   
<?php
$serverName = "192.168.110.120"; //serverName\instanceName
$tabl = 'venta';
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_CLIENT_BUFFERED);
$pstock="EXEC SP_COLUMNS $tabl";
$connectionInfo = array( "Database"=>"EstacionNSX", "UID"=>"sa", "PWD"=>"6319O#17B75B21");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

?>
    <?php
$servidor = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "factura";
    $connect = new mysqli($servidor, $username, $password, $dbname);
    $consulta = "SELECT moneda, volumen FROM datos";
    $result = $connect->query($consulta);
    $row2 = $result->fetch_assoc();
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    $connect->close();

?>
    
<?php
$sql2 = "SELECT MAX(Pk_IdVenta) FROM $tabl";
$query2 = sqlsrv_query( $conn, $sql2,$params,$options);
if (!$query2) {
        die ('<br>Error(result): ' .print_r(sqlsrv_errors(),true));
    } else {/*echo '<br>Resultado : '.sqlsrv_num_rows($query2) .' lineas(s). ';*/}

    
    $row = sqlsrv_fetch( $query2, SQLSRV_FETCH_ASSOC);   
    if( $conn === false ) {
        die( print_r( '<br>Error2 Fetch: ' .sqlsrv_errors(), true));
    }
    $ultima   = sqlsrv_get_field( $query2,0);
  ?>  
    
    <table id="tabla" border="1">
	<thead>
            <tr>
		<th>Fecha</th>
                <th>Consecutivo de venta</th>
                <th>Posición</th>
                <th>Manguera</th>
		<th>Cantidad Vendida</th>
		<th>Valor vendido</th>
                <th>Producto</th>                
	    </tr>
	</thead>
    <tbody>         
 <?php   
   echo "<tr>";
    for($i= $ultima; $i>($ultima - 100); $i--){
        $sql3 = "select  FechaFinal, dvc.Fk_IdPosicion, pg.NumeroManguera, 
                        p.Nombre,v.CantidadTotal, v.valortotal, pp.Precio from venta v
                        inner join DetalleVentaCombustible dvc on v.Pk_IdVenta = dvc.Fk_IdVenta
                        inner join PosicionGrado pg on pg.Fk_IdPosicion = dvc.Fk_IdPosicion
                        inner join Producto p on dvc.Fk_IdProducto = p.Pk_IdProducto
                        inner join precioproducto pp on dvc.Fk_IdPrecioProducto = 
                        pp.Pk_IdPrecioProducto WHERE Pk_IdVenta = $i ";
        if($i<0)
            break;
        $query3 = sqlsrv_query( $conn, $sql3,$params,$options);
        if (!$query3) {
            die ('<br>Error(result): ' .print_r(sqlsrv_errors(),true));
        } 
        if (sqlsrv_num_rows($query3) > 0)   {
            $row = sqlsrv_fetch( $query3, SQLSRV_FETCH_ASSOC);   
            if( $conn === false ) {
                die( print_r( '<br>Error2 Fetch: ' .sqlsrv_errors(), true));
            }
            $fecha = sqlsrv_get_field( $query3, 0);
            $posicion  = sqlsrv_get_field( $query3, 1);
            $manguera  = sqlsrv_get_field( $query3, 2);
            $producto  = sqlsrv_get_field( $query3, 3);
            $cantidad2 = sqlsrv_get_field( $query3, 4);
            $valor2    = sqlsrv_get_field( $query3, 5);
                                                           
            echo "<td background-color:#F5D0A9;>"." ".date_format($fecha, 'Y-m-d H:i:s')."</td> ";
            echo "<td background-color:#F5D0A9;>".'<a href="index.php?num_venta='.$i.'">'.$i.'</a>'."</td> ";
            echo "<td background-color:#F5D0A9;>".$posicion." </td>";
            echo "<td background-color:#F5D0A9;>".$manguera." </td>";
            echo "<td background-color:#F5D0A9;>".$cantidad2." ".$row2["volumen"]."</td>";
            echo "<td background-color:#F5D0A9;>"." ".$row2["moneda"].$valor2." </td>";
            echo "<td background-color:#F5D0A9;>".$producto." </td>";            
    echo "</tr>";        
            }else {echo '<br>Sin Resultados.';}                                
                
    }         
sqlsrv_free_stmt($query2);
sqlsrv_free_stmt($query3);
sqlsrv_close($conn);
?> 
		</tbody>
	</table>
</div>



        
    </body>
</html>
