<?php
include_once '../modelo/usuario.php';
 // Crear una instancia de la clase Usuario
$usuario = new Usuario();
session_start();
$id_usuario =  $_SESSION["usuario"];
//insertar usuario
if ($_POST['funcion'] == 'crear_usuario') {
    // Obtener los datos enviados por AJAX
    $nombre = filter_input(INPUT_POST, 'nombre_usuario', FILTER_SANITIZE_STRING);
    $apellido = filter_input(INPUT_POST, 'apellido_usuario', FILTER_SANITIZE_STRING);
    $fechaNacimiento = filter_input(INPUT_POST, 'fecha_nacimiento', FILTER_SANITIZE_STRING);
    $dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST, 'select_sexo', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'select_tipo', FILTER_VALIDATE_INT);
    $institucion = filter_input(INPUT_POST, 'select_institucion', FILTER_VALIDATE_INT);


    // Llamar al método crear del objeto usuario
    $resultado = $usuario->crear($nombre, $apellido, $fechaNacimiento, $dni, $sexo, $correo, $contrasena, $tipo, $institucion);

    // Devolver una respuesta al cliente
    echo $resultado;
}

// buscar usuario
if($_POST['funcion']=='buscar_usuarios_adm'){
    $json=array();
    // $fecha_actual = new DateTime();
//mandar modelo 
$usuario->buscar();
foreach ($usuario->objetos as $objeto) { 
// $nacimiento = new DateTime($objeto->edad);
// $edad=$nacimiento->diff($fecha_actual);
// $edad_years = $edad->y;
    $json[]=array(
    'id_us'=>$objeto->id_us,   
    'nombre'=>$objeto->nombre_us,
    'apellidos'=>$objeto->apellido_us,
    // 'edad'=>$edad_years,
    'dni'=>$objeto->dni_us,
    'sexo'=>$objeto->sexo_us,
    'correo'=>$objeto->email_us,
    'tipo'=>$objeto->nombre_tipo_us,
    'us_tipo'=>$objeto->us_tipo, 
    'us_institucion'=>$objeto->nombre_institucion, 
    
);
    
}

$jsonstring = json_encode($json);
echo $jsonstring;
}

// borrar usuario
if($_POST['funcion']=='borrar-usuario')
{
 $pass=$_POST['pass'];
 $id_borrado=$_POST['id_usuario'];
 $usuario->borrar($pass,$id_borrado,$id_usuario);

}


// buscar instituciones
if ($_POST['funcion'] == 'buscar_institucion') {
    $json = array();
    $usuario->buscar_institucion();
    foreach ($usuario->objetos as $objeto) { 
        $json[] = array(
            'id_tipo_institucion' => $objeto['id_tipo_institucion'],
            'nombre_institucion' => $objeto['nombre_institucion'],
        );  
    }
    
    $jsonstring = json_encode($json, JSON_UNESCAPED_UNICODE);
    echo $jsonstring;
}
?>