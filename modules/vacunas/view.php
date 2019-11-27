<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i>Vacunas
    <a class="btn btn-success btn-social pull-right" href="?module=form_vacunas&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar 
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
             Nueva vacuna ha sido  almacenada correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos de la vacuna modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos de la vacuna
            </div>";
    }
    ?>
    
      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width='20' class="center">Codigo</th>
                <th width='80'class="center">Edad/categoria</th>
                <th width='80'class="center">Nombre</th>
                <th width='80'class="center">Observaciones</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT id,edad_categoria,nombre,observaciones
                                            FROM vacunas  
                                            ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='20' class='center'>$data[id]</td>
                      <td width='80' class='center'>$data[edad_categoria]</td>
                      <td width='80' class='center'>$data[nombre]</td>
                      <td width='80' class='center'>$data[observaciones]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_vacunas&form=edit&id=$data[id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/vacunas/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar la vacuna <?php echo $data['nombre']; ?> ?');">
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