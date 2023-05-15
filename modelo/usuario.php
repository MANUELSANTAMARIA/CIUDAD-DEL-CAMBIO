<?PHP
include_once 'conexion.php';
class usuario{
    var $objetos;
    public function __construct(){
        $db = new  conexion();
        $this->acceso = $db->pdo;
    }
function loguearse($email,$pass){
$sql="select * from usuario 
INNER JOIN tipousuario on usuario.us_tipo = tipousuario.id_tipo_us
INNER JOIN institucion on usuario.us_institucion = institucion.id_tipo_institucion
where email_us =:email and contrasena_us=:pass";
$query = $this->acceso->prepare($sql);
$query->execute(array(':email'=>$email,':pass'=>$pass));
$this->objetos=$query->fetchall();
return $this->objetos;
}//fin logearse


function crear($nombre, $apellido, $fechaNacimiento, $dni, $sexo, $correo, $contrasena, $tipo, $institucion){
    $sql = "SELECT * FROM usuario WHERE email_us = :email";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':email' => $correo));
    $this->objetos = $query->fetchAll();

    if (!empty($this->objetos)) {
        return 'noadd';
    } else {
        $sql = "INSERT INTO usuario(nombre_us, apellido_us, edad_us, dni_us, sexo_us,  email_us, contrasena_us, us_tipo, us_institucion) VALUES(:nombre, :apellido, :fechaNacimiento, :dni, :sexo, :correo, :contrasena, :tipo, :institucion);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':fechaNacimiento' => $fechaNacimiento,
            ':dni' => $dni,
            ':sexo' => $sexo,
            ':correo' => $correo,
            ':contrasena' => $contrasena,
            ':tipo' => $tipo,
            ':institucion' => $institucion,
        ));

        return 'add';
    }
}//fin de crear usuario

function buscar(){
    // si teclea  que se muestre el usuario buscar
    if(!empty($_POST['consulta'])){
       $consulta=$_POST['consulta'];
       $sql="SELECT * FROM usuario 
       join tipousuario ON us_tipo=id_tipo_us
       join institucion on us_institucion = id_tipo_institucion
       where nombre_us LIKE :consulta  OR apellido_us LIKE :consulta" ;
       $query=$this->acceso->prepare($sql);
       $query->execute(array(':consulta'=>"%$consulta%"));
       $this->objetos=$query->fetchall();
       return $this->objetos;
    }
    else{
        $sql="SELECT * FROM usuario 
        join tipousuario on us_tipo=id_tipo_us 
        join institucion on us_institucion = id_tipo_institucion
        where nombre_us NOT LIKE '' ORDER BY id_us LIMIT 25";
        $query=$this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;

    }
}//fin de buscar usuario

     
function borrar($pass,$id_borrado,$id_usuario){
    $sql="SELECT id_us, contrasena_us FROM usuario where id_us=:id_usuario and contrasena_us=:pass";
    $query=$this->acceso->prepare($sql);
    $query->execute(array(':id_usuario'=>$id_usuario,':pass'=>$pass));
    $this->objetos=$query->fetchall();
    if(!empty($this->objetos)){
        $sql="DELETE FROM usuario where id_us=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_borrado));
        // $this->objetos=$query->fetchall();
        echo 'borrado';
    }else{
        echo 'noborrado';

  
    }
}//fin de borrar usuario
  
//consulta de las instituciones
function buscar_institucion() {
    $sql = "SELECT * FROM institucion";
    $query = $this->acceso->prepare($sql);
    $query->execute();
    $this->objetos = $query->fetchAll(PDO::FETCH_ASSOC);
    return $this->objetos;
}

} 


?>  