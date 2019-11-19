<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'animales') {
		include "modules/animales/view.php";
	}
	elseif ($_GET['module'] == 'form_animales') {
		include "modules/animales/form.php";
	}
	elseif ($_GET['module'] == 'razas') {
		include "modules/razas/view.php";
	}
	elseif ($_GET['module'] == 'form_razas') {
		include "modules/razas/form.php";
	}
	elseif ($_GET['module'] == 'colores') {
		include "modules/colores/view.php";
	}
	elseif ($_GET['module'] == 'form_colores') {
		include "modules/colores/form.php";
	}
	elseif ($_GET['module'] == 'lotes') {
		include "modules/lotes/view.php";
	}

	elseif ($_GET['module'] == 'form_lotes') {
		include "modules/lotes/form.php";
	}

	elseif ($_GET['module'] == 'pesaje_leche') {
		include "modules/pesaje_leche/view.php";
	}
	elseif ($_GET['module'] == 'form_pesaje_leche') {
		include "modules/pesaje_leche/form.php";
	}

	elseif ($_GET['module'] == 'pesaje_ganado') {
		include "modules/pesaje_ganado/view.php";
	}
	elseif ($_GET['module'] == 'form_pesaje_ganado') {
		include "modules/pesaje_ganado/form.php";
	}
	elseif ($_GET['module'] == 'aforos') {
		include "modules/aforos/view.php";
	}

	elseif ($_GET['module'] == 'form_aforos') {
		include "modules/aforos/form.php";
	}
	elseif ($_GET['module'] == 'potreros') {
		include "modules/potreros/view.php";
	}

	elseif ($_GET['module'] == 'form_potreros') {
		include "modules/potreros/form.php";
	}
	elseif ($_GET['module'] == 'vegetales') {
		include "modules/vegetales/view.php";
	}

	elseif ($_GET['module'] == 'form_vegetales') {
		include "modules/vegetales/form.php";
	}
	elseif ($_GET['module'] == 'tipo_vegetales') {
		include "modules/tipo_vegetales/view.php";
	}

	elseif ($_GET['module'] == 'form_tipo_vegetales') {
		include "modules/tipo_vegetales/form.php";
	}
	elseif ($_GET['module'] == 'tipo_ctr_potrero') {
		include "modules/tipo_ctr_potrero/view.php";
	}

	elseif ($_GET['module'] == 'form_tipo_ctr_potrero') {
		include "modules/tipo_ctr_potrero/form.php";
	}

	elseif ($_GET['module'] == 'empleados') {
		include "modules/empleados/view.php";
	}

	elseif ($_GET['module'] == 'form_empleados') {
		include "modules/empleados/form.php";
	}
	elseif ($_GET['module'] == 'proveedores') {
		include "modules/proveedores/view.php";
	}

	elseif ($_GET['module'] == 'form_proveedores') {
		include "modules/proveedores/form.php";
	}

	elseif ($_GET['module'] == 'stock_inventory') {
		include "modules/stock_inventory/view.php";
	}

	elseif ($_GET['module'] == 'reporte_pesaje_ganado') {
		include "modules/reporte_pesaje_ganado/view.php";
	}
	elseif ($_GET['module'] == 'reporte_pesaje_leche') {
		include "modules/reporte_pesaje_leche/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>