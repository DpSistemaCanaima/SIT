<?php

require("config/conexionProvi.php");

$serialEquipo = limpiarDatos($_POST['serial_del_equipo']);
if (!preg_match("/[A-Z0-9]{18}/", $serialEquipo)) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El serial no coincide con el formato correspondiente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                location.assign('dispositivosentrada.php');
            });
    });
        </script>";
}
$sqlValidation = " SELECT serial_equipo FROM datos_del_dispotivo WHERE serial_equipo = '$serialEquipo'";
$resultValidation = $mysqli->query($sqlValidation); 
if (mysqli_num_rows($resultValidation)>0) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El equipo ya esta registrado',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                location.assign('dispositivosentrada.php');
              });
    });
        </script>";
    }else {
        $tipoDeEquipo = limpiarDatos($_POST['tipo_de_equipo']);
        if ($tipoDeEquipo == "") {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Debe seleccionar un equipo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }   
        $serialEquipo = limpiarDatos($_POST['serial_del_equipo']);
        if (!preg_match("/[A-Z0-9]{18}/", $serialEquipo)) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El serial no coincide con el formato correspondiente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $serialCargador = limpiarDatos($_POST['serial_cargador']);
        if (!preg_match("/[A-Z0-9]{18}/", $serialCargador)) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El serial del cargador no coincide con el formato correspondiente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $fechaRecepcion = $_POST['fecha_de_recepcion'];
        if ($fechaRecepcion == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ingrese una fecha de recepcion del equipo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $estadoRecepcion = limpiarDatos($_POST['estado_recepcion']);
        if ($estadoRecepcion == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Seleccione un estado del equipo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $observaciones_analista = limpiarDatos($_POST['observaciones']);
        if ($observaciones_analista == "") {
        $observaciones_analista = "No posee observaciones";
        }

        $rol = limpiarDatos($_POST['id_roles']);
        if ($rol == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Modificacion de campo no modificable',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $origen = limpiarDatos($_POST['origen']);
        if ($origen == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Modificacion de campo no modificable',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $estatus = limpiarDatos($_POST['estatus']);
        if ($estatus == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Modificacion de campo no modificable',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $falla = limpiarDatos($_POST['falla']);
        if ($falla == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Seleccione la falla pertinente',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $beneficiario = limpiarDatos($_POST['beneficiario']);
        if ($beneficiario == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Seleccione el beneficiario del equipo',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $responsable = limpiarDatos($_POST['responsable']);
        if ($responsable == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El equipo ya esta registrado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        $motivoIngreso = limpiarDatos($_POST['motivo_ingreso']);
        if ($motivoIngreso == "") {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Seleccione un motivo de ingreso',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.assign('dispositivosentrada.php');
                    });
            });
                </script>";
        }
        //Generacion de IC para el registro del dispositivo
        $datos = "SELECT MAX(id_dispositivo) AS id_dispositivo FROM datos_del_dispotivo";
        $resultado=mysqli_query($mysqli,$datos);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $valor1 = $row['id_dispositivo'];
                $contadordb = 0;
                for ($i=0; $i <= $valor1 ; $i++) { 
                    if ($valor1 == 0) {
                        $contadordb = 1;
                    }else {
                        $contadordb++;
                    }
                }
                $ic =  date("Y", strtotime($fechaRecepcion)) . "-". $contadordb ;
        }

        $sqlResponsable = "SELECT usuario FROM usuarios WHERE id_usuarios = $responsable AND id_roles = 3";
        $respuestaResponsable = $mysqli->query($sqlResponsable);
        while ($row2 = $respuestaResponsable->fetch_assoc()) {
            $nombreUsuario = $row2["usuario"];
        }
        $coordinador = limpiarDatos($_POST['coordinador']);
        $fechaEntrega = date('00-00-0000');
        $comprobacion = "Faltan comprobaciones";
        $observaciones_tecnico = "Falta por observaciones";
        $observaciones_verificador = "Falta por observaciones";
        $responsableAnalistaRecibido = $nombreUsuario;
        $responsableTecnico = "aun no";
        $responsableVerficador = "aun no";
        $responsableAnalistaEntrega = "aun no";


        $sql = "INSERT INTO datos_del_dispotivo (id_dispositivo, ic_dispositivo, id_tipo_de_dispositivo, serial_equipo, serial_de_cargador, fecha_de_recepcion, estado_recepcion_equipo, fecha_de_entrega, responsable, responsable_analista_recibido, responsable_tecnico, responsable_verificador, responsable_analista_entrega, observaciones_analista, observaciones_tecnico, observaciones_verificador, comprobaciones, motivo_de_ingreso, coordinador, id_roles, id_origen, id_estatus, id_motivo, id_datos_del_beneficiario) VALUES (NULL, '$ic','$tipoDeEquipo','$serialEquipo','$serialCargador','$fechaRecepcion','$estadoRecepcion', '$fechaEntrega', '$responsable','$responsableAnalistaRecibido','$responsableTecnico','$responsableVerficador','$responsableAnalistaEntrega','$observaciones_analista', '$observaciones_tecnico', '$observaciones_verificador', '$comprobacion', '$motivoIngreso','$coordinador','$rol','$origen','$estatus', '$falla','$beneficiario');";
        $resultado = mysqli_query($mysqli, $sql);

        if ($resultado) {
                    $comprobacionIc = "SELECT MAX(ic_dispositivo) AS ic_dispositivo FROM datos_del_dispotivo";
                    $resultadoCompobacion = $mysqli->query($comprobacionIc);

                    if ($resultadoCompobacion) {
                        while ($row2 = $resultadoCompobacion->fetch_assoc()) {
                            $icMuestra = $row2['ic_dispositivo'];
                        }
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'El IC del equipo es ".$icMuestra."',
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

                //     echo "
                //     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                //     <script language='JavaScript'>
                //     document.addEventListener('DOMContentLoaded', function() {
                //         Swal.fire({
                //             icon: 'success',
                //             title: 'Se registro correctamente el dispositivo',
                //             showCancelButton: false,
                //             confirmButtonColor: '#3085d6',
                //             confirmButtonText: 'OK',
                //             timer: 1500
                //         }).then(() => {

                //             location.assign('dispositivosentrada.php');

                //         });
                // });
                //     </script>";
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
													
function limpiarDatos($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = str_ireplace("<script>", "", $data);
    $data = str_ireplace("</script>", "", $data);
    $data = str_ireplace("<script src", "", $data);
    $data = str_ireplace("<script type=", "", $data);
    $data = str_ireplace("SELECT * FROM", "", $data);
    $data = str_ireplace("DELETE FROM", "", $data);
    $data = str_ireplace("INSERT INTO", "", $data);
    $data = str_ireplace("DROP TABLE", "", $data);
    $data = str_ireplace("DROP DATABASE", "", $data);
    $data = str_ireplace("TRUNCATE TABLE", "", $data);
    $data = str_ireplace("SHOW TABLES;", "", $data);
    $data = str_ireplace("<?php", "", $data);
    $data = str_ireplace("?>", "", $data);
$data = str_ireplace("--", "", $data);
$data = str_ireplace("^", "", $data);
$data = str_ireplace("<", "" , $data); $data=str_ireplace(">", "", $data);
    $data = str_ireplace("[", "", $data);
    $data = str_ireplace("]", "", $data);
    $data = str_ireplace("==", "", $data);
    $data = str_ireplace(";", "", $data);
    $data = str_ireplace("::", "", $data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
    }

    ?>