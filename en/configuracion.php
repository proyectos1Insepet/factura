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
     <header class="header"><a href="en/index.php"> <img src="../insepet.png" alt="Logo sistema NSX"></a> </header>
     <div id="idioma">Language : <a href="../index.php">es</a>/<a href="en/">en</a></div>
 <nav id="cssmenu">
  <ul>
    <li><a href="index.php">Sales</a></li>
    <li><a href="historico.php">Historical</a></li>
    <!--<li><a href="turno.php">Turnos</a></li>-->
    <li class="active"><a href="configuracion.php">Configuration</a></li>
  </ul>
</nav>
       
<div>
  <div>
      <form  id="formulario" action="imagen.php" method="post">       
        <p><input name="empresa" type="text"  placeholder="Business name"/></p>
        <p><input name="dir" type="text"  placeholder="Address"/></p>     
        <p><input name="ciudad" type="text" placeholder="City"/></p>
        <p><input name="nit" type="text" placeholder="VAT"/></p>
        <p><input name="tel" type="text"  placeholder="Phone number"/></p>
        <p><input name="moneda" type="text"  placeholder="Currency symbol"/></p>
        <input input type="submit" name="enviar" value="Submit"  id="button-blue"  />        
      </div>
    </form>
  </div>
        
      
    </body>
</html>
