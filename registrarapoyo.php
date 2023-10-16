<?php
// Conexion a la base de datos
require "config/conexionProvi.php";
//  Funciones requeridas para la validacion de los datos.
require "function.php";

if ($_POST) {
    $ic = limpiarDatos($_POST['ic']);
    $documento = limpiarDatos($_POST['documento']);
    $tipoDocumento = limpiarDatos($_POST['tipo_documento']);
    $nombreInstitucion = limpiarDatos($_POST['nombre_de_institucion']);
    $AreaInsti = limpiarDatos($_POST['area']);
    $cargoInsti = limpiarDatos($_POST['cargo']);
    $correoInsti = limpiarDatos($_POST['correoInsti']);
    $telefonoInsti = limpiarDatos($_POST['phone']);
    $estadoInsti = limpiarDatos($_POST['estado']);
    $municipio = limpiarDatos($_POST['estado']);
    $direccionInsti = limpiarDatos($_POST['direccion']);
    $origen = limpiarDatos($_POST['origen']);

    //Datos complementarios para el registro
    $edad = 0;
    $id_genero = 1;
    $fechaNac = "00-00-0000";
    $id_area = 1;
    $id_cargo = 1;
    $nombreRepre = $_POST['nombre_de_institucion'];
    $discapacidad = "no";
    $descripcionDis = "no posee";

    $sql = "INSERT INTO datos_del_entregante (ic, nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, areainsti, id_cargo, cargoinsti, nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion, id_origen) VALUES ('$ic','$nombreInstitucion', '$tipoDocumento', '$documento', '$edad', '$id_genero', '$fechaNac', '$id_area', '$AreaInsti', '$id_cargo','$cargoInsti', '$nombreRepre', '$correoInsti', '$telefonoInsti', '$estadoInsti', '$municipio', '$direccionInsti', '$discapacidad', '$descripcionDis', '$origen')";

    $resultado = $mysqli->query($sql);
    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {

                location.assign('listadeapoyo.php');

              });
    });
        </script>";
    }else {
         echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {

                location.assign('listadeapoyo.php');

             });
    });
        </script>";
    }
}



?>