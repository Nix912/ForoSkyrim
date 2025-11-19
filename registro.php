<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'foroskyrim';

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        //echo"conexion exitosa";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre1 = $_POST["nombre"];
            $email1 = $_POST["email"];
            $contrasena1 = $_POST["contrasena"];
        
            // Preparar la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)";
            
            // Preparar la sentencia
            $stmt = $con->prepare($sql);
            
            // Asignar valores a los parámetros
            $stmt->bindParam(':nombre', $nombre1);
            $stmt->bindParam(':email', $email1);
            $stmt->bindParam(':contrasena', $contrasena1);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Datos almacenados correctamente en la base de datos.";
            } else {
                echo "Error al almacenar los datos en la base de datos.";
            }
        }

    }catch(PDOException $e){
        die('conexion de error:' . $e->getMessage());
    }

?>