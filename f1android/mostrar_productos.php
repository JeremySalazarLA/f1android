<?php
include 'conexion.php';

echo "<html>";
echo "<head>";
echo "<title>INVENTARIO DE MERCH</title>";
echo "<style>";
echo "body {";
echo "    background: linear-gradient(to right, #ffcccc, #ccccff);";
echo "    font-family: Arial, sans-serif;";
echo "    margin: 0;";
echo "    padding: 0;";
echo "    display: flex;";
echo "    flex-direction: column;";
echo "    align-items: center;";
echo "}";
echo ".grid-container {";
echo "    display: grid;";
echo "    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));";
echo "    gap: 20px;";
echo "    padding: 20px;";
echo "    width: 90%;";
echo "    max-width: 1200px;";
echo "}";
echo ".card {";
echo "    display: flex;";
echo "    align-items: center;";
echo "    background-color: #ccffcc;";
echo "    border: 1px solid #99cc99;";
echo "    border-radius: 10px;";
echo "    padding: 15px;";
echo "    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";
echo "    transition: transform 0.2s;";
echo "}";
echo ".card img {";
echo "    width: 150px;";
echo "    height: 150px;";
echo "    object-fit: cover;";
echo "    margin-left: 20px;";
echo "}";
echo ".card-content {";
echo "    flex: 1;";
echo "}";
echo ".card-content h3 {";
echo "    margin: 0;";
echo "}";
echo ".card-content p {";
echo "    margin: 5px 0;";
echo "}";
echo ".card:hover {";
echo "    transform: scale(1.05);";
echo "}";
echo "h2 {";
echo "    text-align: center;";
echo "    color: #333;";
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h2>INVENTARIO DE PRODUCTO</h2>";

echo "<div class='grid-container'>";

$sql = "SELECT id_producto, nombre_producto, escuderia, precio, categoria, stock, fecha FROM merch_f1";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    // Definir la ruta de la imagen basada en la escudería y la categoría
    $escuderia = htmlspecialchars($fila["escuderia"]);
    $categoria = htmlspecialchars($fila["categoria"]);
    $imagenProducto = '';

    if ($escuderia == 'Red Bull') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/RedBullgorra.png';
        } else {
            $imagenProducto = 'merch/RedBullcamiseta.png';
        }
    } elseif ($escuderia == 'Mercedes') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/Mercedesgorra.png';
        } else {
            $imagenProducto = 'merch/Mercedessudadera.png';
        }
    } elseif ($escuderia == 'Ferrari') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/Ferrarigorra.png';
        } else {
            $imagenProducto = 'merch/Ferraricamiseta.png';
        }
    } elseif ($escuderia == 'McLaren') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/McLarengorra.png';
        } else {
            $imagenProducto = 'merch/McLarenSudadera.png';
        }
    } elseif ($escuderia == 'Aston Martin') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/Astongorra.png';
        } else {
            $imagenProducto = 'merch/Astoncamiseta.png';
        }
    } elseif ($escuderia == 'Williams') {
        if ($categoria == 'accesorio') {
            $imagenProducto = 'merch/Williamsgorra.png';
        } else {
            $imagenProducto = 'merch/Williamscamiseta.png';
        }
    }

    echo "<div class='card'>";
    echo "<div class='card-content'>";
    echo "<h3>Producto ID: " . htmlspecialchars($fila["id_producto"]) . "</h3>";
    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($fila["nombre_producto"]) . "</p>";
    echo "<p><strong>Escudería:</strong> " . htmlspecialchars($fila["escuderia"]) . "</p>";
    echo "<p><strong>Precio:</strong> $" . htmlspecialchars($fila["precio"]) . "</p>";
    echo "<p><strong>Categoría:</strong> " . htmlspecialchars($fila["categoria"]) . "</p>";
    echo "<p><strong>Stock:</strong> " . htmlspecialchars($fila["stock"]) . "</p>";
    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($fila["fecha"]) . "</p>";
    echo "</div>";
    echo "<img src='" . $imagenProducto . "' alt='Imagen del Producto'>";
    echo "</div>";
}

$resultado->close();
$conexion->close();

echo "</div>";
echo "</body>";
echo "</html>";
?>
