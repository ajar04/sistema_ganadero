
<?php
session_start();
require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            //$id  = mysqli_real_escape_string($mysqli, trim($_POST['id_proveedor']));
            $nit  = mysqli_real_escape_string($mysqli, trim($_POST['nit']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre_proveedor']));
            $direccion     = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $telefono = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['telefono1'])));  
            $email     = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $web     = mysqli_real_escape_string($mysqli, trim($_POST['web']));
            $nombre2     = mysqli_real_escape_string($mysqli, trim($_POST['nombre_contacto']));
            $telefono2     = mysqli_real_escape_string($mysqli, trim($_POST['telefono2']));
            $pais     = mysqli_real_escape_string($mysqli, trim($_POST['pais']));
            $ciudad     = mysqli_real_escape_string($mysqli, trim($_POST['ciudad']));
            $descripcion     = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
                     

            $usuario_creacion = $_SESSION['id_user'];

        $query = mysqli_query($mysqli, "INSERT INTO `proveedor`(`id_proveedor`, `nit`, `nombre_proveedor`, `direccion`, `telefono`, `email`, `web`, `nombre_contacto`, `telefono_contacto`, `pais`, `ciudad`, `descripcion`)  VALUES(' ',$nit,'$nombre','$direccion',$telefono,'$email','$web','$nombre2',$telefono2,'$pais','$ciudad','$descripcion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=proveedores&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        

            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $direccion     = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email     = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $telefono = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['telefono']))); 
            

            $usuario_edicion = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE proveedor SET id          = '$id',
                                                                    nombre       = '$nombre',
                                                                    direccion    = '$direccion',
                                                                    email        = '$email',
                                                                    telefono     = '$telefono'
                                                                    
                                                              WHERE id       = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=proveedores&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM proveedor WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=proveedores&alert=3");
            }
        }
    }       
}       
?>