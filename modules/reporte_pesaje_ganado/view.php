<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i>Informe de datos de registro de medicamentos
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active">informe</li>
    <li class="active"> registro de medicamentos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      
      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th width='20' class="center">Codigo</th>
                <th width='80'class="center">Nombre</th>
                <th width='80'class="center">Empleado</th>
                <th width='80'class="center">Fecha</th>
                <th width='80'class="center">Peso</th>
                <th width='80'class="center">Ganancia</th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $query = mysqli_query($mysqli, "SELECT (p.id)as id,(a.nombre)as animal,(e.nombre)as empleado,(p.fecha)as fecha,
                                            (p.peso)as peso,(p.ganancia)as ganancia
                                            FROM peso_animal p INNER JOIN animal a ON p.id_animal=a.id 
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
                      <td width='80' class='center'>$data[peso]</td>
                      <td width='80' class='center'>$data[ganancia]</td>
                      </tr>";
            }
            ?>
            </tbody>
          </table>
        </div>

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="post" action="modules/reporte_pesaje_ganado/reporte.php" target="_blank">
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Fecha</label>
              <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha1" autocomplete="off" required>
              </div>

              <label class="col-sm-1">Hasta</label>
              <div class="col-sm-2">
                <input style="margin-left:-35px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha2" autocomplete="off" required>
              </div>
            </div>
          </div>

        
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11"> 
                <input type="submit" class="btn btn-primary btn-social btn-submit" style="width: 180px;" name="generar_reporte" value="generar excel">
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->