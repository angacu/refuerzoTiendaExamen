<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listar Ventas</title>
  </head>
  <body>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "tienda");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: " .
        $mysqli->connect_error;
    }else {
      // damos valores para mandar por $post
      $articulo=$_POST["articulo"];
      $precioUd=$_POST["precioUd"];
      $uds=$_POST["uds"];
      $fecha=$_POST["fecha"];

    // hacemos la consulta para insertar y para mostrar todos los datos
     $consulta = $mysqli->query("INSERT INTO ventas (articulo, precioUd, uds, fecha) VALUES ('$articulo', $precioUd, $uds, '$fecha')");
     $consulta2 = $mysqli->query("SELECT * FROM ventas");

    // cuantas filas nos devuelve
  	echo "<br>Acabamos de introducir la venta: ".$articulo."<br>";
    echo "<br>";

    // mostramos las especificaciones del ejercicio (ultimo user insertado y lista total d inserts)
    while ($mostrarVentas = $consulta2->fetch_assoc()) {

        echo "Nombre articulo: ".$mostrarVentas['articulo']."<br>";
        echo "Precio x Unidad: ".$mostrarVentas['precioUd']."<br>";
        echo "Lista de ventas: ".$mostrarVentas['uds']."<br>";
        echo "Fecha de salida: ".$mostrarVentas['fecha']."<br>";
        echo "<br>";
        echo "<hr>";
    }
   }
    ?>
    <!-- boton para atras -->
    <form action="nuevaVenta.php">
      <input type="submit" value="Volver a insertar">
    </form>
  </body>
</html>
