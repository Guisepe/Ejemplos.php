<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda de Pacientes</title>
</head>
<body>
    <center><h1>Busqueda de Pacientes</h1></center>
    <form action="22.1-consulta-pdo.php" method="POST">
        <input type="text" placeholder="Escribe aqui" name="nombre" id="nombre" /><br>
        <label for="tos">Tos</label><input type="checkbox" name="tos" id="tos">
        <button type="submit">Buscar</button>
    </form>
    <table style="border: 1px solid black;">
        <tr>
            <th>Paciente</th>
            <th>Edad</th>
            <th>Talla</th>
            <th>Peso</th>
            <th>Tos</th>
            <th>Fiebre</th>
            <th>Disnea</th>
            <th>Acciones</th>
        </tr>

        </table>
        <!-- </form> -->
<script 
src="https://code.jquery.com/jquery-3.7.1.min.js
25.1-ajax.js"></script>
</body>
</html>
