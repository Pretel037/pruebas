<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Matrícula</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #2ecc71;
            --text-color: #ecf0f1;
            --hover-color: #34495e;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, var(--primary-color), #2980b9);
            height: 100vh;
            color: var(--text-color);
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all var(--transition-speed);
        }

        .sidebar:hover {
            width: 260px;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            flex-grow: 1;
            background-color: #f5f6fa;
            min-height: 100vh;
        }

        .user-profile {
            padding: 25px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 20px 0;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 5px;
        }

        .user-status {
            font-size: 0.85em;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
        }

        .user-status.online::before {
            content: "";
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--accent-color);
            border-radius: 50%;
            margin-right: 5px;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin: 5px 0;
        }

        .menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-color);
            text-decoration: none;
            transition: all var(--transition-speed);
            border-left: 4px solid transparent;
            font-size: 0.95em;
        }

        .menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent-color);
            padding-left: 25px;
        }

        .menu i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1em;
        }

        .menu li.active > a {
            background-color: rgba(52, 152, 219, 0.3);
            border-left-color: var(--accent-color);
        }

        /* Agregamos efectos de hover para los íconos */
        .menu a:hover i {
            transform: scale(1.1);
            color: var(--accent-color);
        }

        /* Estilo para las badges de notificación */
        .badge {
            background-color: var(--accent-color);
            color: white;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 0.75em;
            margin-left: auto;
        }

        /* Animación de carga */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content {
            animation: fadeIn 0.5s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }

            .sidebar:hover {
                width: 250px;
            }

            .content {
                margin-left: 70px;
            }

            .user-name, .user-status {
                display: none;
            }

            .sidebar:hover .user-name,
            .sidebar:hover .user-status {
                display: block;
            }

            .menu a span {
                display: none;
            }

            .sidebar:hover .menu a span {
                display: inline;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="user-profile">
            <div class="user-info">
                <span class="user-name">Sistema de Matrícula</span>
                <span class="user-status online">Activo</span>
            </div>
        </div>

        <nav class="menu">
            <ul>
                <li class="active">
                    <a href="{{ route('form.registrar.alumno') }}">
                        <i class="fas fa-user-plus"></i>
                        <span>Matricular</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('matriculados.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Matriculados</span>
                        <span class="badge">New</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('registros.index') }}">
                        <i class="fas fa-folder-open"></i>
                        <span>Registro de alumnos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span>Ayuda</span>
                    </a>
                </li>

                <div class="logout-section">
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Cerrar Sesión</span>
                        </button>
                    </form>
                </div>
            </div>
            </ul>
        </nav>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>