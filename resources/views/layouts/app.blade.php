<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Profesores</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- SweetAlert2 CSS (Opcional pero recomendado) -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        body {
            background-color: rgb(252, 253, 255);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow"
        style="background: linear-gradient(90deg, #0d47a1, #1976d2);">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('profesores.index') }}"
                style="font-size: 1.3rem;">
                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2"
                    style="width: 40px; height: 40px;">
                    <i class="fas fa-chalkboard-teacher text-primary" style="font-size: 1.5rem;"></i>
                </span>
                <span class="text-light">Gestión de Profesores</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('profesores.todas-materias') }}">
                            <i class="fas fa-users"></i> Materias Sin Profesor
                        </a>
                    </li>

                    
<!-- Añadir nuevo botón "Inactivos" -->
<li class="nav-item">
    <a class="nav-link text-light" href="{{ route('profesores.inactivos') }}">
        <i class="fas fa-user-slash"></i> Profesores Inactivos
    </a>
</li>
<li class="nav-item">
    <a class="nav-link text-light" id="contactoLink" href="#">
        <i class="fas fa-envelope"></i> Contacto
    </a>
</li>

                </ul>
            </div>
        </div>
    </nav>

    <div id="app">
        @yield('content')
    </div>

    <!-- jQuery (Optional but recommended for some plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <!-- Global Scripts -->
    <script>
        // Configuración global de CSRF Token para Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Función global para mostrar notificaciones
        function showNotification(type, message) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 3000
            });
        }

        // Manejar mensajes flash de sesión
        @if(session('success'))
            showNotification('success', '{{ session('success') }}');
        @endif

        @if(session('error'))
            showNotification('error', '{{ session('error') }}');
        @endif

        @if(session('warning'))
            showNotification('warning', '{{ session('warning') }}');
        @endif
    </script>
<script>
    document.getElementById('contactoLink').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Terciario Urquiza',
            html: `
                <p><strong>BEDELIA:</strong> Para trámites generales de los alumnos.</p>
                <p><strong>Horario de atención:</strong> Lunes a viernes de 19:30 a 21:30 – Primer piso.</p>
                <p><strong>Email:</strong> <a href="mailto:info@terciariourquiza.edu.ar">info@terciariourquiza.edu.ar</a></p>
                
                <p><strong>SECRETARÍA:</strong> Para asistencia docente.</p>
                <p><strong>Horario de atención:</strong> Lunes a viernes de 08:00 a 22:00 – Planta baja.</p>
                <p><strong>Email 1:</strong> <a href="mailto:escuelaurquizaofrecimientos@gmail.com">escuelaurquizaofrecimientos@gmail.com</a></p>
                <p><strong>Email 2:</strong> <a href="mailto:secretaria49urquiza@gmail.com">secretaria49urquiza@gmail.com</a></p>

                <p><strong>Formulario de contacto:</strong> También puede comunicarse con nosotros a través del siguiente formulario de contacto.</p>
            `,
            icon: 'info', // Icono para oficina (puedes cambiarlo por otro de tu preferencia)
            confirmButtonText: 'Cerrar'
        });
    });
</script>



    <!-- Stacked Scripts -->
    @stack('scripts')
</body>

</html>