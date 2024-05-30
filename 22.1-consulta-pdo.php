<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-----BUSCAR--PACIENTES-----</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .search-container {
            max-width: 800px;
            margin: auto;
            padding: 40px;
            border: 2px solid #ccc;
            border-radius: 20px;
        }
        .search-container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 30px;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
        }
        .form-group input[type="text"], .form-group input[type="checkbox"] {
            margin-bottom: 20px;
        }
        .form-group button {
            display: block;
            width: 200%;
            padding: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .results-table {
            width: 200%;
            border-collapse: collapse;
            margin-top: 40px;
        }
        .results-table th, .results-table td {
            border: 2px solid #ccc;
            padding: 16px;
            text-align: left;
        }
        .results-table th {
            background-color: #f4f4f4;
        }
        .actions button {
            margin-right: 10px;
        }
        .checkmark {
            color: green;
            font-weight: bold;
        }
        .cross {
            color: red;
            font-weight: bold;
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

<script>
    const pacientes = [
        { nombre: 'Hugo', edad: 25, talla: 174, peso: 50, sintomas: ['Tos', 'Fiebre'] },
        { nombre: 'María', edad: 48, talla: 160, peso: 100, sintomas: ['Disnea'] },
        // Añadir más pacientes según sea necesario
    ];

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
        alert(`Editar paciente: ${nombre}`);
    }

    function eliminarPaciente(nombre) {
        if (confirm(`¿Estás seguro de que deseas eliminar al paciente ${nombre}?`)) {
            const index = pacientes.findIndex(paciente => paciente.nombre === nombre);
            if (index !== -1) {
                pacientes.splice(index, 1);
                buscarPacientes();
            }
        }
    }
</script>

</body>
</html>
