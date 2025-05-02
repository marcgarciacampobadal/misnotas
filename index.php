<?php
include 'conexion.php';

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];

    // Obtener la nota a editar
    $sql = "SELECT * FROM notas WHERE id = $id";
    $result = $conexion->query($sql);
    $nota = $result->fetch_assoc();

    // Mostrar el formulario de edición
    echo "<h2>Editar Nota</h2>";
    echo "<form action='index.php' method='POST'>";
    echo "<input type='text' name='titulo' value='" . $nota['titulo'] . "' required>";
    echo "<textarea name='contenido'>" . $nota['contenido'] . "</textarea>";
    echo "<button type='submit' name='actualizar' value='$id'>Actualizar</button>";
    echo "</form>";
}

// Lógica para actualizar la nota
if (isset($_POST['actualizar'])) {
    $id = $_POST['actualizar'];
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    $sql = "UPDATE notas SET titulo = '$titulo', contenido = '$contenido' WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        echo "Nota actualizada correctamente.";
    } else {
        echo "Error al actualizar la nota: " . $conexion->error;
    }
}

// Crear una nueva nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crear'])) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    // Insertar la nueva nota en la base de datos
    $sql = "INSERT INTO notas (titulo, contenido) VALUES ('$titulo', '$contenido')";
    if ($conexion->query($sql) === TRUE) {
        echo "Nota guardada correctamente.";
    } else {
        echo "Error al guardar la nota: " . $conexion->error;
    }
}

// Eliminar una nota
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];

    // Eliminar la nota de la base de datos
    $sql = "DELETE FROM notas WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        echo "Nota eliminada con éxito.";
    } else {
        echo "Error al eliminar la nota: " . $conexion->error;
    }
}

// Obtener todas las notas
$sql = "SELECT * FROM notas";
$result = $conexion->query($sql);

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Notas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Aplicación de Notas</h1>

        <!-- Formulario para crear nuevas notas -->
        <h2>Crear una nueva nota</h2>
        <form action="index.php" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required>

            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido" required></textarea>

            <button type="submit" name="crear">Guardar Nota</button>
        </form>

        <!-- Mostrar las notas existentes -->
        <h2>Notas Guardadas</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h3>" . $row["titulo"] . "</h3>";
                echo "<p>" . $row["contenido"] . "</p>";
                echo "<p><small>Fecha de creación: " . $row["fecha_creacion"] . "</small></p>";
                echo "<a href='index.php?editar=" . $row["id"] . "'>Editar</a> | ";
                echo "<a href='index.php?eliminar=" . $row["id"] . "'>Eliminar</a>";
                echo "</div><hr>";
            }
        } else {
            echo "No hay notas disponibles.";
        }
        ?>
    </div>
</body>
</html>
