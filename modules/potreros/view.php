<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Listado de Potreros

    <a class="btn btn-success btn-social pull-right" href="?module=form_potreros&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar Potrero
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
             Nuevos Potreros de finca han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Potrero han sido modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Potrero
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th width='40' class="center">Codigo</th>
                <th width='60' class="center">Area</th>
                <th width='80' class="center">Dias Entrada</th>
                <th width='80' class="center">Dias Salida</th>
                <th width='80' class="center">Estado</th>
                <th width='60' class="center">Cap. ganado</th>
                <th width='80' class="center">Coordenadas</th>
                <th width='80' class="center">Observacion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT * FROM potrero ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $id = format_rupiah($data['id']);
           
              echo "<tr>

                      <td width='40' class='center'>$data[id]</td>
                      <td width='60' class='center'>$data[area]</td>
                      <td width='80' class='center'>$data[dias_ent_anim]</td>
                      <td width='80' class='center'>$data[dias_sal_anim]</td>
                      <td width='80' class='center'>$data[est_cerca]</td>
                      <td width='60' class='center'>$data[cap_ganado]</td>
                      <td width='80' class='center'><a href='https://maps.google.com/?q=$data[coordenadas]' target='_blanck'>$data[coordenadas]</td>
                      <td width='80' class='center'>$data[observacion]</td>
                      <td class='center' width='50'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_potreros&form=edit&id=$data[id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/potreros/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el Potrero <?php echo $data['nombre']; ?> ?');">
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