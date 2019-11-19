
<?php
session_start();
require_once "../../config/database.php";

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
            $peso_am = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso_am'])));
            $peso_pm = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso_pm'])));
            $peso_perdido=$peso_am-$peso_pm;
           #$peso_perdido = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['resul'])));
            

            $created_user = $_SESSION['id_user'];

            $query = mysqli_query($mysqli, "INSERT INTO `peso_leche` (`id`, `id_animal`, `id_empleado`, `fecha`, `peso_am`, `hora_am`, `peso_pm`, `hora_pm`, `peso_perdido`) 
            VALUES (\'$id_animal\', \'$id_empleado\', \'$fecha\', \'$peso_am\', \'$peso_pm\', \'$peso_perdido\')")
                        or die('error '.mysqli_error($mysqli));

            //$query = mysqli_query($mysqli, "INSERT INTO peso_leche (id_animal,id_empleado,fecha,peso_am,peso_pm,peso_perdido)  
              //                              VALUES($id_animal','$id_empleado','$fecha','$peso_am','$peso_pm','$peso_perdido')")
                //                            or die('error '.mysqli_error($mysqli));    

        
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
            $peso_am = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso_am'])));
            $peso_pm = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso_pm'])));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));


                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE peso_leche SET   id_animal       = '$id_animal',
                                                                         id_empleado     = '$id_empleado',
                                                                         fecha           = '$fecha',
                                                                         peso_am            = '$peso_am',
                                                                         peso_pm            = '$peso_pm',
                                                                         peso            = '$peso_am'
                                                                        WHERE id       = '$id'") or die('error: '.mysqli_error($mysqli));
                if ($query) {
                  
                    header("location: ../../main.php?module=pesaje_leche&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM peso_leche WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=pesaje_leche&alert=3");
            }
        }
    }       
}       
?>