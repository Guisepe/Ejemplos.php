<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .search-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .search-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .form-group label {
            margin-bottom: 5px;
            margin-right: 10px;
            flex: 0 0 auto;
        }
        .form-group input[type="checkbox"] {
            margin-bottom: 10px;
            margin-right: 5px;
            flex: 0 0 auto;
        }
        .form-group .symptom-checkboxes {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: -5px;
        }
        .form-group .symptom-checkboxes label {
            margin-right: 10px;
        }
        .form-group .symptom-checkboxes input[type="checkbox"] {
            margin-right: 5px;
        }
        .form-group button {
            display: block;
            width: auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            margin-top: 10px;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .results-table th, .results-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .results-table th {
            background-color: #f4f4f4;
        }
        .actions button {
            margin-right: 5px;
        }
        .checkmark {
            color: green;
            font-weight: bold;
        }
        .cross {
            color: red;
            font-weight: bold;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 500px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="search-container">
    <h2>Búsqueda de Pacientes</h2>
    <div class="form-group">
        <label for="nombre">Nombres o Apellidos</label>
        <input type="text" id="nombre" placeholder="Ingrese el nombre o apellido del paciente">
    </div>
    <div class="form-group">
        <div class="symptom-checkboxes">
            <label for="tos">Tos</label>
            <input type="checkbox" id="tos">
            <label for="fiebre">Fiebre</label>
            <input type="checkbox" id="fiebre">
            <label for="disnea">Disnea</label>
            <input type="checkbox" id="disnea">
            <label for="dolorMuscular">Dolor Muscular</label>
            <input type="checkbox" id="dolorMuscular">
        </div>
    </div>
    <div class="form-group">
        <button onclick="buscarPacientes()">Buscar</button>
    </div>
</div>

<table class="results-table" id="resultados">
    <thead>
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
    </thead>
    <tbody>
        <!-- Resultados de la búsqueda se mostrarán aquí -->
    </tbody>
</table>

<!-- Modal para editar paciente -->
<div id="editarModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Editar Paciente</h2>
        <div class="form-group">
            <label for="editNombre">Nombre</label>
            <input type="text" id="editNombre">
        </div>
        <div class="form-group">
            <label for="editEdad">Edad</label>
            <input type="number" id="editEdad">
        </div>
        <div class="form-group">
            <label for="editTalla">Talla</label>
            <input type="number" id="editTalla">
        </div>
        <div class="form-group">
            <label for="editPeso">Peso</label>
            <input type="number" id="editPeso">
        </div>
        <div class="form-group">
            <div class="symptom-checkboxes">
                <label for="editTos">Tos</label>
                <input type="checkbox" id="editTos">
                <label for="editFiebre">Fiebre</label>
                <input type="checkbox" id="editFiebre">
                <label for="editDisnea">Disnea</label>
                <input type="checkbox" id="editDisnea">
                <label for="editDolorMuscular">Dolor Muscular</label>
                <input type="checkbox" id="editDolorMuscular">
            </div>
        </div>
        <div class="form-group">
            <button onclick="guardarCambios()">Guardar Cambios</button>
        </div>
    </div>
</
