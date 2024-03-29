<?php
require "config/app.php";
require "config/conexion.php";
session_start();
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 2) {
        header("Location: index.php");
    }
}


$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];
$id_usuario = $_SESSION['id_usuarios'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Inventario OAC</title>
    <!-- FAVICON -->
    <link rel="icon" href="img/Canaima.png">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "inc/navbarlateral.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "inc/navbar2.php"; 
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?></h1>
                                </div>

                <!-- Page Heading -->
                
                <div class="jumbotron">
                                    <h1 class="display-5">Consulte Informacion!</h1>
                                        <p class="lead">Bienvenido al Sistema de Inventario y Trazabilidad de Industria Canaima (SIT).</p>
                                    <hr class="my-4">
                                        <p>Elija la tabla a Consultar.</p>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-arrow-down fa-sm text-white-50"></i> Recibidos</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-arrow-right fa-sm text-white-50"></i> En linea</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check fa-sm text-white-50"></i> Reparados</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check-circle fa-sm text-white-50"></i> Por verificar</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check fa-sm text-white-50"></i> Verificados</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check-circle fa-sm text-white-50"></i> Por entregar</a>
                                            <a class="btn btn-primary btn-ms" href="#" role="button"><i class="fas fa-check fa-sm text-white-50"></i> Entregados</a>
                                    </div>
                                </div>
                </div>

                <!-- /.container-fluid -->
   

                <!-- End of Topbar -->

    <?php require "inc/footer.php";?>
    <?php require "inc/script.php";?>
</body>

</html>