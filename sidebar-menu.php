<?php 
if ($_SESSION['permisos_acceso']=='Super Admin') { ?>
  <ul class="sidebar-menu">
    <li class="header">MENU</li>

    <?php 
    if ($_GET["module"]=="start") { 
      $active_home="active";
    } else {
      $active_home="";
    }?>

    <li class="<?php echo $active_home;?>"><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>

    <?php
    if ($_GET["module"]=="animales" || $_GET["module"]=="form_animales") { ?>
      <li class="active"></li>
      <?php
    }

//________________________________________animales___________________________________________________________________________
    if ($_GET["module"]=="animales") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-knight"></i><span>Animales</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="?module=animales"><i class="fa fa-circle-o"></i> Listado animales </a></li>
          <li><a href="?module=razas"><i class="fa fa-circle-o"></i> Razas</a></li>
          <li><a href="?module=colores"><i class="fa fa-circle-o"></i> Colores</a></li>
          <li><a href="?module=lotes"><i class="fa fa-circle-o"></i> Lotes </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="razas") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-knight"></i> <span>Animales</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=animales"><i class="fa fa-circle-o"></i> Listado animales </a></li>
          <li class="active"><a href="?module=razas"><i class="fa fa-circle-o"></i> Razas </a></li>
          <li><a href="?module=colores"><i class="fa fa-circle-o"></i> Colores</a></li>
          <li><a href="?module=lotes"><i class="fa fa-circle-o"></i> Lotes </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="colores") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-knight"></i> <span>Animales</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=animales"><i class="fa fa-circle-o"></i> Listado animales </a></li>
          <li><a href="?module=razas"><i class="fa fa-circle-o"></i> Razas</a></li>
          <li class="active"><a href="?module=colores"><i class="fa fa-circle-o"></i> Colores </a></li>
          <li><a href="?module=lotes"><i class="fa fa-circle-o"></i> Lotes </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="lotes") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-knight"></i> <span>Animales</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=animales"><i class="fa fa-circle-o"></i> Listado animales </a></li>
          <li><a href="?module=colores"><i class="fa fa-circle-o"></i> Colores </a></li>
          <li class="active"><a href="?module=lotes"><i class="fa fa-circle-o"></i> Lotes </a></li>
        </ul>
      </li>
      <?php
    }
    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-knight"></i> <span>Animales</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=animales"><i class="fa fa-circle-o"></i> Listado animales </a></li>
          <li><a href="?module=razas"><i class="fa fa-circle-o"></i> Razas </a></li>
          <li><a href="?module=colores"><i class="fa fa-circle-o"></i> Colores </a></li>
          <li class="active"><a href="?module=lotes"><i class="fa fa-circle-o"></i> Lotes </a></li>
        </ul>
      </li>
      <?php
    }
//___________________________________________________________________________________________________________________
    if ($_GET["module"]=="aforos") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros</a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }

    if ($_GET["module"]=="potreros") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li class="active"><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros</a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="ocupa_potreros") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li class="active"><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros </a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="tipo_ctr_potrero") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros </a></li>
          <li class="active"><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="vegetales") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros </a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li class="active"><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="tipo_vegetales") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion Potreros </a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li class="active"><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-leaf"></i> <span>Praderas</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=aforos"><i class="fa fa-circle-o"></i> Aforos </a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=ocupa_potreros"><i class="fa fa-circle-o"></i> Ocupacion potreros </a></li>
          <li><a href="?module=tipo_ctr_potrero"><i class="fa fa-circle-o"></i> Tipo Control Potreros</a></li>
          <li><a href="?module=potreros"><i class="fa fa-circle-o"></i> Potreros </a></li>
          <li><a href="?module=vegetales"><i class="fa fa-circle-o"></i> Vegetales </a></li>
          <li><a href="?module=tipo_vegetales"><i class="fa fa-circle-o"></i> Tipo Vegetales </a></li>
        </ul>
      </li>
      <?php
    }
