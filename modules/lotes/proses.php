
<?php
session_start();

require_once "../../config/database.php";
$fecha_reg=date("Y-m-d H:i:s");
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {

            //$id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $id_animal_lote=mysqli_real_escape_string($mysqli, trim($_POST['id_animal_lote']));
            $id_empleado=mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            
            $id_usuario = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO `lote`(`id`, `nombre_lote`, `id_animal_lote`,`id_empleado`, `fecha_creacion`,`fecha_actualizacion`)
                                            VALUES(' ','$nombre','$id_animal_lote','$id_empleado','$fecha_reg', ' ')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=lotes&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
                
                
                $nombre_lote  = mysqli_real_escape_string($mysqli, trim($_POST['nombre_lote']));
                $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
           
                $id_usuario = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE lote SET  nombre_lote    = '$nombre_lote',
                                                                 id_empleado   = '$id_empleado'
                                                            WHERE id               = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=lotes&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM lote WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=lotes&alert=3");
            }
        }
    }       
}       
?>