<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Listado de Lotes

    <a class="btn btn-success btn-social pull-right" href="?module=form_lotes&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar Lote
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos lotes de finca han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Lote han sido modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Lote
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Codigo</th>
                <th class="center">Nombre Lote</th>
                <th class="center">Nombre animal</th>
                <th class="center">Fecha Creacion</th>
                
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT lote.id as id_lote,nombre_lote, animal.nombre as na, fecha_creacion FROM lote, animal where lote.id_animal_lote = animal.id ORDER BY id_lote DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $id = format_rupiah($data['id_lote']);
           
              echo "<tr>
                      <td width='80' class='center'>$data[id_lote]</td>
                      <td width='180'>$data[nombre_lote]</td>
                      <td width='180'>$data[na]</td>
                      <td width='180'>$data[fecha_creacion]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_lotes&form=edit&id=$data[id_lote]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/lotes/proses.php?act=delete&id=<?php echo $data['id_lote'];?>" onclick="return confirm('estas seguro de eliminar el lote <?php echo $data['nombre_lote']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
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