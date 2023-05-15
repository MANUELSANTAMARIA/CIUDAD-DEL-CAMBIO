<!-- link css -->

<link rel="stylesheet" href="../css/nav.css">
<link rel="stylesheet" href="../css/contenido.css">
<link rel="icon" type="image/x-icon" href="../img/5.png">



</head>
<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <!-- llamar el contrlador salir -->
        <div class="cerrar__menu">
        <a href="../controlador/controlador_cerrar_sesion.php">CERRAR SESION</a>
        </div>
    </header>
<?php
// Definir el array de opciones de menú para cada tipo de usuario
$menuOptions = array(
    1 => array(
        array(
            'href' => '../vista/root_catalogo.php',
            'icon' => 'fas fa-home',
            'title' => 'Inicio',
            'text' => 'INICIO'
        ),
        array(
            'href' => '../vista/admin_usuario.php',
            'icon' => 'fas fa-users',
            'title' => 'Gestión de Usuarios',
            'text' => 'GESTIONAR USUARIOS'
        )
    ),
    2 => array(
        array(
            'href' => '../vista/admin_catalogo.php',
            'icon' => 'fas fa-home',
            'title' => 'Inicio',
            'text' => 'INICIO'
        )
    ),
    3 => array(
        array(
            'href' => '../vista/tecnico_catalogo.php',
            'icon' => 'fas fa-home',
            'title' => 'Inicio',
            'text' => 'INICIO'
        )
    )
);


// Obtener el tipo de usuario actual desde $_SESSION
$userType = $_SESSION['us_tipo'];
?>

<div class="menu__side" id="menu_side">
    <div class="name__page">
        <i class="fa-regular fa-user"></i>
        <h4><?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?></h4>
    </div>
    <div class="options__menu">
        <?php foreach ($menuOptions[$userType] as $option) : ?>
            <a href="<?php echo $option['href']; ?>">
                <div class="option">
                    <i class="<?php echo $option['icon']; ?>" title="<?php echo $option['title']; ?>"></i>
                    <h4><?php echo $option['text']; ?></h4>
                </div>
            </a>
        <?php endforeach; ?>

        <a href="../vista/datos_personales.php">
            <div class="option">
                <i class="fas fa-user-cog" title="Datos Personales"></i>
                <h4>DATOS PERSONALES</h4>
            </div>
        </a>
        <a href="../vista/admin_proyecto.php">
            <div class="option">
                <i class="fas fa-tools" title="Proyectos"></i>
                <h4>PROYECTOS</h4>
            </div>
        </a>
    </div>
</div>



