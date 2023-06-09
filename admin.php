<?php
require "config/app.php";
require "config/conexionProvi.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 1) {
        header("Location: 404.php");
    }
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['id_roles'];


$consulta = "SELECT u.id_usuarios, u.usuario, u.nombre, u.cedula, u.password, u.correo, u.registro, r.roles FROM usuarios AS u INNER JOIN roles AS r ON r.id_roles=u.id_roles";
$resultado = $mysqli->query($consulta);

$consulta1 = "SELECT id_roles, roles FROM roles";
$resultado1 = $mysqli->query($consulta1);


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
    <link rel="stylesheet" href="css/error.css">
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

                <?php include "inc/navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo company; ?></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            data-toggle="modal" data-target="#exampleModal"> Registrar Usuario</a>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Productividad de OAC</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Estadisticas</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a> -->
                        </div>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de Dispositivos</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Cedula</th>
                                                <th>Password</th>
                                                <th>Correo</th>
                                                <th>Perfil</th>
                                                <th>Fecha De Registro</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $resultado->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['usuario']; ?></td>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['cedula']; ?></td>
                                                <td><?php $passdb = $row['password'];
                                                           $passview = sha1($passdb);
                                                           echo $passview;      ?></td>
                                                <td><?php echo $row['correo']; ?></td>
                                                <td><?php echo $row['roles']; ?></td>
                                                <td><?php echo $row['registro']; ?></td>
                                                <?php 
                                                    echo ' <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            Options
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item btn btn-warning" data-toggle="modal"
                                                                data-target="#ModalEditar'.$row['id_usuarios'].'" href="#"><img
                                                                    src="img/svg/editar.svg " alt="Industrias Canaima"
                                                                    width="15" height="15"> Editar</a>
                                                            <a class="dropdown-item btn btn-danger" href="eliminarusuario.php?id='.$row['id_usuarios'].'"><img
                                                                    src="img/svg/eliminar.svg " alt="Industrias Canaima"
                                                                    width="15" height="15"> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </td>';
                                               ?>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal de registro -->

                        <?php
                            include "modalderegistro.php";
                            include "modaleditusuario.php";
                        ?>


                        <!-- Content Row -->
                        <div class="row">


                            <!-- Content Row -->
                            <div class="row">

                                <!-- Content Column -->
                                <div class="col-lg-6 mb-4">

                                </div>

                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; Industrias Canaima 2022</span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-success" href="logout.php">Salir</a>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include "inc/script.php"; ?>
</body>

</html>