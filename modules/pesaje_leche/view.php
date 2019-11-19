<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos Peso Leche
    <a class="btn btn-success btn-social pull-right" href="?module=form_pesaje_leche&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Pesar Leche
    </a>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php  
      if (empty($_GET['alert'])) {echo "";} 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check-circle'></i> Exito!</h4>
              Nuevos Pesos Leche de animal han sido  almacenado correctamente.
              </div>";
            }
            elseif ($_GET['alert'] == 2) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Pesos Leche del animal modificados correcamente.
              </div>";
            }
            elseif ($_GET['alert'] == 3) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Se eliminaron los Pesos Leche del Animal
              </div>";
            }?>

      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width='20' class="center">Codigo</th>
                <th width='80'class="center">Nombre</th>
                <th width='80'class="center">Empleado</th>
                <th width='80'class="center">Fecha</th>
                <th width='80'class="center">Peso mañana</th>
                <th width='80'class="center">Peso tarde</th>
                <th width='80'class="center">Peso</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT (p.id)as id,(a.nombre)as animal,(e.nombre)as empleado,
                                            (p.fecha)as fecha,(p.peso_am)as peso_am,(p.peso_pm)as peso_pm,
                                            (p.peso_perdido)as peso
                                            FROM peso_leche p INNER JOIN animal a ON p.id_animal=a.id 
                                            INNER JOIN empleado e ON p.id_empleado=e.id 
                                            WHERE p.id_animal=a.id AND p.id_empleado=e.id
                                            ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='20' class='center'>$data[id]</td>
                      <td width='80' class='center'>$data[animal]</td>
                      <td width='80' class='center'>$data[empleado]</td>
                      <td width='80' class='center'>$data[fecha]</td>
                      <td width='80' class='center'>$data[peso_am]</td>
                      <td width='80' class='center'>$data[peso_pm]</td>
                      <td width='80' class='center'>$data[peso]</td>
                      <td width='80' class='center'>
                        <div>
                        
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_pesaje_leche&form=edit&id=$data[id]'>
                          <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/pesaje_leche/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el peso animal <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

            <?php
            echo " </div>
            </td>
            </tr>";
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content