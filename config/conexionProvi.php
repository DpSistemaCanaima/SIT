<?php


<<<<<<< HEAD
$mysqli = new mysqli("localhost", "root", "", "oac_prueba");
=======
$mysqli = new mysqli("10.10.5.28","sistema","123456", "oac_prueba");
>>>>>>> 7a05fc65ccc898eb42a3af403d7319850c78d0e8

if ($mysqli->connect_error) {
    die("Conexion Fallo:" . $mysqli->connect_error);
}
