<?php
require "../../config/conexion.php";
require "../../function.php";

// $valido['success']=array('success', false, 'mensaje'=>"");


if ($_POST) {
    $tipoDocumento = limpiarDatos($_POST['tipo_documento']);
    if ($tipoDocumento != 2) {
        // $valido['success']=false;
        // $valido['mensaje']="Tipo de documento no valido.";
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Tipo de documento no valido.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
    }
    $documento = limpiarDatos($_POST['documento']);
    if (!preg_match("/\b/",$documento)) {
        // $valido['success']=false;
        // $valido['mensaje']="Debe ingresar solo numeros.";
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Debe ingresar solo numeros.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                location.assign('../../listadebeneficiario.php');
              });
    });
        </script>";
        if (!preg_match("/[0-9]{9}/", $documento)) {
            // $valido['success']=false;
            // $valido['mensaje']="Los datos ingresados no cumplen con los caracteres especificados.";
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Los datos ingresados no cumplen con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
        }
    }
    $nombreInstitucion = limpiarDatos($_POST['nombre_de_institucion']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombreInstitucion)) {
        // $valido['success']=false;
        // $valido['mensaje']="El nombre de la institucion no cumple con los caracteres especificados.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El nombre de la institucion no cumple con los caracteres especificados.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }
    $correoInsti = limpiarDatos($_POST['correoApoyo']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correoInsti)) {
        // $valido['success']=false;
        // $valido['mensaje']="El correo no cumple con los caracteres necesarios.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El correo no cumple con los caracteres necesarios.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }
    $telefonoInsti = limpiarDatos($_POST['phone']);
    if (!preg_match("/\b/", $telefonoInsti)) {
        $valido['success']=false;
        $valido['mensaje']="El telefono no cumple con el formato establecido.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El telefono no cumple con el formato establecido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
        if (!preg_match("/[0-9]{11}/", $telefonoInsti)) {
            // $valido['success']=false;
            // $valido['mensaje']="El telefono no cumple con el formato establecido.";
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El telefono no cumple con el formato establecido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
        }
    }
    $estadoInsti = limpiarDatos($_POST['estado']);
    if ($estadoInsti == "") {
        // $valido['success']=false;
        // $valido['mensaje']="Debe seleccionar un estado.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe seleccionar un estado.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }
    $municipio = limpiarDatos($_POST['municipio']);
    if (!preg_match("/[a-zA-Z\s]{10,60}/", $municipio)) {
        // $valido['success']=false;
        // $valido['mensaje']="El municipio no cumple con los caracteres establecidos.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El municipio no cumple con los caracteres establecidos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }
    $direccionInsti = limpiarDatos($_POST['direccion']);
    if ($direccionInsti == "") {
        // $valido['success']=false;
        // $valido['mensaje']="La direccion ingresada no cumple con los caracteres establecidos.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'La direccion ingresada no cumple con los caracteres establecidos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }
    $origen = limpiarDatos($_POST['origen']);
    if ($origen == "") {
        // $valido['success']=false;
        // $valido['mensaje']="No se envia el origen del beneficiario.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'No se envia el origen del beneficiario..',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
    }

    //Datos complementarios para el registro
    $edad = 0;
    $id_genero = 1;
    $fechaNac = date('00-00-0000');
    $id_area = 1;
    $id_cargo = 1;
    $nombreRepre = limpiarDatos($_POST['nombre_de_institucion']);
    $discapacidad = "no";
    $descripcionDis = "no posee";
    $consejoComunal = "no posee";
    $mesaTelecomunicaciones = "No posee";
    $institucionEntrega = "No posee";
    $institucionEstudia = "no posee";
    $responsableEntrega = "No posee";
    $descontinuado = 2;
    // Validacion de rif por si se repite la institucion a registrar

    $sqlValidation = "SELECT cedula FROM datos_del_entregante WHERE cedula = '$documento'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $n = $resultadoValidation->num_rows;
    
    if ($n == 0) {
        $sql = "INSERT INTO datos_del_entregante (nombre_del_beneficiario, tipo_documento, cedula, edad, Id_genero, fecha_de_nacimiento, id_area, id_cargo,  nombre_del_representante, correo, telefono, estado, municipio, direccion, posee_discapacidad_o_condicion, descripcion_discapacidad_condicion,consejo_comunal, mesa_telecom, intitucion_entrega, institucion_estudia, responsable, id_origen, descontinuado) VALUES ('$nombreInstitucion', '$tipoDocumento', '$documento', '$edad', '$id_genero', '$fechaNac', '$id_area', '$id_cargo','$nombreRepre', '$correoInsti', '$telefonoInsti', '$estadoInsti', '$municipio', '$direccionInsti', '$discapacidad', '$descripcionDis', '$consejoComunal', '$mesaTelecomunicaciones','$institucionEntrega','$institucionEstudia','$responsableEntrega','$origen', '$descontinuado')";
        if ($mysqli->query($sql)===true) {
            // $valido['success']=true;
            // $valido['mensaje']="Registro exitoso";  
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Registro exitoso.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>";
        }else {
            // $valido['success']=false;
            // $valido['mensaje']="Fallo al registar la institucion."; 
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Fallo al registar la institucion.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>"; 
        }
    }else {
        // $valido['success']=false;
        // $valido['mensaje']="La institucion ya se encuentra registrada.";
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'La institucion ya se encuentra registrada.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>"; 
    }
   
}else {
    // $valido['success']=false;
    // $valido['mensaje']="No se enviaron los datos.";
    echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'No se enviaron los datos.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    location.assign('../../listadebeneficiario.php');
                  });
        });
            </script>"; 
}

// echo json_encode($valido);



?>