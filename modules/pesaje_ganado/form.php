 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Peso Animales
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
              <form role="form" class="form-horizontal" action="modules/pesaje_ganado/proses.php?act=insert" method="POST">
                <div class="box-body">

                 <div class="form-group">
                    <label class="col-sm-1 control-label">Animal</label>
                    <div class="col-sm-4">
                      <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from animal";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .="<option value=".">"."</option>;  <option value='".$row['id']."'>".$row['id']." - ".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="id_animal" data-placeholder="-- Seleccionar animal--" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-1 control-label">Empleado</label>
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
                        $combobit .="<option value=".">"."</option>;  <option value='".$row['id']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="id_empleado" data-placeholder="-- Seleccionar empleado--" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-1 control-label">Fecha</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_peso_ant" autocomplete="off" placeholder="-- Seleccionar fecha--" required>
                    </div>
                  </div>

                 <div class="form-group row">
                    <label class="col-sm-1 control-label">Peso</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">Kg.</span>
                        <input type="text" class="form-control" id="peso" name="peso" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" autocomplete="off"required>
                      </div>
                    </div>
                  </div>

                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                        <a href="?module=pesaje_ganado" class="btn btn-danger btn-reset">Cancelar</a>
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
    $query = mysqli_query($mysqli, "SELECT p.id as id, p.id_animal as id_a, p.id_empleado as id_emp, p.fecha_peso_ant as fpa, p.peso_ant as pan, a.nombre as na, e.nombre as ne FROM peso_animal p join animal a ON p.id=$_GET[id] join empleado e on p.id_empleado=e.id") 
                                      or die('error: '.mysqli_error($mysqli));
                                      $data  = mysqli_fetch_assoc($query);
    }
    //WHERE id='$_GET[id]'")
?>

<section class="content-header">
  <h1><i class="fa fa-edit icon-title"></i> Modificar Peso</h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=pesaje_ganado"> Pesaje Ganado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pesaje_ganado/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-1 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1 control-label">Animal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_a" value="<?php echo $data['id_a']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1 control-label">Empleado pesaje anterior</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ne" value="<?php echo $data['ne']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1 control-label">Peso Anterior </label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Kg</span>
                    <input type="text" class="form-control" id="pan" name="pan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo format_rupiah($data['pan']); ?>" readonly required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                    <label class="col-sm-1 control-label">Empleado pesaje actual</label>
                    <div class="col-sm-5">
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
                          
                        $combobit .="<option value=".">"."</option>; <option value=".$row['id'].">".$row['id']." - ".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML .$row['nombre'].
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="id_emp" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php 
                        echo $combobit; 
                        
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-1 control-label">Fecha</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fpac" autocomplete="off" required> </br>
                    </div>
                  </div>
                

              <div class="form-group">
                <label class="col-sm-1 control-label">Peso Actual </label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-addon">Kg</span>
                    <input type="text" class="form-control" id="pa" name="pa" autocomplete="off" required>
                  </div>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=pesaje_ganado" class="btn btn-danger btn-reset">Cancelar</a>
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