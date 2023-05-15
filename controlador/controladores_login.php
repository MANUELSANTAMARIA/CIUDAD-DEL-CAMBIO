<?php
include_once '../modelo/usuario.php';
// //para destruir session
// iniciar sesiones 
session_start();
// traigo la variables del usuario metodo post
$email = $_POST['usuario'];
$pass = $_POST['password'];
$usuario = new usuario();
//comprobar
// $usuario->loguearse($email,$pass);
// foreach($usuario->objetos as $objeto) {
//   //traigo el objeto de la consulta pdo
//   print_r($objeto);
// }

// control de accesos ver si ahi una sesion en curso
if(!empty($_SESSION['us_tipo'])){
  switch($_SESSION['us_tipo']){
      case 1:
          header('Location:../vista/root_catalogo.php');
         break;
         case 2:
          header('Location:../vista/admin_catalogo.php');
         break;
         case 3:
          header('Location:../vista/tecnico_catalogo.php');
         break;
         }
}
else{
//paso la funcion que esta controler de login 
$usuario->loguearse($email,$pass);
//compara si me mando objeto pdo
if(!empty($usuario->objetos)){
  foreach($usuario->objetos as $objeto) {
    print_r($objeto->id_us);
    $_SESSION["usuario"]=$objeto->id_us;
    $_SESSION["us_tipo"]=$objeto->us_tipo;
    $_SESSION["nombre"]=$objeto->nombre_us;
    $_SESSION["apellido"]=$objeto->apellido_us;
    $_SESSION["email"]=$objeto->email_us;
    $_SESSION["fechanacimiento"]=$objeto->edad_us;
    $_SESSION["rol"]=$objeto->nombre_tipo_us;
    $_SESSION["dni"]=$objeto->dni_us;
    $_SESSION["nomnre-institucion"]=$objeto->nombre_institucion;
    

    // Obtener fecha actual
    $fechaActual = date('Y-m-d');
    //Calcular diferencia entre fechas
    $diff = date_diff(date_create($objeto->edad_us), date_create($fechaActual));
    // Obtener la edad
    $edad = $diff->format('%y');
    // edad actual
    $_SESSION["edad"] = $edad;

  }
  switch ($_SESSION["us_tipo"]) {
    case 1:
      header('Location:../vista/root_catalogo.php');
      break;
    
      case 2:
        header('Location:../vista/admin_catalogo.php');
      break;
      case 3:
        header('Location:../vista/tecnico_catalogo.php');
      break;
  }
}
// caso contrario
else{
  header('Location: ../index.php');
}
}
?>