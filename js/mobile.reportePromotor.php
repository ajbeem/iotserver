<?php
$id = $_GET['id'];
ini_set("session.cookie_lifetime", "21600");
session_start();
if(isset($_SESSION['IDusuario'])){
	$idUsuario = $_SESSION['IDusuario'];
	$idSeguimiento = $_SESSION['idSeguimientoReporte'];
}else{
	header("location:../returned.index.php?mensaje=sesionEnded");
}
date_default_timezone_set('America/Mexico_city');
$fechaActual = date("d-m-Y");
$horaActual = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Formulario de activaci&oacute;n de promoci&oacute;n</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/toastr.css">
<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/toastr.js"></script>
<script src="../js/capturarFirma.js"></script>

</head>

<body>
	<header class="container">
		<marquee bgcolor="0055a0">
			<img alt="right" src="../images/logoVyBchico.png" /> <img
				alt=":right" src="../images/logoIRectangularCEE.png" />
		</marquee>
	</header>
	<div class="container">
		<!-- <form action="recibir.php" method="POST" id="formCapturaDatos">-->
		<!--form name="registroUsuario" method="post" action="./pdfReportCreator_V1.5.php" enctype="multipart/form-data"-->
		<!-- <form name="registroUsuario" method="post" action="./constructorTablas.php" enctype="multipart/form-data"> -->
		<form name="registroUsuario" method="post"
			action="./datosReportePromotor.php" enctype="multipart/form-data" onsubmit="comprobarCamposPromotor()">
			<h3 style="text-align: center;">Reporte de promoci&oacute;n</h3>
			<div class="form-group">
                <label for="cmpIdReporteSeguimiento" class="control-label">Folio Reporte: <?=$idSeguimiento?></label>
                <input type="text" class="form-control" name="cmpIdReporteSeguimiento" id="cmpIdReporteSeguimiento" readonly value="<?=$idSeguimiento?>" hidden>
            </div>
			<div class="form-group">
				<label for="fechaActual">Fecha actual: <?php echo $fechaActual ?></label>
				<input type="datetime" class="form-control" id="cmpfechaActual"
					name="cmpfechaActual" value="<?php echo $fechaActual ?>" hidden>
			</div> 
			<div class="form-group">
				<label for="cmpHoraEntrada">Hora de entrada: <?= $horaActual ?></label>
				<input type="text" value="<?php echo $horaActual ?>"
					class="form-control" id="cmpHoraEntrada" name="cmpHoraEntrada" hidden>
			</div>

			<div class="form-group">
				<h3>Datos del Promotor</h3>
				<label for="cmpNombrePromotor">Nombre Completo:</label> <input
					type="text" class="form-control" id="cmpNombrePromotor"
					name="cmpNombrePromotor" required>
			</div>

			<div class="form-group">
				<label for="cmpEmailPromotor">Correo Electr&oacute;nico:</label> <input
					type="email" class="form-control" id="cmpEmailPromotor"
					name="cmpEmailPromotor" required>
			</div>

			<div class="form-group" hidden>
			<label for="cmpIdPromotor">Id Usuario:</label> <input
					type="text" class="form-control" id="cmpIdPromotor"
					name="cmpIdPromotor" readonly value="<?php echo $idUsuario?>">
			</div>
			
			
			<div class="form-group">
				<h3>Datos de Tienda</h3>
				<label for="cmpNombreTienda">Tienda:</label> <input type="text"
					class="form-control" id="cmpNombreTienda" name="cmpNombreTienda"> <label
					for="cmpUbicacionPt1_calleNumero">Direcci&oacute;n de la Tienda:</label>
				<input type="text" class="form-control"
					id="cmpUbicacionPt1_calleNumero" name="cmpUbicacionPt1_calleNumero" required>
			</div>

			<div class="form-group">
				<label for="cmpUbicacionPt2_ciudad">Ciudad:</label> <select
					class="form-control" id="cmpUbicacionPt2_ciudad"
					name="cmpUbicacionPt2_ciudad">
					<option value=""></option>
					<option value="Acapulco">Acapulco</option>
					<option value="Aguascalientes">Aguascalientes</option>
					<option value="Cancun">Cancun</option>
					<option value="Cd.Cuauhtemoc">Cd.Cuauht&eacute;moc</option>
					<option value="Cd.De Mexico">Cd. De M&eacute;xico</option>
					<option value="Cd. Juarez">Cd. Ju&aacute;rez</option>
					<option value="Cd. Mante">Cd. Mante</option>
					<option value="Cd. Obregon">Cd. Obreg&acute;n</option>
					<option value="Cd. Valles">Cd. Valles</option>
					<option value="Cd. Victoria">Cd. Victoria</option>
					<option value="Celaya">Celaya</option>
					<option value="Chiuhaua">Chiuhaua</option>
					<option value="Colima, Col.">Colima, Col.</option>
					<option value="Cuernavaca">Cuernavaca</option>
					<option value="Culiacan">Culiac&aacute;n</option>
					<option value="Delicias">Delicias</option>
					<option value="Durango">Durango</option>
					<option value="Ensenada">Ensenada</option>
					<option value="Guadalajara">Guadalajara</option>
					<option value="Guaymas">Guaymas</option>
					<option value="Hermosillo">Hermosillo</option>
					<option value="La Paz">La Paz</option>
					<option value="Leon">Leon</option>
					<option value="Los Cabos">Los Cabos</option>
					<option value="Los Mochis">Los Mochis</option>
					<option value="Manzanillo">Manzanillo</option>
					<option value="Matamoros">Matamoros</option>
					<option value="Mazatlan">Mazatl&aacute;n</option>
					<option value="Merida">Merida</option>
					<option value="Mexicali">Mexicali</option>
					<option value="Monclova">Monclova</option>
					<option value="Monterrey">Monterrey</option>
					<option value="Morelia">Morelia</option>
					<option value="Nogales">Nogales</option>
					<option value="Nogales - Agua Prieta">Nogales - Agua Prieta</option>
					<option value="Nogales - Caborca">Nogales - Caborca</option>
					<option value="Nogales - Santa Ana">Nogales - Santa Ana</option>
					<option value="Oaxaca">Oaxaca</option>
					<option value="Pachuca">Pachuca</option>
					<option value="Parral">Parral</option>
					<option value="Piedras Negras">Piedras Negras</option>
					<option value="Poza Rica">Poza Rica</option>
					<option value="Pto. Vallarta">Pto. Vallarta</option>
					<option value="Puebla">Puebla</option>
					<option value="Quer&eacute;taro">Quer&eacute;taro</option>
					<option value="Reynosa">Reynosa</option>
					<option value="Saltillo">Saltillo</option>
					<option value="San Juan Del R&iacute;o">San Juan Del R&iacute;o</option>
					<option value="San Luis Potos&iacute;">San Luis Potos&iacute;</option>
					<option value="Tampico">Tampico</option>
					<option value="Tepic">Tepic</option>
					<option value="Tecate">Tecate</option>
					<option value="Tijuana">Tijuana</option>
					<option value="Toluca">Toluca</option>
					<option value="Torreon">Torre&oacute;n</option>
					<option value="Tulancingo">Tulancingo</option>
					<option value="Tuxpan">Tuxpan</option>
					<option value="Tuxtla Gutierrez">Tuxtla Gutierrez</option>
					<option value="Veracruz">Veracruz</option>
					<option value="Villahermosa">Villahermosa</option>
					<option value="Xalapa">Xalapa</option>
					<option value="Zacatecas">Zacatecas</option>
					<option value="Zumpango">Zumpango</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="cmpUbicacionPt3_estado">Estado:</label> <select
					class="form-control" id="cmpUbicacionPt3_estado"
					name="cmpUbicacionPt3_estado">
					<option value=""></option>
					<option value="Aguascalientes">Aguascalientes</option>
					<option value="Baja California">Baja California</option>
					<option value="Baja California Sur">Baja California Sur</option>
					<option value="Campeche">Campeche</option>
					<option value="Cd.De Mexico">Cd. De México</option>
					<option value="Chiapas">Chiapas</option>
					<option value="Chihuahua">Chihuahua</option>
					<option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
					<option value="Colima">Colima</option>
					<option value="Durango">Durango</option>
					<option value="EstadodeM&eacute;xico">Estado de M&eacute;xico</option>
					<option value="Guanajuato">Guanajuato</option>
					<option value="Guerrero">Guerrero</option>
					<option value="Hidalgo">Hidalgo</option>
					<option value="Jalisco">Jalisco</option>
					<option value="Michoac&aacute;n de Ocampo">Michoac&aacute;n de
						Ocampo</option>
					<option value="Morelos">Morelos</option>
					<option value="Nayarit">Nayarit</option>
					<option value="Nuevo Le&oacute;n">Nuevo Le&oacute;n</option>
					<option value="Oaxaca">Oaxaca</option>
					<option value="Puebla">Puebla</option>
					<option value="Quer&eacute;taro">Quer&eacute;taro</option>
					<option value="Quintana Roo">Quintana Roo</option>
					<option value="San Luis Potos&iacute;">San Luis Potos&iacute;</option>
					<option value="Sinaloa">Sinaloa</option>
					<option value="Sonora">Sonora</option>
					<option value="Tabasco">Tabasco</option>
					<option value="Tamaulipas">Tamaulipas</option>
					<option value="Tlaxcala">Tlaxcala</option>
					<option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio
						de la Llave</option>
					<option value="Yucat&eacute;n">Yucat&eacute;n</option>
					<option value="Zacatecas">Zacatecas</option>
				</select>
			</div>
			
			<div class="form-group">
				<h4 class="text-center">Reporte de materiales</h4>
				<h6 class="text-justify">Estimado Promotor realiza una
					evaluaci&oacute;n de las condiciones,en que recibes los materiales
					para tu activaci&oacute;n. Si requieres notificar algo adicional
					agr&eacute;galo en los comentarios.</h6>
			</div>
			<div class="form-group">
				<label for="cmpEstadoPantalonAzulConTirantes">Pantalon de color azul con
					tirantes:</label> <select class="form-control" id="cmpEstadoPantalonAzulConTirantes"
					name="cmpEstadoPantalonAzulConTirantes">
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpEstadoDechalecoDeEspuma">Chaleco de espuma:</label> <select
					class="form-control" id="cmpEstadoDechalecoDeEspuma"
					name="cmpEstadoDechalecoDeEspuma">
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="cmpEstadoSudadera">Sudadera de color rojo con el logotipo
					de ICEE:</label> <select class="form-control" id="cmpEstadoSudadera"
					name="cmpEstadoSudadera">
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpEstadoGuantesBlancos">Guantes blancos:</label> <select
					class="form-control" id="cmpEstadoGuantesBlancos"
					name="cmpEstadoGuantesBlancos">
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpEstadoCubreZapatos">Cubre zapatos de peluche blancos:</label>
				<select class="form-control" id="cmpEstadoCubreZapatos"
					name="cmpEstadoCubreZapatos">
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="cmpEstadoCabezaDeOso">Cabeza de oso de fibra de vidrio con
					peluche:</label> <select class="form-control"
					id="cmpEstadoCabezaDeOso" name="cmpEstadoCabezaDeOso" required>
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpEstadoDeLentesMetalicos">Lentes negros met&aacute;licos:</label>
				<select class="form-control" id="cmpEstadoDeLentesMetalicos"
					name="cmpEstadoDeLentesMetalicos" required>
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpArosDePlastico">3 aros de pl&aacute;stico:</label> <select
					class="form-control" id="cmpArosDePlastico" name="cmpArosDePlastico"
					required>
					<option value=""></option>
					<option value="bueno">Bueno</option>
					<option value="regular">Regular</option>
					<option value="malo">Malo</option>
					<option value="noEntregado">No entregado</option>
					<option value="incompletos">Incompletos</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="cmpCuponeras">2 cuponeras de 200 piezas cada una:</label> <select
					class="form-control" id="cmpCuponeras" name="cmpCuponeras" required>
					<option value=""></option>
					<option value="entregado">Entregados</option>
					<option value="noEntregado">No entregados</option>
					<option value="incompleto">Incompletos</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpEntregaVasos2oz">400 vasos de 2oz:</label> <select
					class="form-control" id="cmpEntregaVasos2oz" name="cmpEntregaVasos2oz" required>
					<option value=""></option>
					<option value="entregado">Entregados</option>
					<option value="noEntregado">No entregados</option>
					<option value="incompleto">Incompletos</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpGlobosIcee">Globos con la Marca de ICEE:</label> <select
					class="form-control" id="cmpGlobosIcee" name="cmpGlobosIcee">
					<option value=""></option>
					<option value="entregado">Entregados</option>
					<option value="noEntregado">No entregados</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpLitrosJarabeEntregados">2 litros de jarabe entregados al
					cliente:</label> <select class="form-control"
					id="cmpLitrosJarabeEntregados" name="cmpLitrosJarabeEntregados">
					<option value=""></option>
					<option value="entregado">Entregados</option>
					<option value="noEntregado">No entregados</option>
					<option value="incompleto">Incompletos</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cmpLitrosJarabeEntregadosAlCliente">Cantidad de litros de
					jarabe entregados al cliente,coloca la cantidad en litros:</label>
				<input type="number" name="cmpLitrosJarabeEntregadosAlCliente"
					id="cmpLitrosJarabeEntregadosAlCliente" min="0" max="999" required>
			</div>
			<div class="form-group">
				<label for="cmpCantidadVasosEntregados">Anota la Cantidad de vasos de 2oz que te fueron entregados:</label>
				<input type="number" class="form-control"
					name="cmpCantidadVasosEntregados" id="cmpCantidadVasosEntregados"
					min="0" max="999" required>
			</div>
			
			<div class="form-group">
				<label for="cmpComentariosBotarguero">Comentarios:</label>
				<textarea name="cmpComentariosBotarguero" id="cmpComentariosBotarguero"
					style="width: 100%; resize: none;" rows="2" maxlength="500" required></textarea>
			</div>
			<div class="form-group">
				<div class="table-responsive-sm">
					<table class="table" style="overflow: hidden;">
						<thead>
							<tr>
								<th></th>
								<th></th>
							</tr>	
						</thead>
						<tbody>
							<tr>
								<td colspan="2">
									<button type="submit" class="btn btn-primary" name="enviarReportePromotor"
										id="enviarReportePromotor">Enviar Reporte</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</body>
<script src="../js/validarCamposPromotor.js"></script>
</html>
