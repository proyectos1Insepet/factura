<?php
 
  $mysqli = new mysqli('localhost', 'root', '12345', 'factura');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Demo de menú desplegable</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="generator" content="Geany 1.23.1" />
</head>

<body>
  <div align="center">
    <h1>Demo de menú desplegable</h1>
								
    <p>Seleccione una Fruta del siguiente menú:</p>
    <p>Fruta:
      <select>
        <option value="0">Selección:</option>
        <?php
										
          $query = $mysqli -> query ("SELECT * FROM datos");
											
          while ($valores = mysqli_fetch_array($query)) {
												
            echo '<option value="">'.$valores[dir].'</option>';
													
          }
        ?>
      </select>
      <button>Enviar</button>
    </p>
  </div>
</body>

</html>