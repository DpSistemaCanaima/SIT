<?php

$mysqli = new mysqli("localhost", "root", "", "oac_prueba");


//$mysqlig = new mysqli("10.10.5.28", "sistema", "123456", "oac_prueba");


if ($mysqli->connect_error) {
    die("Conexion Fallo:" . $mysqli->connect_error);
}