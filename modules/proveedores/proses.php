
<?php
session_start();
require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $direccion     = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email     = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $telefono = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['telefono'])));           

            $usuario_creacion = $_SESSION['id_user'];

        $query = mysqli_query($mysqli, "INSERT INTO proveedor(id,nombre,direccion,email,telefono) 
            VALUES('$id','$nombre','$direccion','$email','$telefono')")
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