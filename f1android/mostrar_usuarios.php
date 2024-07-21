<?php
include 'conexion.php';

echo "<html>";
echo "<head>";
echo "<title>USUARIO VIGENTES</title>";
echo "<style>";
echo "body {";
echo "    background-color: #333333;"; // Fondo negro claro
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
echo "    background-color: #ffffff;"; // Tarjetas blancas
echo "    border: 1px solid #dddddd;"; // Borde de tarjetas
echo "    border-radius: 10px;";
echo "    padding: 15px;";
echo "    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";
echo "    transition: transform 0.2s;";
echo "    color: #0000ff;"; // Texto azul
echo "}";
echo ".card-content {";
echo "    flex: 1;";
echo "}";
echo ".card-content h3 {";
echo "    margin: 0;";
echo "    color: #009900;"; // Nombres en verde
echo "}";
echo ".card-content p {";
echo "    margin: 5px 0;";
echo "}";
echo ".card-content p strong {";
echo "    color: #00cc00;"; // Etiquetas en verde claro
echo "}";
echo ".card:hover {";
echo "    transform: scale(1.05);";
echo "}";
echo "h2 {";
echo "    text-align: center;";
echo "    color: #ffffff;"; // Título en blanco para contraste
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h2>INVENTARIO DE USUARIOS</h2>";

echo "<div class='grid-container'>";

$sql = "SELECT id, nombre, apellido, mail, login, nivel, cedula FROM usuario";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    echo "<div class='card'>";
    echo "<div class='card-content'>";
    echo "<h3>ID: " . htmlspecialchars($fila["id"]) . "</h3>";
    echo "<p><strong style='color: #00cc00;'>Nombre:</strong> " . htmlspecialchars($fila["nombre"]) . "</p>";
    echo "<p><strong style='color: #00cc00;'>Apellido:</strong> " . htmlspecialchars($fila["apellido"]) . "</p>";
    echo "<p><strong style='color: #00cc00;'>Email:</strong> " . htmlspecialchars($fila["mail"]) . "</p>";
    echo "<p><strong style='color: #00cc00;'>Login:</strong> " . htmlspecialchars($fila["login"]) . "</p>";
    echo "<p><strong style='color: #00cc00;'>Nivel:</strong> " . htmlspecialchars($fila["nivel"]) . "</p>";
    echo "<p><strong style='color: #00cc00;'>Cédula:</strong> " . htmlspecialchars($fila["cedula"]) . "</p>";
    echo "</div>";
    echo "</div>";
}

$resultado->close();
$conexion->close();

echo "</div>";
echo "</body>";
echo "</html>";
?>

