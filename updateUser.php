<?php
    require "function.php";

    // 
   
if ($_POST) {
    $idUpdate = $_POST['idEdit'];
    $usuarioupdate = limpiarDatos(htmlspecialchars($_POST['usuario']));
    $nombreupdate = limpiarDatos(htmlspecialchars($_POST['nombre']));
    $passwordupdate = limpiarDatos(htmlspecialchars($_POST['password']));
    $cedulaupdate = limpiarDatos(htmlspecialchars($_POST['cedula']));
    $correoupdate = limpiarDatos(htmlspecialchars($_POST['correo']));
    $rolesupdate = limpiarDatos(htmlspecialchars($_POST['perfil']));
    $pass_cupdate = sha1($passwordupdate);
    
    require "config/conexionProvi.php";
    //$sql = "UPDATE usuarios SET usuario = ' $usuarioupdate ', nombre = ' $nombreupdate ', cedula = ' $cedulaupdate ', password = ' $pass_cupdate ',correo =', id_roles = ' $rolesupdate ' WHERE id_usuarios = $idUpdate";

    $sql = "UPDATE usuarios SET usuario = '$usuarioupdate', nombre = '$nombreupdate', cedula = '$cedulaupdate', password = '$pass_cupdate', correo = '$correoupdate', id_roles = '$rolesupdate' WHERE id_usuarios = $idUpdate";

    $result = mysqli_query($mysqli, $sql);

    if ($result) {
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
                location.assign('admin.php');
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
                location.assign('index.php');
              });
    });
        </script>";
    }
}



?>
