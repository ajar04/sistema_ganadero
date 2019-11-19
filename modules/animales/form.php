 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Animales
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Datos generales </a></li>
      <li><a href="?module=animales"> Genealogia </a></li>
      <li><a href="?module=animales"> Fenotipo </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
              <form role="form" class="form-horizontal" action="modules/animales/proses.php?act=insert" method="POST">
                <div class="box-body">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="nombre" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Sexo</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-4">
                    <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Muerto">Muerto</option>
                        <option value="Activo">Activo</option>
                        <option value="Vendido">Vendido</option>
                        <option value="Externo">Externo</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Propietario</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="propietario" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="1">Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Registro</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="registro" autocomplete="off" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <label class="col-sm-2 col-form-label">Fecha nacimiento</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_nac" autocomplete="off" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fecha destete</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_dest" autocomplete="off" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Peso Nacimiento</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">Kg.</span>
                        <input type="text" class="form-control" id="peso_nac" name="peso_nac" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Peso Destete</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <span class="input-group-addon">Kg.</span>
                        <input type="text" class="form-control" id="peso_dest" name="peso_dest" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" >
                      </div>
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Raza</label>
                    <div class="col-sm-4">
                      <?php

                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);
                      
                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from raza";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['raza']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="raza" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-4">
                      <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from color";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['color']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                      <select class="chosen-select" name="color" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <?php echo $combobit; ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-horizontal">
                    <label class="col-sm-2 col-form-label">Marca oreja</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="marca_oreja" autocomplete="off" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Marca hierro</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="marca_hierro" autocomplete="off" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">tipo proposito</label>
                    <div class="col-sm-4">
                      <select class="chosen-select" name="tipo_propo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Lechero">Lechero</option>
                        <option value="Carne">Carne</option>
                        <option value="Doble Proposito">Doble Proposito</option>
                        <option value="Puro">Puro</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Procedencia</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="procedencia" autocomplete="off" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Precio venta</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-addon">$.</span>
                        <input type="text" class="form-control" id="precio_venta" name="precio_venta" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" required>
                      </div>
                    </div>
                  </div>

                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                        <a href="?module=animales" class="btn btn-danger btn-reset">Cancelar</a>
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
    $query = mysqli_query($mysqli, "SELECT id,nombre,sexo,estado,propietario,registro,fecha_nac,fecha_dest,peso_nac,peso_dest,raza,color,marca_oreja,marca_hierro,tipo_propo,procedencia,precio_venta FROM animal WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
                                      $data  = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
  <h1><i class="fa fa-edit icon-title"></i> Modificar Ganado</h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Ganado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/animales/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" value="<?php echo $data['nombre']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['sexo']; ?>"><?php echo $data['sexo']; ?></option>
                   <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['estado']; ?>"><?php echo $data['estado']; ?></option>
                    <option value="Muerto">Muerto</option>
                    <option value="Activo">Activo</option>
                    <option value="Vendido">Vendido</option>
                    <option value="Externo">Externo</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Propietario</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="propietario" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['propietario']; ?>"><?php echo $data['propietario']; ?></option>
                    <option value="1">Admin</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Registro</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="registro" autocomplete="off" value="<?php echo $data['registro']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-1">Fecha nacimiento</label>
                <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_nac" autocomplete="off" required value="<?php echo $data['fecha_nac']; ?>"></div>
              </div>

              <div class="form-group">
                <label class="col-sm-1">Fecha destete</label>
                <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="fecha_dest" autocomplete="off" value="<?php echo $data['fecha_dest']; ?>"></div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Peso nacimiento</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Kg.</span>
                    <input type="text" class="form-control" id="peso_nac" name="peso_nac" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo format_rupiah($data['peso_nac']); ?>" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Peso destete</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">Kg</span>
                    <input type="text" class="form-control" id="peso_dest" name="peso_dest" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo format_rupiah($data['peso_dest']); ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Raza</label>
                <div class="col-sm-4">
                  <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from raza";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['raza']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                  <select class="chosen-select" name="raza" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['raza']; ?>"><?php echo $data['raza']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Color</label>
                <div class="col-sm-5">
                  <?php
                      require_once "config/conection.php";
                      $conexion = @new mysqli($server, $username, $password, $database);

                      if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarl
                      {
                      die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
                      }
                        $sql="SELECT * from color";
                        $result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

                      if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                      {
                        $combobit="";
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $combobit .=" <option value='".$row['id']."'>".$row['color']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
                        }
                      }
                      else{
                          echo "No hubo resultados";
                          }
                      $conexion->close(); //cerramos la conexión
                      ?>
                  <select class="chosen-select" name="color" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['color']; ?>"><?php echo $data['color']; ?></option>
                    <?php echo $combobit; ?>
                  </select>
                </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Marca oreja</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="marca_oreja" autocomplete="off" value="<?php echo $data['marca_oreja']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Marca hierro</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="marca_hierro" autocomplete="off" value="<?php echo $data['marca_hierro']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo proposito</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tipo_propo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['tipo_propo']; ?>"><?php echo $data['tipo_propo']; ?></option>
                    <option value="1">Lechero</option>
                    <option value="2">Carne</option>
                    <option value="3">Doble proposito</option>
                    <option value="4">Puro</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Procedencia</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="procedencia" autocomplete="off" value="<?php echo $data['procedencia']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Precio de Venta</label>
                <div class="col-sm-5">
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo format_rupiah($data['precio_venta']); ?>" required>
                  </div>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=animales" class="btn btn-danger btn-reset">Cancelar</a>
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