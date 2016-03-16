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

  <title>Billing Form</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="../insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Language : <a href="../index.php">es</a>/<a href="en/">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li class="active"><a href="index.php">Sales</a></li>
    <li><a href="historico.php">Historical</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li><a href="configuracion.php">Configuration</a></li>
  </ul>
</nav>
       
<div>
    <form  id="formulario"  method="post">
        <p><input name="num_venta" type="text"  placeholder="Número de venta" value="<?php echo filter_input(INPUT_GET, 'num_venta'); ?>" /></p>
      <p><input name="nombre" type="text"  placeholder="Name"  /></p>
      <p><input name="nit" type="text" placeholder="VAT"  /></p>
      <p><input name="dir" type="text" placeholder="Address"  /></p>
      <p><input name="tel" type="text"  placeholder="Phone"  /></p>    
      <input type="image" name="enviar"  src="../printer_64.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'impresion.php';this.form.target = '_blank';"/>
      <input type="image" name="enviar"  src="../pdf.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'pdf.php';this.form.target = '_blank';"/>
     
      </form>
  </div>
     
    
        

<div id="impresion">
   

    
    
    

        
    </body>
</html>
