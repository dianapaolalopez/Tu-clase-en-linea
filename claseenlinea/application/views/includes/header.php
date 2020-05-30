<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>TU CLASE EN LINEA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Core CSS de Bootstrap-->
    <link href="<?php echo base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- mi estylo CSS -->
    <link href="<?php echo base_url(); ?>/vendor/bootstrap/css/Estilo.css" rel="stylesheet">
    <!-- Fuentes Personalizadas -->
    <link href="<?php echo base_url(); ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php $usuario = $this->session->userdata('usuario'); ?>
    <?php $nombre = $this->session->userdata('nombres'); ?>
    <?php $identificacion = $this->session->userdata('identificacion'); ?>
    <?php $tipo = $this->session->userdata('tipo'); ?>
    <?php $login = $this->session->userdata('logged_in'); ?>
    

    <nav class="navbar navbar-expand-md fixed-top bg-danger navbar-dark">
        <!-- la imagen o logo del menu  -->
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url(); ?>/vendor/images/Logo.png" id="imglogo" alt="logo">
        </a>
        <!-- icono para el menu de dispositivos moviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!---->
        <!-- opciones de menu -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto text-center">

                <li class="nav-item dropdown" id="100">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Home
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>welcome">Principal</a>
                        <a class="dropdown-item" href="#clase">Tu clase en linea</a>
                        <a class="dropdown-item" href="#beneficios">Beneficios</a>
                        <a class="dropdown-item" href="#soporte">Soporte y Mantenimiento</a>
                    </div>
                </li>
               
                <?php if ($login == 0) : ?>
                <li class="nav-item" id="101">
                    <a class="nav-link" href="<?php echo base_url(); ?>Login/">Ingresar</a>
                </li>
                <li class="nav-item" id="102">
                    <a class="nav-link" href="<?php echo base_url(); ?>Registro/">Registro</a>
                </li>
                <?php endif; ?>
                <?php if ($tipo === 'Estudiante'||$tipo === 'Administrador') : ?>
                    <li class="nav-item" id="103">
                        <a class="nav-link" href="<?php echo base_url(); ?>Materias/">Mis Actividades</a>
                    </li>
                <?php endif; ?>
                <?php if ($tipo === 'Docente'||$tipo === 'Administrador' ) : ?>
                <li class="nav-item" id="104">
                    <a class="nav-link" href="<?php echo base_url(); ?>Actividades/">Actividades</a>
                </li>
                <?php endif; ?>
                <?php if ($tipo === 'Estudiante'|| $tipo === 'Docente'||$tipo === 'Administrador' ) : ?>
                <li class="nav-item" id="105">
                    <a class="nav-link" href="<?php echo base_url(); ?>Notas/">Consulta Notas</a>
                </li>
                <?php endif; ?>
                <?php if ($tipo === 'Docente'||$tipo === 'Administrador') : ?>
                <li class="nav-item" id="106">
                    <a class="nav-link" href="<?php echo base_url(); ?>Calificacion/">Calificación</a>
                </li>
                <?php endif; ?>
                <?php if ($tipo === 'Administrador') : ?>
                <li class="nav-item dropdown" id="107">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Configuraciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>Registro/listaUsuarios">Activar Usuarios</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>Materias/listaMaterias">Nuevas Materias</a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if ($login == 1) : ?>
                <li class="nav-item" id="108">
                    <a class="nav-link" href="<?php echo base_url(); ?>Login/logout">Salir</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- fin del menu -->
    </nav>