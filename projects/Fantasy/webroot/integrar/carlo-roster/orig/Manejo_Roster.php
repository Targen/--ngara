<?php
require_once("Clases/fachadaInterface.php");
date_default_timezone_set('America/Caracas');
$instancia = fachadaInterface::singleton();

//Siempre la Entrada para Especificar el Roster (id)
$ID_Roster  = $_POST['id'];
$ID_Equipo  = isset($_POST['id_Equipo'] ) ? $_POST['id_Equipo'] : -1;
$ID_Jugador = isset($_POST['id_Jugador']) ? $_POST['id_Jugador'] : -1;
$POSICION   = isset($_POST['posicion_jugador']) ? $_POST['posicion_jugador'] : -1;


unset($_POST);


if($ID_Equipo != -1){//Agregar Equipo de Lanzadores
    
    $_POST['TIPO']='Equipo';
    $_POST['id']=$ID_Equipo;
    $Equipo = $instancia->obtener();
    unset($_POST);    
    
    $_POST['TIPO']='Roster_Equipo';
    $_POST['roster']=$ID_Roster;
    $_POST['equipo']=$Equipo->id;
    $_POST['fecha_compra_equipo'] = date("d/m/Y H:i:s");
    $_POST['precio_compra_equipo'] = $Equipo->precio;
    $_POST['equipo_activo'] = true;
    $instancia->insertar();
/*
//Eliminar Equipo Lanzadores (carlo)
    
    

    $_POST['TIPO']='Roster_Equipo';
    $_POST['roster']=$ID_Roster;
    $Roster_Equipo = $instancia->obtener();
    unset($_POST);
     
    $_POST['TIPO']='Roster';
    $_POST['id']=$ID_Roster;
    $Roster = $instancia->obtener();
    unset($_POST);
    
    $_POST['TIPO']='Manager';
    $_POST['id']=$Roster->manager;
    $Manager = $instancia->obtener();
    unset($_POST);
    
	$pv=$Roster_Equipo->precio_compra_equipo;
	$_POST['creditos']= $Manager->creditos + $pv;
	$_POST['TIPO']='Manager';
    $_POST['id']=$Manager->id;
    $_POST['puntaje']=$Manager->puntaje;
    $_POST['usuario'] = $Manager->usuario;
	$instancia->actualizar();
	unset($_POST);
	
    $_POST['TIPO']='Roster_Equipo';
    $_POST['roster']=$ID_Roster;
    $_POST['id']=$Roster_Equipo->id;
	$instancia->eliminar();

//Renegociar Equipo Lanzadores (carlo)
    $_POST['TIPO']='Roster_Equipo';
    $_POST['roster']=$ID_Roster;
    $Roster_Equipo = $instancia->obtener();
    unset($_POST); 

    $_POST['TIPO']='Roster';
    $_POST['id']=$ID_Roster;
    $Roster = $instancia->obtener();
    unset($_POST);
    
    $_POST['TIPO']='Manager';
    $_POST['id']=$Roster->manager;
    $Manager = $instancia->obtener();
    unset($_POST);
    
	$pn=$Equipo->precio;
	$pv=$Roster_Equipo->precio_compra_equipo;
    if($pv>$pn){
			$_POST['creditos']= $Manager->creditos + $pv - $pn;
	}else{ 
		$_POST['creditos']= $Manager->creditos 
	}
	$_POST['TIPO']='Manager';
    $_POST['id']=$Manager->id;
    $_POST['puntaje']=$Manager->puntaje;
    $_POST['usuario'] = $Manager->usuario;
	$instancia->actualizar();
	*/
/////////////// Fin
}

if($ID_Jugador != -1){//Agregar Jugador
    
    
    $_POST['TIPO']='Jugador';
    $_POST['id']  =$ID_Jugador;
    $Jugador = $instancia->obtener();
    
    $_POST['TIPO']='Roster_Jugador';
    $_POST['roster']=$ID_Roster;
    $_POST['jugador']=$Jugador->id;
    $_POST['fecha_compra_jugador'] = date("d/m/Y H:i:s");
    $_POST['precio_compra_jugador'] = $Jugador->precio;
    $_POST['jugador_activo'] = true;
    $_POST['posicion_jugador'] = $POSICION;
    
    $instancia->insertar();
    
    
    //Eliminar Jugador (carlo)
    
    /*

    $_POST['TIPO']='Roster_Jugador';
    $_POST['roster']=$ID_Roster;
    $Roster_Jugador = $instancia->obtener();
    unset($_POST);
     
    $_POST['TIPO']='Roster';
    $_POST['id']=$ID_Roster;
    $Roster = $instancia->obtener();
    unset($_POST);
    
    $_POST['TIPO']='Manager';
    $_POST['id']=$Roster->manager;
    $Manager = $instancia->obtener();
    unset($_POST);
    
	$pv=$Roster_Jugador->precio_compra_jugador;
	$_POST['creditos']= $Manager->creditos + $pv;
	$_POST['TIPO']='Manager';
    $_POST['id']=$Manager->id;
    $_POST['puntaje']=$Manager->puntaje;
    $_POST['usuario'] = $Manager->usuario;
	$instancia->actualizar();
	unset($_POST);
	
    $_POST['TIPO']='Roster_Jugador';
    $_POST['roster']=$ID_Roster;
    $_POST['id']=$Roster_Jugador->id;
	$instancia->eliminar();

//Renegociar Jugador (carlo)
    $_POST['TIPO']='Roster_Jugador';
    $_POST['roster']=$ID_Roster;
    $Roster_Jugador = $instancia->obtener();
    unset($_POST); 

    $_POST['TIPO']='Roster';
    $_POST['id']=$ID_Roster;
    $Roster = $instancia->obtener();
    unset($_POST);
    
    $_POST['TIPO']='Manager';
    $_POST['id']=$Roster->manager;
    $Manager = $instancia->obtener();
    unset($_POST);
    
	$pn=$Jugador->precio;
	$pv=$Roster_Jugador->precio_compra_equipo;
    if($pv>$pn){
			$_POST['creditos']= $Manager->creditos + $pv - $pn;
	}else{ 
		$_POST['creditos']= $Manager->creditos 
	}
	$_POST['TIPO']='Manager';
    $_POST['id']=$Manager->id;
    $_POST['puntaje']=$Manager->puntaje;
    $_POST['usuario'] = $Manager->usuario;
	$instancia->actualizar();
*/
/////////////// Fin
}

?>

<form action="InterfaceRoster.php" method="post" name="MyForm">
    <input type="hidden" name="id" value="<?php echo $ID_Roster; ?>" />
</form>

<script type="text/javascript" language="JavaScript">
    document.MyForm.submit();
</script>
