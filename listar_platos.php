<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM platos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["precio"] . "</td>
                <td>" . $row["compuesto"] . "</td>
                <td>
                    <form style='display:inline;' method='POST' action='restaurante.php'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='hidden' name='action' value='eliminar'>
                        <button type='submit'>Eliminar</button>
                    </form>
                    <button onclick='mostrarFormularioActualizar(" . $row["id"] . ", \"" . $row["nombre"] . "\", \"" . $row["precio"] . "\", \"" . $row["compuesto"] . "\")'>Actualizar</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay platos registrados</td></tr>";
}

$conn->close();
?>
