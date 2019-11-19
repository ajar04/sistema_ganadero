
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
            $sexo     = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $estado     = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            $propietario     = mysqli_real_escape_string($mysqli, trim($_POST['propietario']));
            $registro  = mysqli_real_escape_string($mysqli, trim($_POST['registro']));
            $fecha_nac  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_nac']));
            $fecha_dest  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_dest']));
            $peso_nac = str_replace('', mysqli_real_escape_string($mysqli, trim($_POST['peso_nac'])));
            $peso_dest = str_replace('', mysqli_real_escape_string($mysqli, trim($_POST['peso_dest'])));
            $raza     = mysqli_real_escape_string($mysqli, trim($_POST['raza']));
            $color     = mysqli_real_escape_string($mysqli, trim($_POST['color']));
            $marca_oreja  = mysqli_real_escape_string($mysqli, trim($_POST['marca_oreja']));
            $marca_hierro  = mysqli_real_escape_string($mysqli, trim($_POST['marca_hierro']));
            $tipo_propo  = mysqli_real_escape_string($mysqli, trim($_POST['tipo_propo']));
            $procedencia = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['procedencia'])));
            $precio_venta = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['precio_venta'])));

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO animal(id,nombre,sexo,estado,propietario,registro,fecha_nac,fecha_dest,peso_nac,peso_dest,raza,color,marca_oreja,marca_hierro,tipo_propo,procedencia,precio_venta) 
                                            VALUES('$id','$nombre','$sexo','$estado','$propietario','$registro','$fecha_nac','$fecha_dest','$peso_nac','$fecha_dest','$raza','$color','$marca_oreja','$marca_hierro','$tipo_propo','$procedencia','$precio_venta')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=animales&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        

            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $sexo     = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $estado     = mysqli_real_escape_string($mysqli, trim($_POST['estado']));
            $propietario     = mysqli_real_escape_string($mysqli, trim($_POST['propietario']));
            $registro  = mysqli_real_escape_string($mysqli, trim($_POST['registro']));
            $fecha_nac  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_nac']));
            $fecha_dest  = mysqli_real_escape_string($mysqli, trim($_POST['fecha_dest']));
            $peso_nac = str_replace(',','.', mysqli_real_escape_string($mysqli, trim($_POST['peso_nac'])));
            $peso_dest = str_replace(',','.', mysqli_real_escape_string($mysqli, trim($_POST['peso_dest'])));
            $raza     = mysqli_real_escape_string($mysqli, trim($_POST['raza']));
            $color     = mysqli_real_escape_string($mysqli, trim($_POST['color']));
            $marca_oreja  = mysqli_real_escape_string($mysqli, trim($_POST['marca_oreja']));
            $marca_hierro  = mysqli_real_escape_string($mysqli, trim($_POST['marca_hierro']));
            $tipo_propo  = mysqli_real_escape_string($mysqli, trim($_POST['tipo_propo']));
            $procedencia = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['procedencia'])));
            $precio_venta = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['precio_venta'])));


                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE animal SET  nombre        = '$nombre',
                                                                    sexo         = '$sexo',
                                                                    estado       = '$estado',
                                                                    propietario  = '$propietario',
                                                                    registro     = '$registro',
                                                                    fecha_nac    = '$fecha_nac',
                                                                    fecha_dest   = '$fecha_dest',
                                                                    peso_nac     = '$peso_nac',
                                                                    peso_dest    = '$peso_dest',
                                                                    raza         = '$raza',
                                                                    color        = '$color',
                                                                    marca_oreja  = '$marca_oreja',
                                                                    marca_hierro = '$marca_hierro',
                                                                    tipo_propo   = '$tipo_propo',
                                                                    procedencia  = '$procedencia',
                                                                    precio_venta = '$precio_venta'
                                                                    
                                                              WHERE id       = '$id'") or die('error: '.mysqli_error($mysqli));
                if ($query) {
                  
                    header("location: ../../main.php?module=animales&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM animal WHERE id='$id'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=animales&alert=3");
            }
        }
    }       
}       
?>