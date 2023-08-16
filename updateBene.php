<?php
require "function.php";

if ($_POST) {
    $idEditBene = $_POST['ideditbene'];
    $icedit = limpiarDatos($_POST['icedit']);
    $nombreBeneEdit = limpiarDatos($_POST['nombre_del_beneficiario_edit']);
    $cedulaBeneEdit = limpiarDatos($_POST['cedulaBeneEdit']);
    $edadBeneEdit = limpiarDatos($_POST['edadBeneEdit']);
    $generoEdit = limpiarDatos($_POST['genero']);
    $fechadenacimientoEdit = validar_fecha("fecNacBeneEdit");
    $areaEdit = limpiarDatos($_POST['area']);
    $cargoEdit = limpiarDatos($_POST['cargo']);
    $nombreRepreBeneEdit = limpiarDatos($_POST['nombre_del_representanteEdit']);
    $correoEdit = limpiarDatos($_POST['correoBeneEdit']);
    $telefonoEdit = limpiarDatos($_POST['phoneEdit']);
    $estado = limpiarDatos($_POST['estado']);
    $municipioEdit = limpiarDatos($_POST['municipio']);
    $direccionEdit = limpiarDatos($_POST['direccion']);
    $poseeDiscaEdit = limpiarDatos($_POST['discapacidad_o_condicion']);
    $descripcionDisEdit = limpiarDatos($_POST['descripcion_discapacidad']);
    $tipoDeEquipoEdit = limpiarDatos($_POST['tipo_de_equipo']);
    $origenEdit = limpiarDatos($_POST['origen']);
    require "config/conexionProvi.php";
    $sql = "UPDATE datos_del_entregante SET ic = '$icedit', nombre_del_beneficiario = '$nombreBeneEdit', cedula = '$cedulaBeneEdit', edad = '$edadBeneEdit', Id_genero = '$generoEdit', fecha_de_nacimiento = '$fechadenacimientoEdit', id_area = '$areaEdit', id_cargo = '$cargoEdit', nombre_del_representante = '$nombreRepreBeneEdit', correo = '$correoEdit', telefono = '$telefonoEdit', estado = '$estado', municipio = '$municipioEdit', direccion = '$direccionEdit', posee_discapacidad_o_condicion = '$poseeDiscaEdit',descripcion_discapacidad_condicion = '$descripcionDisEdit', id_tipo_de_equipo = '$tipoDeEquipoEdit', id_origen = '$origenEdit' WHERE id_datos_del_entregante = $idEditBene";

    $resultado = mysqli_query($mysqli, $sql);

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
                location.assign('listadebeneficiario.php');
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
                location.assign('listadebeneficiario.php');
              });
    });
        </script>";
    }
}





?>