<?php
include("../connections/conexion_aerolinea.php");

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha_salida'];
//echo $fecha; exit();
//consulta mysql para insertar los datos del empleados
$insert_sql = "INSERT INTO trayectos (ciudad_origen_id, ciudad_destino_id, fecha_salida) VALUES ('$origen','$destino','$fecha')";
//echo $insert_sql; exit();
$insert = $conn->query($insert_sql);
if ($insert_sql) {
    echo "Reserva realizada con éxito!";
} else {
    echo "No se pudo realizar la reserva";
}
?>

