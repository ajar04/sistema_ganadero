<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Tipos de Vegetal

    <a class="btn btn-success btn-social pull-right" href="?module=form_vegetales&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Registrar tipo Vegetales
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
             Nuevo tipo de vegetal ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del tipo vegetal han sido modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del tipo de vegetal
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>

                <th class="center">Codigo</th>
                <th class="center">Tipo vegetal</th>
                <th class="center">Vegetacion</th>
                <th class="center">Descripcion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  

            $query = mysqli_query($mysqli, "SELECT (v.id)as id,(tv.nombre)as nom,(v.nombre)as nombre,(v.observacion)as 
                                            observacion  
                                            FROM vegetacion v 
                                            INNER JOIN t_vegetal tv 
                                            ON v.tipo_vegetacion=tv.id 
                                            WHERE v.tipo_vegetacion=tv.id ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));       

            while ($data = mysqli_fetch_assoc($query)) { 
              $id = format_rupiah($data['id']);
           
              echo "<tr>

                      <td width='80' class='center'>$data[id]</td>
                      <td width='80' class='center'>$data[nom]</td>
                      <td width='180'>$data[nombre]</td>
                      <td width='180'>$data[observacion]</td>
                      <td class='center' width='80'>
                      
                      <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_vegetales&form=edit&id=$data[id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/vegetales/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el vegetal <?php echo $data['nombre']; ?> ?');">
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