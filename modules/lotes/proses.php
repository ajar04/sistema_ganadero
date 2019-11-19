
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
            $lote  = mysqli_real_escape_string($mysqli, trim($_POST['lote']));
            $usuario_creacion = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO lote(id,lote,usuario_creacion,usuario_edicion) 
                                            VALUES('$id','$lote','$usuario_creacion','$usuario_creacion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=lotes&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
                $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
                $lote  = mysqli_real_escape_string($mysqli, trim($_POST['lote']));
           
                $usuario_edicion = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE lote SET  lote       = '$lote',
                                                                usuario_edicion    = '$usuario_edicion'
                                                            WHERE id       = '$id'")
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