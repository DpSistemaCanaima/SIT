<!-- Modal -->
<div class="modal fade" id="asignar<?php echo  $row['id_datos_del_dispositivo']?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="title-head-modal">Asignar Analista</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="btnAsignar.php" method="POST" autocomplete="off">
                  
                    <div class="form-group">
                        <label for="usuarioid">Nombre del Usuario</label>
                        <select name="usuarioid" id="usuarioid" class="form-control form-control-lg">
                        <?php
                           while($rows = $result->fetch_assoc()){
                                echo '<option value="'.$rows['id_usuarios'].'">'.$rows['nombre'].'</option>';
                           }
                        ?>
                        </select>
                        <input type="hidden" name="tipo" value="<?php echo $asignar?>">
                        <input type="hidden" name="rol" value="<?php echo $role?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="idDispositivo" value="<?php echo $row['id_datos_del_dispositivo'] ?>">Asignar</button>
                </form>
            </div>


        </div>
    </div>
</div>