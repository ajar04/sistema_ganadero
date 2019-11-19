
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
            $id_potrero  = mysqli_real_escape_string($mysqli, trim($_POST['id_potrero']));
            $id_vegetacion  = mysqli_real_escape_string($mysqli, trim($_POST['id_vegetacion']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            
            $usuario_creacion = $_SESSION['id_user'];

        $query = mysqli_query($mysqli, "INSERT INTO afaro(id,id_potrero,id_vegetacion,id_empleado,peso,fecha) 
            VALUES('$id','$id_potrero','$id_vegetacion','$id_empleado','$peso','$fecha')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=aforos&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_potrero  = mysqli_real_escape_string($mysqli, trim($_POST['id_potrero']));
            $id_vegetacion  = mysqli_real_escape_string($mysqli, trim($_POST['id_vegetacion']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            

            $usuario_edicion = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE afaro SET id_potrero     = '$id_potrero',
                                                                 id_vegetacion  = '$id_vegetacion',
                                                                 id_empleado    = '$id_empleado',
                                                                 peso           = '$peso',
                                                                 fecha          = '$fecha'
                                                                    
                                                              WHERE id       = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=aforos&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM afaro WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=aforos&alert=3");
            }
        }
    }       
}       
?>