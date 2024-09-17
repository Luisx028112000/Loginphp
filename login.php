<?php

$nombreServidor = "localhost";
$Username = "root";
$Contrasena = "8293716541@Ll";
$dbname = "login";

$ConexionDB = new mysqli($nombreServidor, $Username, $Contrasena, $dbname);

// saber si esta bien
if ( $ConexionDB->connect_errno) {
    die("conexion fallo");

}else{
    die(" hola soy goku!!");
}

    // obtener los datos del formulario
    $nombre = $_POST ['usuario'];
    $pass = $_POST ['password'];
// vamos hacer consulta a la base de datos
$sql = "select * from login where nombre = ?;";
$stmt = $ConexionDB->prepare($sql);
$stmt->bin_param ("s",$nombre);
$stmt->executte ();
$resultado = $stmt->get_result();

 // verificar si el usuario existe
 if ( $resultado->num_rows > 0 ) {
 $row = $resultado->fetch_assoc ();

  if (password_verify($pass,$row['password'])){

    echo 'Login exitoso';

  }else{
    echo "La contrasena es incorrecta";
  }
 
 } else{
    echo 'usuario no conectado o no existe';
}

// Cerrar conexion
$setmt->close();
$ConexionDB-> close()

?>

