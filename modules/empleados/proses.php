
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
            $fecha_nac  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_nac']));
            $sexo     = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $correo     = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $salario = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['salario'])));
            $cargo     = mysqli_real_escape_string($mysqli, trim($_POST['cargo']));
            $estado     = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            

            $usuario_creacion = $_SESSION['id_user'];

        $query = mysqli_query($mysqli, "INSERT INTO empleado(id,nombre,direccion,fecha_nac,sexo,correo,salario,cargo,estado,usuario_creacion,usuario_edicion) 
            VALUES('$id','$nombre','$direccion','$fecha_nac','$sexo','$correo','$salario','$cargo','$estado','$usuario_creacion','$usuario_creacion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=empleados&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        

            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $direccion     = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $fecha_nac  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_nac']));
            $sexo     = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $correo     = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $salario = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['salario'])));
            $cargo     = mysqli_real_escape_string($mysqli, trim($_POST['cargo']));
            $estado     = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            

            $usuario_edicion = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE empleado SET id           = '$id',
                                                                    nombre       = '$nombre',
                                                                    direccion    = '$direccion',
                                                                    fecha_nac    = '$fecha_nac',
                                                                    sexo         = '$sexo',
                                                                    correo       = '$correo',
                                                                    salario      = '$salario',
                                                                    cargo        = '$cargo',
                                                                    estado       = '$estado',
                                                                    usuario_edicion= '$usuario_edicion'
                                                                    
                                                              WHERE id       = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=empleados&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM empleado WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=empleados&alert=3");
            }
        }
    }       
}       
?>