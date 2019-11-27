
<?php
session_start();
require_once "../../config/database.php";
//$fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_peso_ant']));
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
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_peso_ant']));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));
            #$ganancia = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['ganancia'])));

            $created_user = $_SESSION['id_user'];
            
  
            $query = mysqli_query($mysqli, "INSERT INTO `peso_animal`(`id`, `id_animal`, `id_empleado`, `fecha_peso`, `peso`, `fecha_registro`, `ganancia`) 
                                            VALUES(' ','$id_animal','$id_empleado','$fecha',$peso,'$fecha_reg','$ganancia+$peso' )")
                                            or die('error '.mysqli_error($mysqli));    
            if ($query) {
         
                header("location: ../../main.php?module=pesaje_ganado&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        

            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_a']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_emp']));
            
            $peso_ant = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['pan'])));
            $peso_actual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['pa'])));
            $fecha_peso_actual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['fpac'])));
            $peso2=$peso_actual-$peso_ant;
            
               
                
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE peso_animal SET  id                  = '$id',
                                                                        id_animal           = '$id_animal',
                                                                        id_empleado         = '$id_empleado',
                                                                        fecha_peso_actual   = '$fecha_peso_actual',
                                                                        peso_ant            ='$peso_ant',
                                                                        peso_actual         ='$peso_actual',
                                                                        ganancia            = '$peso2'
                                                                    
                                                                        WHERE id            = '$id'") or die('error: '.mysqli_error($mysqli));
                if ($query) {
                  
                    header("location: ../../main.php?module=pesaje_ganado&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM peso_animal WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=pesaje_ganado&alert=3");
            }
        }
    }       
}       
?>