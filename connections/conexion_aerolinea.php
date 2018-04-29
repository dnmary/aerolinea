<?php

$user = "root";
$pass = "";
$server = "localhost";
$database_aerolinea = "aerolinea_mary";

// Create connection
$conn = new mysqli($server, $user, $pass, $database_aerolinea);
// Check connection
if ($conn->connect_error) {
    die("Error de Conexión: " . $conn->connect_error);
} 
$conn->set_charset('utf8');
?>
