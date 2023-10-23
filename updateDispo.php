<?php
require "function.php";

if ($_POST) {
    $idEditDispo = $_POST['idEditDispo'];
    $tipoDeEquipoEdit = limpiarDatos($_POST['tipo_de_equipo']);
    $SerialEquipoEdit = limpiarDatos($_POST['serial_del_equipo']);
    $serialCargadorEdit = limpiarDatos($_POST['serial_cargador']);
    $fechaRecepEdit = $_POST['fecha_de_recepcion'];
    $estadoDeRecepcionEdit = limpiarDatos($_POST['estado_recepcion']);
    $fechaDeEntregaEdit = limpiarDatos($_POST['fecha_de_entrega']);
    $fallaEdit = limpiarDatos($_POST['falla']);
    $observacionesEdit = limpiarDatos($_POST['observaciones']);
    $origenEdit = limpiarDatos($_POST['origen']);
    $estatusEdit = limpiarDatos($_POST['estatus']);
    $beneficiarioEdit = limpiarDatos($_POST['beneficiario']);
    $idRoledit = limpiarDatos($_POST['id_roles']);
    
    require "config/conexionProvi.php";
    

    /** NUEVA CONSULTA */

    $sql = "UPDATE datos_del_dispotivo` SET `id_tipo_de_dispositivo`='$tipoDeEquipoEdit',`serial_equipo`='$SerialEquipoEdit',`serial_de_cargador`='$serialCargadorEdit',`fecha_de_recepcion`='$fechaRecepEdit',`estado_recepcion_equipo`='$estadoDeRecepcionEdit',`fecha_de_entrega`='$fechaDeEntregaEdit',`id_roles`='$idRoledit',`id_origen`='$origenEdit',`id_estatus`='$estatusEdit',`id_motivo`='$fallaEdit',`id_datos_del_beneficiario`='$beneficiarioEdit' WHERE id_datos_del_dispositivo = $idEditDispo AND id_datos_del_beneficiario = $beneficiarioEdit";

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
                location.assign('dispositivosentrada.php');
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
                location.assign('dispositivosentrada.php');
              });
    });
        </script>";
    }
}

?>