
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
            $area  = mysqli_real_escape_string($mysqli, trim($_POST['area']));
            $coordenadas  = mysqli_real_escape_string($mysqli, trim($_POST['coordenadas']));
            $dias_ent_anim  = mysqli_real_escape_string($mysqli, trim($_POST['dias_ent_anim']));
            $dias_sal_anim  = mysqli_real_escape_string($mysqli, trim($_POST['dias_sal_anim']));
            $est_cerca  = mysqli_real_escape_string($mysqli, trim($_POST['est_cerca']));
            $cap_ganado  = mysqli_real_escape_string($mysqli, trim($_POST['cap_ganado']));
            $observacion  = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));

            $usuario_creacion = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO potrero(id,nombre,area,coordenadas,dias_ent_anim,dias_sal_anim,est_cerca,cap_ganado,observacion,usuario_creacion,usuario_edicion) 
                                            VALUES('$id','$nombre','$area','$coordenadas','$dias_ent_anim','$dias_sal_anim','$est_cerca','$cap_ganado','$observacion','$usuario_creacion','$usuario_creacion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=potreros&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $area  = mysqli_real_escape_string($mysqli, trim($_POST['area']));
            $coordenadas  = mysqli_real_escape_string($mysqli, trim($_POST['coordenadas']));
            $dias_ent_anim  = mysqli_real_escape_string($mysqli, trim($_POST['dias_ent_anim']));
            $dias_sal_anim  = mysqli_real_escape_string($mysqli, trim($_POST['dias_sal_anim']));
            $est_cerca  = mysqli_real_escape_string($mysqli, trim($_POST['est_cerca']));
            $cap_ganado  = mysqli_real_escape_string($mysqli, trim($_POST['cap_ganado']));
            $observacion  = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));
           
                $usuario_edicion = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE potrero SET  nombre          = '$nombre',
                                                                    area            = '$area',
                                                                    coordenadas     = '$coordenadas',
                                                                    dias_ent_anim   = '$dias_ent_anim',
                                                                    dias_sal_anim   = '$dias_sal_anim',
                                                                    est_cerca       = '$est_cerca',
                                                                    cap_ganado      = '$cap_ganado',
                                                                    observacion     = '$observacion',
                                                                    usuario_edicion = '$usuario_edicion'
                                                            WHERE id       = '$id'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=potreros&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM potrero WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=potreros&alert=3");
            }
        }
    }       
}       
?>