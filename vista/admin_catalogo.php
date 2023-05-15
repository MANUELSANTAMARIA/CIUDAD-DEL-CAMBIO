<?php
// controlo la sesion entre paginas
//inciar sesiones 
session_start();
if($_SESSION['us_tipo']==2){
    include_once 'layouts/header.php';
?>
<?php
    include_once 'layouts/nav.php';
?>

<h1>ADMINISTRADOR<h1>

<?php
include_once 'layouts/footer.php';
?>
<?php
}
else{
    header('Location: ../index.php');
}
?>