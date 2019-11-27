<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Ganado
    <a class="btn btn-success btn-social pull-right" href="?module=form_animales&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-edit fa-fw"></i> Registrar Ganado
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
              Nuevos datos de animal han sido  almacenado correctamente.
              </div>";
            }
            elseif ($_GET['alert'] == 2) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos del animal modificados correcamente.
              </div>";
            }
            elseif ($_GET['alert'] == 3) {
              echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Se eliminaron los datos del Animal
              </div>";
            }?>

      <div class="box box-primary">
        <div class="box-body">
          <table style= "width:100%" id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th style= "width:auto" class="center">Codigo</th>
                <th style= "width:auto"class="center">Nombre</th>
                <th style= "width:auto"class="center">Sexo</th>
                <th style= "width:auto" class="center">fecha nac</th>
                <th style= "width:auto" class="center">Edad meses</th>
                <th style= "width:auto" class="center">tipo propo</th>
                <th style= "width:auto" class="center">Raza</th>
                <th style= "width:auto" class="center">Lote</th>
                <th style= "width:auto" class="center">Color</th>
                <th style= "width:auto" class="center">Procedencia</th>
                <th style= "width:auto" class="center">Modificar</th>
                
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT (a.id)as id,(a.nombre)as nombre,(a.sexo)as sexo,(a.estado)as estado,
                                            (a.propietario)as propietario,(a.registro)as registro,(a.fecha_nac)as fecha_nac, TIMESTAMPDIFF(month, fecha_nac ,CURRENT_TIMESTAMP) as edad,
                                            (a.fecha_dest)as fecha_dest,(a.peso_nac)as peso_nac,(a.peso_dest)as peso_dest,
                                            (r.raza)as raza,(c.color)as color,(a.marca_oreja)as marca_oreja,
                                            (a.marca_hierro)as marca_hierro,(a.tipo_propo)as tipo_propo,
                                            (a.procedencia)as procedencia,(l.nombre_lote)as nl
                                            FROM animal a INNER JOIN raza r ON a.raza=r.id 
                                            INNER JOIN color c ON a.color=c.id
                                            left JOIN lote l ON a.id=l.id_animal_lote 
                                            WHERE a.raza=r.id AND a.color=c.id 
                                            ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              
           
              echo "<tr>
                      <td width='20' class='center'>$data[id]</td>
                      <td width='80' class='center'>$data[nombre]</td>
                      <td width='80' class='center'>$data[sexo]</td>
                      <td width='80' class='center'>$data[fecha_nac]</td>
                      <td width='80' class='center'>$data[edad]</td>
                      <td width='80' class='center'>$data[tipo_propo]</td>
                      <td width='80' class='center'>$data[raza]</td>
                      <td width='80' class='center'>$data[nl]</td>
                      <td width='80' class='center'>$data[color]</td>
                      <td width='80' class='center'>$data[procedencia]</td>
                      <td width='80' class='center'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_animales&form=edit&id=$data[id]'>
                          <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/animales/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar el animal <?php echo $data['nombre']; ?> ?');">
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
      </div>
      <!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
   
</section><!-- /.content
