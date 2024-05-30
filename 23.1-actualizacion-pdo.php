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
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="checkbox"] {
            margin-bottom: 10px;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        <input type="checkbox" id="tos">
        <label for="tos">Tos</label>
        <input type="checkbox" id="fiebre">
        <label for="fiebre">Fiebre</label>
        <input type="checkbox" id="disnea">
        <label for="disnea">Disnea</label>
        <input type="checkbox" id="dolorMuscular">
        <label for="dolorMuscular">Dolor Muscular</label>
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
            <input type="checkbox" id="editTos">
            <label for="editTos">Tos</label>
            <input type="checkbox" id="editFiebre">
            <label for="editFiebre">Fiebre</label>
            <input type="checkbox" id="editDisnea">
            <label for="editDisnea">Disnea</label>
            <input type="checkbox" id="editDolorMuscular">
            <label for="editDolorMuscular">Dolor Muscular</label>
        </div>
        <div class="form-group">
            <button onclick="guardarCambios()">Guardar Cambios</button>
        </div>
    </div>
</div>

<script>
    const pacientes = [
        { nombre: 'Hugo', edad: 25, talla: 174, peso: 50, sintomas: ['Tos', 'Fiebre'] },
        { nombre: 'María', edad: 48, talla: 160, peso: 100, sintomas: ['Disnea'] },
        // Añadir más pacientes según sea necesario
    ];

    let pacienteEditando = null;

    function buscarPacientes() {
        const nombre = document.getElementById('nombre').value.toLowerCase();
        const sintomasSeleccionados = [
            document.getElementById('tos').checked ? 'Tos' : '',
            document.getElementById('fiebre').checked ? 'Fiebre' : '',
            document.getElementById('disnea').checked ? 'Disnea' : '',
            document.getElementById('dolorMuscular').checked ? 'Dolor Muscular' : ''
        ].filter(Boolean);

        const resultados = pacientes.filter(paciente => {
            const coincideNombre = paciente.nombre.toLowerCase().includes(nombre);
            const coincideSintomas = sintomasSeleccionados.every(sintoma => paciente.sintomas.includes(sintoma));
            return coincideNombre && coincideSintomas;
        });

        mostrarResultados(resultados);
    }

    function mostrarResultados(resultados) {
        const tbody = document.querySelector('.results-table tbody');
        tbody.innerHTML = '';

        if (resultados.length === 0) {
            tbody.innerHTML = '<tr><td colspan="8">No se encontraron pacientes</td></tr>';
            return;
        }

        resultados.forEach(paciente => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${paciente.nombre}</td>
                <td>${paciente.edad}</td>
                <td>${paciente.talla}</td>
                <td>${paciente.peso}</td>
                <td>${paciente.sintomas.includes('Tos') ? '<span class="checkmark">&#10003;</span>' : '<span class="cross">&#10007;</span>'}</td>
                <td>${paciente.sintomas.includes('Fiebre') ? '<span class="checkmark">&#10003;</span>' : '<span class="cross">&#10007;</span>'}</td>
                <td>${paciente.sintomas.includes('Disnea') ? '<span class="checkmark">&#10003;</span>' : '<span class="cross">&#10007;</span>'}</td>
                <td class="actions">
                    <button onclick="editarPaciente('${paciente.nombre}')">Editar</button>
                    <button onclick="eliminarPaciente('${paciente.nombre}')">Eliminar</button>
                </td>
            `;
            tbody.appendChild(fila);
        });
    }

    function editarPaciente(nombre) {
        pacienteEditando = pacientes.find(paciente => paciente.nombre === nombre);

        if (pacienteEditando) {
            document.getElementById('editNombre').value = pacienteEditando.nombre;
           
