<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Restaurante</h2>
    <h3>Añadir tus platos</h3>
    <form id="restaurante" method="POST" action="restaurante.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio"><br><br>
        <label for="compuesto">Compuesto:</label>
        <input type="text" id="compuesto" name="compuesto"><br><br>
        <input type="hidden" id="action" name="action" value="agregar">
        <button type="submit">Agregar</button>
    </form>
    <br>
    <h3>Actualizar tus platos</h3>
    <form id="actualizar_form" method="POST" action="restaurante.php" style="display:none;">
        <input type="hidden" id="id_actualizar" name="id"><br><br>
        <label for="nombre_actualizar">Nombre:</label>
        <input type="text" id="nombre_actualizar" name="nombre"><br><br>
        <label for="precio_actualizar">Precio:</label>
        <input type="text" id="precio_actualizar" name="precio"><br><br>
        <label for="compuesto_actualizar">Compuesto:</label>
        <input type="text" id="compuesto_actualizar" name="compuesto"><br><br>
        <input type="hidden" id="action_actualizar" name="action" value="actualizar">
        <button type="submit">Actualizar</button>
        <button type="button" onclick="cancelarActualizacion()">Cancelar</button>
    </form>
    <br>
    <h2>Tabla</h2>
    <table id="tabla">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Compuesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php include 'listar_platos.php'; ?>
        </tbody>
    </table>
    <script>
        function mostrarFormularioActualizar(id, nombre, precio, compuesto) {
            document.getElementById('id_actualizar').value = id;
            document.getElementById('nombre_actualizar').value = nombre;
            document.getElementById('precio_actualizar').value = precio;
            document.getElementById('compuesto_actualizar').value = compuesto;
            document.getElementById('actualizar_form').style.display = 'block';
        }

        function cancelarActualizacion() {
            document.getElementById('actualizar_form').style.display = 'none';
        }
    </script>
</body>
</html>
