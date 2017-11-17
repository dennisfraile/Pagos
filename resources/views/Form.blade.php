<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('/css/estilos.css')}}">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<title>Datos del recibo</title>
</head>
<body>
	<div class="contenedor-formulario">
		<div class="wrap">
			<form action="" class="formulario" name="formulario_registro" method="get">
				<div class="row">
					<div class="form-group col-md-6">
							<div class="input-group">
								<input type="text" id="nombre" name="nombre" readonly="readonly">
								<label class="label" for="nombre">Usuario:</label>
							</div>
							<div class="input-group">
								<input type="text" id="nic" name="numeroUnico" readonly="readonly">
								<label class="label" for="nic">NIC:</label>
							</div>
							<div class="input-group">
								<input type="text" id="nic" name="numeroUnico" readonly="readonly">
								<label class="label" for="nic">Estado:</label>
							</div>
						
							<div class="input-group">
								<input type="text" id="total" name="total">
								<label class="label" for="total">Total consumido:</label>
							</div>
							<div class="input-group">
								<input type="text" id="fecha" name="fecha">
								<label class="label" for="fecha">Fecha de vencimiento:</label>
							</div>
							<div class="input-group">
								<input type="text" id="Tpago" name="Tpago">
								<label class="label" for="Tpago">Total a pagar:</label>
							</div>
					</div>
					
					
						
					<input type="submit" id="btn-submit" value="Pagar">
				</div>
			</form>
		</div>
	</div>

	<script src="{{asset('js/formulario.js')}}"></script>
</body>
</html>