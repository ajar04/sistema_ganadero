
<?php
session_start();
#date_default_timezone_set('America/Bogota');
require_once "../../config/database.php";
$fecha_reg=date("Y-m-d H:i:s");
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {

            #$id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $cant_leche = mysqli_real_escape_string($mysqli, trim($_POST['cant_leche']));
           
            
                        
            $peso=$peso_am-$peso_pm;
            $peso_perdido=$peso;

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO `produccion_leche`(`id`, `id_animal`, `id_empleado`, `fecha`, `cant_leche`, `total_leche`, `prom_leche`)  
                                            VALUES             (' ','$id_animal','$id_empleado','$fecha','$cant_leche','','')")
                                            or die('error '.mysqli_error($mysqli));   
     
            
        
            if ($query) {
         
                header("location: ../../main.php?module=pesaje_leche&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        

            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $cant_leche = mysqli_real_escape_string($mysqli, trim($_POST['cant_leche']));
           
            $total_leche = $total_leche + $cant_leche;
            $prom_leche = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso_pm'])));

            $peso=$peso_am-$peso_pm;
            $peso_perdido=$peso;
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE produccion_leche SET   id_animal       = '$id_animal',
                                                                         id_empleado    = '$id_empleado',
                                                                         fecha          = '$fecha',
                                                                         cant_leche        = '$cant_leche',
                                                                         total_leche    = '$total_leche',
                                                                         prom_leche        = '$prom_leche'
                                                                
                                                                        WHERE id        = '$id'") or die('error: '.mysqli_error($mysqli));
                if ($query) {
                  
                    header("location: ../../main.php?module=pesaje_leche&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM produccion_leche WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=pesaje_leche&alert=3");
            }
        }
    }       
}       
?>