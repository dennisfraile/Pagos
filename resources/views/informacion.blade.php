@extends('layouts.admin')
@section('contenido')
<h2 class="text-center">Informacion sobre el sistema</h2>
<br>
<font face="calabri" size="5">
	<p>
		Nuestro sistema permite a todos los usuarios registrados poder cancelar servicios basicos como luz, telefono, agua e internet.
	</p>
	
	<p>
		No asi poder ingresar facturas de los servicios anteriormente descritos, debido a que esta fuera de los limites del sistema (haciendo caso o miso que la inserccion de facturas es otro sistema).
	</p>

    <p>
    	Se muestra un listado de cada una de las facturas haciendo distincion del tipo de servicio de la factura, para poder utilizar nuestro servicio de cancelacion se debe iniciar secion con el dui del usuario y su numero de targeta y numero de seguridad.
	</p>
</font>


@endsection