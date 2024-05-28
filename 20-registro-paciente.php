<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Paciente</title>
</head>
<body>
    <h1>Registro de Paciente</h1>
    <form id="formulario" action="21-pdo-post.php" method="post">
        <label for="nombre">Nombres:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellido">Apellidos:</label>
        <input type="text" id="apellido" name="apellido"><br>
        
        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" required><br>
        
        <label for="talla">Talla (cm):</label>
        <input type="text" id="talla" name="talla" required><br>
        
        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso"><br>
        
        <h2><u>Síntomas</u></h2>
        <input type="checkbox" name="sintomas[]" id="tos" value="Tos">
        <label for="tos">Tos</label><br>
        
        <input type="checkbox" name="sintomas[]" id="fiebre" value="Fiebre">
        <label for="fiebre">Fiebre</label><br>
        
        <input type="checkbox" name="sintomas[]" id="disnea" value="Disnea">
        <label for="disnea">Disnea</label><br>
        
        <input type="checkbox" name="sintomas[]" id="dolor_muscular" value="Dolor muscular">
        <label for="dolor_muscular">Dolor muscular</label><br>
        
        <input type="checkbox" name="sintomas[]" id="gripe" value="Gripe">
        <label for="gripe">Gripe</label><br>
        
        <input type="checkbox" name="sintomas[]" id="presion_alta" value="Presión alta">
        <label for="presion_alta">Presión alta</label><br>
        
        <input type="checkbox" name="sintomas[]" id="fatiga" value="Fatiga">
        <label for="fatiga">Fatiga</label><br>
        
        <input type="checkbox" name="sintomas[]" id="garraspera" value="Garraspera">
        <label for="garraspera">Garraspera</label><br>
        
        <label for="fecha">Fecha de vacunación:</label>
        <input type="date" id="fecha" name="fecha"><br>
        
        <div class="Botones">
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
    </form>
</body>
</html>
