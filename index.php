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

  <title>Formulario de facturación</title>
 </head>
 <body>
     <header class="header"><a href="index.php"> <img src="insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Idioma : <a href="index.php">es</a>/<a href="en/index.php">en</a></div>
 <nav id="cssmenu">
  <ul>
      <li class="active"><a href="index.php">Ventas</a></li>
    <li><a href="historico.php">Historico</a></li>
    <li><a href="configuracion.php">Configuracion</a></li>
  </ul>
</nav>
       

    <form  id="formulario"  method="post">
        <p><input name="num_venta" type="text"  placeholder="Número de venta" value="<?php echo filter_input(INPUT_GET, 'num_venta'); ?>" /></p>
      <p><input name="nombre" type="text"  placeholder="Nombre"  /></p>
      <p><input name="nit" type="text" placeholder="Nit"  /></p>
      <p><input name="dir" type="text" placeholder="Dirección"  /></p>
      <p><input name="tel" type="text"  placeholder="Teléfono"  /></p>    
      <input type="image" name="enviar"  src="printer_64.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'impresion.php';this.form.target = '_blank';"/>
      <input type="image" name="enviar"  src="pdf.png" alt="impresion" width="60px" height="60px"  onclick ="this.form.action = 'pdf.php';this.form.target = '_blank';"/>
     
      </form>
  
    
    
        

<div id="impresion">
   

    
    
    

        
    </body>
</html>
