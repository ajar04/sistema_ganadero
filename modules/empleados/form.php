 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Empleados
    </h1>
    <ol class="breadcrumb" style="margin-top: 50px;">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=empleados"> Empleados </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
              <form role="form" class="form-horizontal" action="modules/empleados/proses.php?act=insert" method="POST">
                <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Cedula</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id"onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-form-label">Fecha nacimiento</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_nac" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                   <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Salario</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" class="form-control" id="salario" name="salario" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-2 col-form-label">Cargo</label>
                    <div class="col-sm-5">
                      <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from cargo";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['tipo_cargo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="cargo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>
              

              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Retirado">Retirado</option>
                    <option value="Activo">Activo</option>
                    <option value="Incapacitado">Incapacitado</option>
                    <option value="Suspendido">Suspendido</option>
                  </select>
                </div>
              </div>

                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                        <a href="?module=empleados" class="btn btn-danger btn-reset">Cancelar</a>
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
    $query = mysqli_query($mysqli, "SELECT id,nombre,direccion,fecha_nac,sexo,correo,salario,cargo,estado,usuario_creacion,fecha_creacion,usuario_edicion,fecha_edicion FROM empleado WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
                                      $data  = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
  <h1><i class="fa fa-edit icon-title"></i> Modificar Empleado</h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=empleados"> Empleados </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/empleados/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nro. Cedula</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" value="<?php echo $data['nombre']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="direccion" autocomplete="off" value="<?php echo $data['direccion']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1">Fecha nacimiento</label>
                <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_nac" autocomplete="off" required value="<?php echo $data['fecha_nac']; ?>"></div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['sexo']; ?>"><?php echo $data['sexo']; ?></option>
                   <option value="Macho">Hombre</option>
                    <option value="Hembra">Mujer</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" value="<?php echo $data['correo']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Salario</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" class="form-control" id="salario" name="salario" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo format_rupiah($data['salario']); ?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cargo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['cargo']; ?>"><?php echo $data['cargo']; ?></option>
                    <option value=""></option>
                    <option value="Ordeñador">Ordeñador</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Crianza">Crianza</option>
                    <option value="Ceba">Ceba</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['estado']; ?>"><?php echo $data['estado']; ?></option>
                    <option value=""></option>
                    <option value="Retirado">Retirado</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Vendido</option>
                    <option value="Suspendido">Suspendido</option>
                  </select>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=empleados" class="btn btn-danger btn-reset">Cancelar</a>
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