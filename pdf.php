<?php
require('/fpdf/fpdf.php');
$serverName = "192.168.110.38"; //serverName\instanceName
$tabl = 'venta';
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_CLIENT_BUFFERED);
$pstock="EXEC SP_COLUMNS $tabl";
$connectionInfo = array( "Database"=>"EstacionNSX", "UID"=>"sa", "PWD"=>"6319O#17B75B21");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


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
    
    $sql = "SELECT * FROM $tabl, PrecioProducto WHERE Pk_IdVenta = $num_venta";
    
    $query = sqlsrv_query( $conn, $sql,$params,$options);
   
    if (!$query) {
        die ('<br>Error(result): ' .print_r(sqlsrv_errors(),true));
    } else {/*echo '<br>Resultado : '.sqlsrv_num_rows($query) .' lineas(s). ';*/}
        if (sqlsrv_num_rows($query) > 0)   {
            $row = sqlsrv_fetch( $query, SQLSRV_FETCH_ASSOC);   
                if( $conn === false ) {
                    die( print_r( '<br>Error2 Fetch: ' .sqlsrv_errors(), true));
                }
            $cantidad = sqlsrv_get_field( $query, 3);
            $valor    = sqlsrv_get_field( $query, 4);
            $precio    = sqlsrv_get_field( $query, 12);
            
            
} else{
    echo '<br>Sin Resultados.';
    }
    sqlsrv_free_stmt($query);
    
}
sqlsrv_close($conn);

 
 



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $servidor = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "monitor";
    $connect = new mysqli($servidor, $username, $password, $dbname);
    $consulta = "SELECT logo, empresa, dir, ciudad, nit, tel, moneda FROM configuracion";
    $result = $connect->query($consulta);
    $row = $result->fetch_assoc();
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    $connect->close();
     // Logo
    $this->Image($row["logo"],25,10,33);
    $this->Ln(25);
    $this->SetFont('Arial','',10);
    $this->Cell(0,5,'==============================',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,3,utf8_decode($row["empresa"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["dir"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["ciudad"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["nit"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,$row["tel"],0,0,'C');
    $this->Ln(4);
    // Título
    $this->Ln(4);
    $this->Cell(0,5,'Factura de venta',0,0,'C');
    $this->Ln(4);
    $this->Cell(0,5,'==============================',0,0,'C');    
    // Salto de línea
    $this->Ln(10);
}

 //Pie de página
function Footer()
{
    $servidor = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "monitor";
    $connect = new mysqli($servidor, $username, $password, $dbname);
    $consulta = "SELECT footer FROM configuracion";
    $result = $connect->query($consulta);
    $row = $result->fetch_assoc();
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    $connect->close();
    // Posición: a 1,5 cm del final
    $this->SetY(-25);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,5,'================================',0,0,'C');
    $this->Ln(3);
    $this->Cell(0,10,'Impreso por... ',0,0,'C');
    $this->Ln(4);
    $this->Cell(0,10,$row["footer"],0,0,'C');
    $this->Ln(4);
    $this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
 $servidor = "localhost";
 $username = "root";
 $password = "12345";
 $dbname   = "monitor";
 $connect = new mysqli($servidor, $username, $password, $dbname);
 $consulta = "SELECT  moneda, volumen FROM configuracion";
 $result = $connect->query($consulta);
 $row = $result->fetch_assoc();
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    $connect->close();
$pdf = new PDF('P','mm',array(80,250));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,utf8_decode('Número de transacción: ').$num_venta);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Cliente: ').$nombre);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Nit: ').$nit);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Dirección: ').$dir);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Teléfono: ').$tel);
$pdf->Ln(5);
if ($contenido1!=""){
    $pdf->Cell(0,10,utf8_decode($label1).":   ".$contenido1);
    $pdf->Ln(5);    
}
if ($contenido2!=""){
    $pdf->Cell(0,10,utf8_decode($label2).":   ".$contenido2);
    $pdf->Ln(5);     
}
$pdf->Cell(0,10,utf8_decode('PPU: ').utf8_decode($row["moneda"]).' '.$precio);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Importe: ').utf8_decode($row["moneda"]).' '.$valor);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Volumen: ').$cantidad." ".$row["volumen"]);
$pdf->Output();

