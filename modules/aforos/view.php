<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Aforos

    <a class="btn btn-success btn-social pull-right" href="?module=form_aforos&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar Aforos
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
             Nuevos datos de Aforos han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Aforos modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Aforos
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th width="100" class="center">id_afaro</th>
                <th width="100" class="center">potrero</th>
                <th width="180" class="center">vegetacion</th>
                <th width="180" class="center">empleado</th>
                <th width="180" class="center">alimentos disponible</th>
                <th width="180" class="center">fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT (a.id)as id,(p.nombre)as potrero,(v.nombre)as vegetacion,(e.nombre)as                              empleado,(a.peso)as peso,(a.fecha)as fecha 
                                            FROM afaro a INNER JOIN empleado e ON a.id_empleado=e.id 
                                            INNER JOIN potrero p ON a.id_potrero=p.id 
                                            INNER JOIN vegetacion v ON a.id_vegetacion=v.id 
                                            WHERE a.id_empleado=e.id AND a.id_potrero=p.id AND a.id_vegetacion=v.id 
                                            ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));



            while ($data = mysqli_fetch_assoc($query)) { 
              $id = format_rupiah($data['id']);
           
              echo "<tr>
                      <td width='30' class='center'>$data[id]</td>
                      <td width='30' class='center'>$data[potrero]</td>
                      <td width='180'class='center'>$data[vegetacion]</td>
                      <td width='180'class='center'>$data[empleado]</td>
                      <td width='180'class='center'>$data[peso]</td>
                      <td width='180'class='center'>$data[fecha]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_aforos&form=edit&id=$data[id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/aforos/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el afaro <?php echo $data['id']; ?> ?');">
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