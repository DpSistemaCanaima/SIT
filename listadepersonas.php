<?php 
require "config/conexion.php";

include "content/inc/header.php";

include "content/inc/navbar.php";


$sqlPersonas = "SELECT cedula, nombre_completo, correo_inst FROM persona";
$resultadoPersonas = $conexion->query($sqlPersonas);

?>
        
        <div id="layoutSidenav">
            <?php include "content/inc/sidebar.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Sistema de Inventario y Trazabilidad | Produccion</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administrador</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Lista de Personas.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Institucional</th>
                                            <th>Telefono</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo Institucional</th>
                                            <th>Telefono</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            while ($rowPersonas = $resultadoPersonas->fetch_assoc()) :
                                                
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $rowPersonas['cedula'];?></td>
                                            <td><?php echo $rowPersonas['nombre_completo'];?></td>
                                            <td><?php echo $rowPersonas['correo_inst'];?></td>
                                            <th>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Opciones
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AgregarUsuario<?php echo $rowPersonas['cedula'];?>"><i class="bi bi-person-add"></i> Agregar usuario</a></li>
                                                    </ul>
                                                </div>
                                            </th>
                                        </tr>
                                        <?php
                                                include "content/modal/admin/agregarUsuario.php";
                                            endwhile;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                    include "content/inc/footer.php";
                ?>
            </div>
        </div>
        <?php
            include "content/inc/script.php";
        ?>
    </body>
</html>
