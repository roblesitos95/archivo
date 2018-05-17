<?php
	include "db.php";
	///consultamos a la base
	$consulta = "SELECT * FROM chat ORDER BY id asc ";
	$ejecutar = $conexion->query($consulta);
	$class;
	while($fila = $ejecutar->fetch_array()) :
        if ($fila["nombre"]=="camilo"){
	    $class="msg_a";
        }else{
	    $class="msg_b";
        }

?>
	<div id="datos-chat">
        <div class="<?php echo $class; ?>"><?php echo $fila['mensaje']; ?></div>
		<span style="float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>
	</div>
	
	<?php endwhile; ?>
