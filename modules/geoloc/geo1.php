<!DOCTYPE html>

<html>
    <head>
        <title>JavaScript Get & Set Input Text Value</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    <?php
    date_default_timezone_set('America/Bogota');
    $zonahoraria = date_default_timezone_get();
    echo 'Zona horaria predeterminada: ' . $zonahoraria;
    echo "<br/>";
    $fecha=date("y-m-d H:i");
    echo $fecha;
    
?>
        
    </body>
</html>