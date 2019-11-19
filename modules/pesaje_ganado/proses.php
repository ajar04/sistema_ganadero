
<?php
session_start();
require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {

           # $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));
            $ganancia = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['ganancia'])));

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO peso_animal(id,id_animal,id_empleado,fecha,peso,ganancia)  
                                            VALUES('$id_animal','$id_empleado','$fecha','$peso','$ganancia')")
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
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $id_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['id_empleado']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $peso = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['peso'])));
            $ganancia = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['ganancia'])));


                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE peso_animal SET   id_animal       = '$id_animal',
                                                                         id_empleado     = '$id_empleado',
                                                                         fecha           = '$fecha',
                                                                         peso            = '$peso',
                                                                         ganancia        = '$peso'
                                                                    
                                                                        WHERE id       = '$id'") or die('error: '.mysqli_error($mysqli));
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