//___________________________________________________________________________________________________________________
    if ($_GET["module"]=="pesaje_leche") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-briefcase"></i> <span>Produccion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="?module=pesaje_leche"><i class="fa fa-circle-o"></i> Pesaje de leche </a></li>
          <li><a href="?module=pesaje_ganado"><i class="fa fa-circle-o"></i> Pesaje de ganado</a></li>
          <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte Pesaje Ganado</a></li>
          <li><a href="?module=reporte_pesaje_leche"><i class="fa fa-circle-o"></i> Reporte Pesaje Leche</a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="pesaje_ganado") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-briefcase"></i> <span>Produccion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=pesaje_leche"><i class="fa fa-circle-o"></i> Pesaje de leche </a></li>
          <li class="active"><a href="?module=pesaje_ganado"><i class="fa fa-circle-o"></i> Pesaje de ganado </a></li>
          <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i>Reporte Pesaje Ganado</a></li>
          <li><a href="?module=reporte_pesaje_leche"><i class="fa fa-circle-o"></i> Reporte Pesaje Leche</a></li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"]=="reporte_pesaje_ganado") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-briefcase"></i> <span>Produccion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=pesaje_leche"><i class="fa fa-circle-o"></i> Pesaje de leche </a></li>
          <li><a href="?module=pesaje_ganado"><i class="fa fa-circle-o"></i> Pesaje de ganado </a></li>
          <li class="active"><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte Pesaje Ganado</a></li>
          <li><a href="?module=reporte_pesaje_leche"><i class="fa fa-circle-o"></i> Reporte Pesaje Leche</a></li>
        </ul>
      </li>
      <?php
    }

    elseif ($_GET["module"]=="reporte_pesaje_leche") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-briefcase"></i> <span>Produccion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=pesaje_leche"><i class="fa fa-circle-o"></i> Pesaje de leche </a></li>
          <li><a href="?module=pesaje_ganado"><i class="fa fa-circle-o"></i> Pesaje de ganado </a></li>
          <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte Pesaje Ganado</a></li>
          <li class="active"><a href="?module=reporte_pesaje_leche"><i class="fa fa-circle-o"></i> Reporte Pesaje Leche</a></li>
        </ul>
      </li>
      <?php
    }

    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-briefcase"></i> <span>Produccion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=pesaje_leche"><i class="fa fa-circle-o"></i> Pesaje de leche </a></li>
          <li><a href="?module=pesaje_ganado"><i class="fa fa-circle-o"></i> Pesaje de ganado </a></li>
          <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte Pesaje Ganado</a></li>
          <li><a href="?module=reporte_pesaje_leche"><i class="fa fa-circle-o"></i> Reporte Pesaje Leche</a></li>
        </ul>
      </li>
      <?php
    }

//___________________________________________________________________________________________________________________
    if ($_GET["module"]=="empleados") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-user"></i> <span>Nomina</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="?module=empleados"><i class="fa fa-circle-o"></i> Empleados </a></li>
          <li><a href="?module=proveedores"><i class="fa fa-circle-o"></i> Proveedores</a></li>
        </ul>
      </li>
      <?php
    }
    elseif ($_GET["module"]=="proveedores") { ?>
      <li class="active treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-user"></i> <span>Nomina</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=empleados"><i class="fa fa-circle-o"></i> Empleados </a></li>
          <li class="active"><a href="?module=proveedores"><i class="fa fa-circle-o"></i> Proveedores </a></li>
        </ul>
      </li>
      <?php
    }
    else { ?>
      <li class="treeview">
        <a href="javascript:void(0);">
          <i class="glyphicon glyphicon-user"></i> <span>Nomina</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?module=empleados"><i class="fa fa-circle-o"></i> Empleados </a></li>
          <li><a href="?module=proveedores"><i class="fa fa-circle-o"></i> Proveedores </a></li>
        </ul>
      </li>
      <?php
    }
    if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
      <li class="active"><a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a></li>
      <?php
    }
    else { ?>
      <li><a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a></li>
      <?php
    }
    if ($_GET["module"]=="password") { ?>
      <li class="active"><a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a></li>
      <?php
    }
    else { ?>
      <li><a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a></li>
      <?php
    }
    ?>
  </ul>
  <?php
}

//_________________________________________permisos de gerente___________________________________________________________________
elseif ($_SESSION['permisos_acceso']=='Gerente') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}


  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos</a></li>
            <li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="reporte_pesaje_ganado") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
            <li class="active"><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte pesaje ganado </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i>  Stock de Medicamentos </a></li>
            <li><a href="?module=reporte_pesaje_ganado"><i class="fa fa-circle-o"></i> Reporte Pesaje Ganado </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Almacen') { ?>
  <ul class="sidebar-menu">
    <li class="header">MENU</li>
    <?php 
    if ($_GET["module"]=="start") { ?>
      <li class="active"><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <?php
    }
    else { ?>
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <?php
    }
    if ($_GET["module"]=="password") { ?>
      <li class="active"><a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a></li>
      <?php
    }
    else { ?>
      <li><a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a></li>
      <?php
    }
    ?>
    </ul>
    <?php
  }
?>