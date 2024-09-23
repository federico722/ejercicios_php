<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripcion - Club Campestre Minecraft</title>
    <!-- Integracion de Bootstrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Formulario de Inscripcion - Club Campestre Minecraft</h1>

        <form action="procesar_formulario1.php" method="post">

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="rangoMinecraft" class="form-label">Rango en Minecraft</label>
                <select name="rangoMinecraft" id="rangoMinecraft" class="form-select" required>
                    <option value=" "></option>
                    <option value="Explorador">Explorador</option>
                    <option value="Constructor">Constructor</option>
                    <option value="Guerrero">Guerrero</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                 <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="actividad" class="form-label">Actividad</label>
                 <select class="form-control" id="actividad" name="actividad" required>
                    <option value=" "> </option>
                    <option value="Cuidar vacas">Cuidadar Vacas</option>
                    <option value="Plantar Trigo">Plantar Trigo</option>
                    <option value="Picar Piedra">Picar Piedra</option>
                 </select>
            </div>
            <button class="btn btn-primary">Enviar</button>
            
        </form>

    </div>
</body>
</html>
