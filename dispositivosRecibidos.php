<?php
require "config/app.php";
require "config/conexionProvi.php";
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['id_roles'] != 2) {
        header("Location: index.php");
    }
}

$usuario = $_SESSION['usuario'];

$consulta = "SELECT d.serial_equipo, d.serial_de_cargador, d.pertenencia_del_equipo, d.institucion_educativa, d.fecha_de_recepcion, d.estado_recepcion_equipo, d.equipo_reincidio, d.motivo_de_reincidencia, t.nombre, t.modelo, g.grado FROM datos_del_dispotivo AS d 
INNER JOIN tipo_de_equipo AS t ON t.id_tipo_de_equipo=d.id_tipo_de_dispositivo 
INNER JOIN grado AS g ON d.id_year_o_grado=g.id_grado 
INNER JOIN datos_del_entregante AS e ON d.id_datos_del_entregante=e.id__datos_del_entregante";

$resultado = $mysqli->query($consulta);
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
    <link href="/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                <?php include "inc/navbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Dispositivos Recibidos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Tipo</th>
                                            <th>Modelo</th>
                                            <th>Serial del Equipo</th>
                                            <th>Serial del Cargador</th>
                                            <th>Pertenencia</th>
                                            <th>Institución Educativa</th>
                                            <th>Año o Grado</th>
                                            <th>Institución donde estudia</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Estado</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Reincidio</th>
                                            <th>Motivo de Reincidencia</th>
                                            <th>Observaciones</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $resultado->fetch_assoc()) {

                                        ?>
                                            <tr>
                                                <td><?php echo $row['nombre']; ?></td>
                                                <td><?php echo $row['modelo']; ?></td>
                                                <td><?php echo $row['serial_equipo']; ?></td>
                                                <td><?php echo $row['serial_de_cargador']; ?></td>
                                                <td><?php echo $row['pertenecia_del_equipo']; ?></td>
                                                <td><?php echo $row['institucion_educativa']; ?></td>
                                                <td><?php echo $row['grado']; ?></td>
                                                <td><?php echo $row['institucion_donde_estudia']; ?></td>
                                                <td><?php echo $row['fecha_recepcion_equipo']; ?></td>
                                                <td><?php echo $row['estado_recepcion_equipo']; ?></td>
                                                <td><?php echo $row['equipo_reincidio']; ?></td>
                                                <td><?php echo $row['motivo_de_reincidencia']; ?></td>
                                                <td><?php echo $row['observaciones']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Options
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item btn btn-warning" data-toggle="modal" data-target="#ModalEditar" href="#"><img src="img/svg/editar.svg " alt="Industrias Canaima" width="15" height="15"> Editar</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "inc/script.php"; ?>
</body>

</html>