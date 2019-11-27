
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
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $id_veterinario  = mysqli_real_escape_string($mysqli, trim($_POST['id_veterinario']));
            $id_vacuna  = mysqli_real_escape_string($mysqli, trim($_POST['id_vacuna']));
            $observaciones  = mysqli_real_escape_string($mysqli, trim($_POST['observaciones']));
        
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO vacunacion(id,id_animal,fecha,id_veterinario,id_vacuna,observaciones) 
                                            VALUES('$id','$id_animal','$fecha','$id_veterinario','$id_vacuna','$observaciones')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=vacunacion&alert=1");
            }   
        }   
    }

    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $id_animal  = mysqli_real_escape_string($mysqli, trim($_POST['id_animal']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $id_veterinario  = mysqli_real_escape_string($mysqli, trim($_POST['id_veterinario']));
            $id_vacuna  = mysqli_real_escape_string($mysqli, trim($_POST['id_vacuna']));
            $observaciones  = mysqli_real_escape_string($mysqli, trim($_POST['observaciones']));
           
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE vacunacion SET   id_animal           = '$id_animal',
                                                                        fecha               = '$fecha',
                                                                        id_veterinario      = '$id_veterinario',
                                                                        id_vacuna           = '$id_vacuna',
                                                                        observaciones       = '$observaciones'
                                                            WHERE       id                  = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=vacunacion&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM vacunacion WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=vacunacion&alert=3");
            }
        }
    }       
}       
?>