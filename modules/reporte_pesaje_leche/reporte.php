<?php

require_once "../../config/database.php";//CONEXION A LA BD



$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte_leche']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=utf8');
	header('Content-Disposition: attachment; filename="Reporte_Fechas_Pesaje_leche.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('Codigo', 'Animal', 'Empleado', 'Fecha', 'Peso mañana','Peso tarde','Ganancia'));
	// QUERY PARA CREAR EL REPORTE

	$query=mysqli_query($mysqli,"SELECT (p.id)as id,(a.nombre)as animal,(e.nombre)as empleado,(p.fecha)as 
										fecha,(p.peso_am)as peso_am,(p.peso_pm)as peso_pm,(p.peso_perdido)as ganancia
                                        FROM peso_leche p INNER JOIN animal a ON p.id_animal=a.id 
                                        INNER JOIN empleado e ON p.id_empleado=e.id 
                                        WHERE p.id_animal=a.id AND p.id_empleado=e.id
                                             
								 -- where fecha BETWEEN '$fecha1' AND '$fecha2' 
								 ORDER BY id")
								 or die('error: '.mysqli_error($mysqli));

	while($filaR= mysqli_fetch_assoc($query)){
		fputcsv($salida, array($filaR['id'], $filaR['animal'], $filaR['empleado'], $filaR['fecha'], $filaR['peso_am'],$filaR['peso_pm'],$filaR['ganancia']));
	}

}
?>