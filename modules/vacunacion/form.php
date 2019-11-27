 <?php  
 
if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Vacunacion
    </h1>
    <ol class="breadcrumb" style="margin-top: 50px;">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=vacunacion"> Salud </a></li>
      <li class="active"> Vacunacion </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/vacunacion/proses.php?act=insert" method="POST">
            <div class="box-body">

              <div class="form-group">
                    <label class="col-sm-2 col-form-label">Animal</label>
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
                        $combobit .=" <option value='".$row['id']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
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

              <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha" autocomplete="off" >
                    </div>
                  </div>

              <div class="form-group">
                    <label class="col-sm-2 col-form-label">Veterinario</label>
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
                      <select class="chosen-select" name="id_veterinario" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                        </select>
                    </div>
                  </div>
              <div class="form-group">
                    <label class="col-sm-2 col-form-label">Vacuna</label>
                    <div class="col-sm-4">
                      <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);
                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from vacunas";
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
                      <select class="chosen-select" name="id_vacuna" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                        </select>
                    </div>
                  </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observaciones" autocomplete="off" >
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=vacunacion" class="btn btn-default btn-reset">Cancelar</a>
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

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT id,id_animal,fecha,id_veterinario,id_vacuna,observaciones 
                                      FROM vacunacion WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Vacunacion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=vacunacion"> Vacunacion </a></li>
      <li class="active"> Modificar Vacunacion </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/vacunacion/proses.php?act=update" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
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
                        $sql="SELECT * from animal";
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
                  <select class="chosen-select" name="id_animal" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['id_animal']; ?>"><?php echo $data['id_animal']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1">Fecha</label>
                <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha" autocomplete="off" value="<?php echo $data['fecha']; ?>"></div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Veterinario</label>
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
                  <select class="chosen-select" name="id_veterinario" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['id_veterinario']; ?>"><?php echo $data['id_veterinario']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Vacuna</label>
                <div class="col-sm-4">
                  <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from vacunas";
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
                  <select class="chosen-select" name="id_vacuna" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['id_vacuna']; ?>"><?php echo $data['id_vacuna']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observaciones" autocomplete="off" value="<?php echo $data['observaciones']; ?>" >
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=vacunacion" class="btn btn-danger">Cancelar</a>
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