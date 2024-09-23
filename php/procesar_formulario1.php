
<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "club_campestre";

function createConnection($host, $username, $password, $database){
      $conexion = new mysqli($host, $username, $password, $database);
   //verifica la conexion 
    if($conexion->connect_error){
        die("Error de conexion: " . $conexion->connect_error);
    }
    return $conexion;
}

// funcion para validar fecha 
function validateDate($date){
    $validatingDate = DateTime::createFromFormat('Y-m-d', $date);
    return $validatingDate &&  $validatingDate->format('Y-m-d',) === $date;
}   

// funcion para ejecutar consultas SQL preparadas 
function executeQuery($conexion, $query, $params, $types){
       $stmt = $conexion->prepare($query);
       if ($stmt === false) {
          die("Error al preparar la consulta: " . $conexion->error);
       }
       $stmt->bind_param($types, ...$params);
       $result = $stmt->execute();
       if (!$result) {
         die("Error al ejecutar la consulta: " . $stmt->error);
       }
       $stmt->close();
       return $result;
}



//funcion para limpiar y validar la entrada 
function cleanInput($data){
    $data = trim($data);
    $data =  stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// iniciar la conexion 
$conexion = createConnection($host, $username, $password, $database);


// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = cleanInput($_POST['nombre'] ?? '');
    $email = cleanInput($_POST['email'] ?? '');
    $rango = cleanInput($_POST['rangoMinecraft'] ?? '');
    $fecha = cleanInput($_POST['fecha'] ?? '');
    $actividad = cleanInput($_POST['actividad'] ?? '');

    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Error: El correo electrónico no es válido.";
    }

    if (!validateDate($fecha)) {
        $errors[] = "Error: La fecha no es válida. Fecha recibida: " . $fecha;
    }

    if (empty($nombre) || empty($email) || empty($rango) || empty($fecha) || empty($actividad)) {
        $errors[] = "Error: Todos los campos son obligatorios.";
    }

    if (empty($errors)) {
        $query = "INSERT INTO inscripciones (nombre, email, rangoMinecraft, fecha, actividad) VALUES (?, ?, ?, ?, ?)";
        $params = [$nombre, $email, $rango, $fecha, $actividad];
        $types = "sssss";

        if (executeQuery($conexion, $query, $params, $types)) {
            echo "<div class='alert alert-success'>Gracias por inscribirte, " . htmlspecialchars($nombre) . "!</div>";
            echo "<p>Detalles:</p>";
            echo "<ul>";
            echo "<li>Correo: " . htmlspecialchars($email) . "</li>";
            echo "<li>Rango en Minecraft: " . htmlspecialchars($rango) . "</li>";
            echo "<li>Fecha: " . htmlspecialchars($fecha) . "</li>";
            echo "<li>Actividad: " . htmlspecialchars($actividad) . "</li>";
            echo "</ul>";
        } else {
            echo "<div class='alert alert-danger'>Error al insertar los datos.</div>";
        }
    } else {
        foreach ($errors as $error){
            echo "<div class='alert alert-danger'>" . htmlspecialchars($error) . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-info'>Por favor, envía el formulario.</div>";
}
//Cierra la conexion 
$conexion->close();
?>