<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "agregar") {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $compuesto = $_POST["compuesto"];

        $stmt = $conn->prepare("INSERT INTO platos (nombre, precio, compuesto) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $precio, $compuesto);

        if ($stmt->execute()) {
            echo "Nuevo registro creado exitosamente  <a href='index.php'>Volver a la página principal</a>";
        } else {
            echo "Error al crear el registro";
        }

        $stmt->close();
    } elseif ($_POST["action"] == "eliminar") {
        $id = $_POST["id"];

        $stmt = $conn->prepare("DELETE FROM platos WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Registro eliminado exitosamente. <a href='index.php'>Volver a la página principal</a>";
        } else {
            echo "Error al eliminar el registro";
        }

        $stmt->close();
    } elseif ($_POST["action"] == "actualizar") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $compuesto = $_POST["compuesto"];

        $stmt = $conn->prepare("UPDATE platos SET nombre = ?, precio = ?, compuesto = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $nombre, $precio, $compuesto, $id);

        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente. <a href='index.php'>Volver a la página principal</a>";
        } else {
            echo "Error al actualizar el registro";
        }

        $stmt->close();
    }
}

$conn->close();
?>
