<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cce3d02ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/5.png">
    <title>CIUDADES DEL CAMBIO</title>
</head>
<?php
// destruir session
// session_destroy()
// controlo la sesion 
session_start();
if(!empty($_SESSION['us_tipo'])){
    header('Location:controlador/controladores_login.php";');
}
else{
    session_destroy();


?>
<body>
    
<div class="logo">
        <img src="img/logo.png" alt="mi fondo" class="avatar">
        <h1>login</h1>
        <!-- include  cuantas veces seas -->
        <form action="controlador/controladores_login.php" method="post">
            
            <!-- user name -->
            <label for="username"><i class="fa-solid fa-user"></i> Usuario</label>
            <input type="text" placeholder="Ingresar Usuario" name="usuario">
            <!-- pasword -->
            <label for="pasword"><i class="fa-solid fa-key"></i> Contraseña</label>
            <input type="password" placeholder="Ingresar Contraseña" name="password">

            <!-- boton -->
            <input type="submit" value="INICIO" name="btningresar">
            
        </form>

</div>
    
</body>
</html>
<?php
}
?>