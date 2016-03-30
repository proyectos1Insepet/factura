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
  <div>
      <form  id="formulario" action="imagen.php" method="post">       
        <p><input name="empresa" type="text"  placeholder="Nombre de Empresa"/></p>
        <p><input name="dir" type="text"  placeholder="Dirección"/></p>     
        <p><input name="ciudad" type="text" placeholder="Ciudad"/></p>
        <p><input name="nit" type="text" placeholder="Nit"/></p>
        <p><input name="tel" type="text"  placeholder="Teléfono"/></p>
        <p><input name="moneda" type="text"  placeholder="Símbolo de moneda"/></p>
        <p><input name="volumen" type="text"  placeholder="Símbolo de volumen"/></p>
        <input input type="submit" name="enviar" value="Ingresar"  id="button-blue"  />        
      </div>
    </form>
  </div>
        
      
    </body>
</html>
