
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
            $edad_categoria  = mysqli_real_escape_string($mysqli, trim($_POST['edad_categoria']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $observaciones  = mysqli_real_escape_string($mysqli, trim($_POST['observaciones']));
        
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO vacunas(id,edad_categoria,nombre,observaciones) 
                                            VALUES('$id','$edad_categoria','$nombre','$observaciones')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=vacunas&alert=1");
            }   
        }   
    }

    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $edad_categoria  = mysqli_real_escape_string($mysqli, trim($_POST['edad_categoria']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $observaciones  = mysqli_real_escape_string($mysqli, trim($_POST['observaciones']));
           
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE vacunas SET  edad_categoria       = '$edad_categoria',
                                                                    nombre               =  '$nombre',
                                                                    observaciones        = '$observaciones'
                                                            WHERE   id                   = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=vacunas&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM vacunas WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=vacunas&alert=3");
            }
        }
    }       
}       
?>