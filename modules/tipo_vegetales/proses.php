
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
            $descripcion  = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
        
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO t_vegetal(id,nombre,descripcion) 
                                            VALUES('$id','$nombre','$descripcion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=tipo_vegetales&alert=1");
            }   
        }   
    }

    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
                $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
                $descripcion  = mysqli_real_escape_string($mysqli, trim($_POST['descripcion']));
           
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE t_vegetal SET  nombre       = '$nombre',
                                                                 descripcion       = '$descripcion'
                                                            WHERE id       = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=tipo_vegetales&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM t_vegetal WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=tipo_vegetales&alert=3");
            }
        }
    }       
}       
?>