<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Evento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Enlace a Bootstrap -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registrar Nuevo Evento</h2>

        <form action="solicitud_evento.php" method="POST">
            <!-- Tipo de Evento -->
            <div class="form-group">
                <label for="tipoEvento">Tipo de Evento</label>
                <input type="text" class="form-control" id="tipoEvento" name="tipoEvento" required>
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <!-- Lugar -->
            <div class="form-group">
                <label for="lugar">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" required>
            </div>

           <!-- Cliente -->
           <div class="form-group">
            <label for="clienteID">Cliente</label>
            <select class="form-control" id="clienteID" name="clienteID" required>
                <option value="">Seleccionar Cliente</option>
                <?php
                include 'connect.php'; // Verifica que este archivo contiene la conexión correcta
        
                // Consulta para obtener los clientes
                $query = "SELECT ClienteID, NombreCliente FROM clientes";
                $result = $conn->query($query);
        
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ClienteID'] . "'>" . $row['NombreCliente'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay clientes disponibles</option>";
                }
                ?>
            </select>
        </div>
        

<!-- Proveedor -->
<div class="form-group">
    <label for="proveedorID">Proveedor</label>
    <select class="form-control" id="proveedorID" name="proveedorID" required>
        <option value="">Seleccionar Proveedor</option>
        <?php
        // Consulta para obtener los proveedores
        $query = "SELECT ProveedorID, NombreProveedor FROM proveedores";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ProveedorID'] . "'>" . $row['NombreProveedor'] . "</option>";
            }
        } else {
            echo "<option value=''>No hay proveedores disponibles</option>";
        }

        // Cerrar conexión después de la consulta
        $conn->close();
        ?>
    </select>
</div>



            <!-- Botón de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Registrar Evento</button>
                <a href="dashboard_eventos.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>