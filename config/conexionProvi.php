<?php

//$mysqli = new mysqli("localhost", "danyerbert", "27047631ghots", "oac_prueba");


$mysqli = new mysqli("10.10.5.28", "sistema", "123456", "oac_prueba");


if ($mysqli->connect_error) {
    die("Conexion Fallo:" . $mysqli->connect_error);
}