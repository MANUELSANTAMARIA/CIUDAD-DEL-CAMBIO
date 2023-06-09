<?php
// conexión PDO (PHP Data Objects) en PHP
class conexion{
    private $servidor = "localhost";
    private $db = "ciudades_cambio";
    private $puerto = 3306;
    private $charset="utf8";
    private $usuario="root";
    private $contrasena="";
    public $pdo = null;
    // PDO::ATTR_CASE:establecer el modo en que los nombres de columnas se devuelven en los resultados de consultas.
    // PDO::CASE_LOWER: indica que los nombres de las columnas se devuelven en minúsculas.
    // PDO::CASE_NATURAL: indica que los nombres de las columnas se devuelven tal y como están definidos en la base de datos.
    // PDO::CASE_UPPER: indica que los nombres de las columnas se devuelven en mayúsculas.
    // PDO::ATTR_ERRMODE: el modo en que se manejan los errores producidos durante la conexión y ejecución de consultas en la base de datos
    // PDO::ERRMODE_EXCEPTION: indica que los errores se manejarán como excepciones, lo que permitirá capturarlos y manejarlos de manera personalizada en el código.
    // PDO::ATTR_ORACLE_NULLS:utiliza para establecer el modo en que se manejan los valores nulos (NULL) en las consultas SQL en bases de datos Oracle.
    // PDO::NULL_EMPTY_STRING: indica que los valores nulos se mostrarán como una cadena vacía en los resultados de las consultas.
    // PDO::NULL_NATURAL: indica que los valores nulos se manejarán de manera natural, es decir, se mostrarán como NULL en los resultados de las consultas.
    // PDO::ATTR_DEFAULT_FETCH_MODE:se utiliza para establecer el modo en que se devuelven los resultados de las consultas
    // Esta constante acepta dos valores principales:
    // PDO::FETCH_ASSOC: indica que los resultados se devolverán como un array asociativo.
    // PDO::FETCH_OBJ: indica que los resultados se devolverán como un objeto.
    // Además, esta constante también acepta algunos valores combinados que permiten obtener resultados de diferentes formas:
    // PDO::FETCH_BOTH: indica que los resultados se devolverán como un array asociativo y numérico.
    // PDO::FETCH_NUM: indica que los resultados se devolverán como un array numérico.
    // PDO::FETCH_COLUMN: indica que se devolverá una sola columna de la primera fila del resultado.
    // PDO::FETCH_CLASS: indica que los resultados se devolverán como una instancia de la clase especificada.
    // PDO::ERRMODE_SILENT: indica que los errores se manejarán de manera silenciosa, es decir, no se lanzarán excepciones ni se mostrarán mensajes de error.
    // PDO::ERRMODE_WARNING: indica que los errores se mostrarán como advertencias en el registro de errores de PHP.    
    private $atributos=[PDO::ATTR_CASE=>PDO::CASE_LOWER,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_ORACLE_NULLS=>PDO::NULL_EMPTY_STRING,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ];
    //constructor
    function __construct(){
       
     $this->pdo= new PDO("mysql:dbname={$this->db};host={$this->servidor};port={$this->puerto};charset={$this->charset}",$this->usuario,$this->contrasena,$this->atributos);  
        
    }
       
}






/*
conexion 2
 $host: la url del servidor o la ip del servidor
 $user: el usuario de mysql
 $password: contraseña
 $database: nombre de mi base de datos
 $port: si hemos cambiado el puerto  si no la podemos borrar
 */

//  $host = "localhost";
//  $user = "root";
//  $password = "";
//  $database = "ciudades_cambio";
 
 //$conexion = mysqli_connect($host, $user, $password, $database);

// $conexion = new mysqli($host, $user, $password, $database);
 
 //consulta para configurar la codificacion de caracteres como Ñ un tilde etc...
 /*
  $link: la conexion 
  $database: la consulta
  */
 //mysqli_query($conexion, "SET NAMES 'utf8'");
//  $conexion->set_charset("utf8");
 
 
//  combrar la conexion

//  if(mysqli_connect_error()){
//      echo "conexion fallida".mysqli_connect_error();
//  }else{
//      echo "conexion exitosa ";
//  }
 







?>