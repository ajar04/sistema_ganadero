 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Peso Leche
    </h1>
    <ol class="breadcrumb" style="margin-top: 50px;">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
              <form role="form" class="form-horizontal" action="modules/pesaje_leche/proses.php?act=insert" method="POST">
                <div class="box-body">

                <div class="form-group">
                      <label class="col-sm-2 control-label" >Fecha y Hora del Sistema </label>
                      <div class="col-sm-4" style="font-size:30px;">
                         <?php $fecha=date("y-m-d"); echo $fecha.''.'<p id="demo"></p>';?> 
                    
                    
                          <script>
                          var myVar = setInterval(myTimer, 1000);

                          function myTimer() {
                            var d = new Date();
                            document.getElementById("demo").innerHTML = d.toLocaleTimeString();
                          }
                          </script>
                    </div>
                  </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Animal</label>
                    <div class="col-sm-4">
                      <?php

                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from animal where animal.sexo='Hembra'";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['id']." - ".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="id_animal" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Empleado</label>
                    <div class="col-sm-4">
                      <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from empleado";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="id_empleado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                 <div class="form-group row">
                    <label class="col-sm-2 control-label">Fecha Ordeño</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha" autocomplete="off" >
                    </div>
                  </div>

                 <div class="form-group row">
                    <label class="col-sm-2 control-label">Leche Producida</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">CC.</span>
                        <input type="number" placeholder="0,00" required id="cant_leche" name="cant_leche" min="0" value="" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" required>
                        
                      </div>
                    </div>
                  </div>


                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                        <a href="?module=pesaje_leche" class="btn btn-danger btn-reset">Cancelar</a>
                      </div>
                    </div>
                  </div><!-- /.box footer -->
                </div>
              </form>
            </div><!-- /.box -->
          </div><!--/.col -->
        </div>   <!-- /.row -->
      </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
    $query = mysqli_query($mysqli, "SELECT id,id_animal,id_empleado,fecha,cant_leche,total_leche, prom_leche FROM produccion_leche WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
                                      $data  = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
  <h1><i class="fa fa-edit icon-title"></i> Modificar Peso</h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=pesaje_leche"> Pesaje Leche </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pesaje_leche/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Animal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_animal" value="<?php echo $data['id_animal']; ?>" readonly required>
                </div>
              </div>

              

              <div class="form-group">
                <label class="col-sm-2 control-label">Empleado</label>
                <div class="col-sm-4">
                  <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from empleado";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                  <select class="chosen-select" name="id_empleado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['id_empleado']; ?>"><?php echo $data['id_empleado']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>


              <div class="form-group row">
                    <label class="col-sm-2 control-label">Fecha Ordeño</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd " name="fecha" autocomplete="off" >
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Actualizar produccion</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">CC.</span>
                        <input type="number" placeholder="0.00" required id="cant_leche" name="cant_leche" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'" required>
                        
                      </div>
                    </div>
                  </div>

              

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=pesaje_leche" class="btn btn-danger btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>