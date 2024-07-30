<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Asistencia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="content container">
        <h1 class="mt-5 text-center">Registro de Asistencia</h1>
        <form id="asistencia-form" class="mt-4">
            <div class="btn-group btn-group-toggle d-flex mb-3" role="group">
                <button type="button" class="btn btn-primary flex-fill mr-2" onclick="mostrarFormulario('estudiante')">Soy Estudiante</button>
                <button type="button" class="btn btn-secondary flex-fill ml-2" onclick="mostrarFormulario('docente')">Soy Docente</button>
            </div>
            <div id="formulario-estudiante" class="mt-3" style="display:none;">
                <div class="form-group">
                    <label for="codigo">Código del Estudiante</label>
                    <input type="text" class="form-control" id="codigo" placeholder="Código del Estudiante">
                </div>
            </div>
            <div id="formulario-docente" class="mt-3" style="display:none;">
                <div class="form-group">
                    <label for="dni">DNI del Docente</label>
                    <input type="text" class="form-control" id="dni" placeholder="DNI del Docente">
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-success btn-lg py-5 flex-fill mr-2" onclick="registrar('entrada')">Registrar Entrada</button>
                <button type="button" class="btn btn-danger btn-lg py-5 flex-fill ml-2" onclick="registrar('salida')">Registrar Salida</button>
            </div>
        </form>
        <div id="hora-actual" class="mt-4 text-center">
            <span class="h1" id="hora-actual-text">Hora actual: </span>
        </div>
    </div>
    
    <footer class="bg-light text-center py-3 mt-auto">
        <p class="mb-2">&copy; 2024 Arnold Kevin Flores Andia @Ardks. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function mostrarFormulario(tipo) {
            document.getElementById('formulario-estudiante').style.display = (tipo === 'estudiante') ? 'block' : 'none';
            document.getElementById('formulario-docente').style.display = (tipo === 'docente') ? 'block' : 'none';
        }

        function registrar(tipoRegistro) {
            const url = '/asistencias/registrar';
            const data = {};
            if (document.getElementById('formulario-estudiante').style.display !== 'none') {
                data.codigo = document.getElementById('codigo').value;
            } else {
                data.dni = document.getElementById('dni').value;
            }
            data.tipo_registro = tipoRegistro;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            }).then(response => response.json())
              .then(data => alert(data.message))
              .catch(error => console.error('Error:', error));
        }

        function actualizarHora() {
            const ahora = new Date();
            const hora = ahora.toLocaleTimeString();
            document.getElementById('hora-actual-text').innerText = 'Hora actual: ' + hora;
        }

        setInterval(actualizarHora, 1000);
    </script>
</body>
</html>
