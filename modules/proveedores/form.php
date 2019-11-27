 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Proveedor
    </h1>
    <ol class="breadcrumb" style="margin-top: 50px;">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=proveedores"> Proveedor </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
              <form role="form" class="form-horizontal" action="modules/proveedores/proses.php?act=insert" method="POST">
                <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nit" onKeyPress="return goodchars(event,'0123456789-',this)" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Empresa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre_proveedor" autocomplete="off" required>
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="telefono" name="telefono1" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Web</label>
                <div class="col-sm-5">
                  <input type="url" class="form-control" name="web" autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Contacto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre_contacto" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono Contacto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono2" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Pais</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pais" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Ciudad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ciudad" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group row">
                    <label class="col-sm-2 control-label">Descripción</label>
                    <textarea rows="0" cols="0" class="span6" name="descripcion" id="descripcion" style="margin: 15px; width: 485px; height: 137px;"> </textarea>
                    <span class="help-inline error" id="descripcion" style="display: none"></span>
                    
                  </div>

                  <div class="box-footer">
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                        <a href="?module=proveedores" class="btn btn-danger btn-reset">Cancelar</a>
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
    $query = mysqli_query($mysqli, "SELECT * FROM proveedor WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
                                      $data  = mysqli_fetch_assoc($query);
    }
?>

<section class="content-header">
  <h1><i class="fa fa-edit icon-title"></i> Modificar Proveedor</h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=proveedores"> Proveedor </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/proveedores/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre empresa</label>
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
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="telefono" name="salario" autocomplete="off" onKeyPress="return goodchars(event,'0123456789.',this)" value="<?php echo($data['telefono']); ?>" required>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=proveedores" class="btn btn-danger btn-reset">Cancelar</a>
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