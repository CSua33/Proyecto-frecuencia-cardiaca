
<?php
$conexion = new mysqli('localhost', 'root', '', 'contador');
$sum = $_POST['sum'];
$update = "UPDATE counters SET counter = ".$sum." WHERE id = 1";
$conexion->query($update);
?>