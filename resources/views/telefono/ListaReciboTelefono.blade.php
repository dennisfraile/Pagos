@extends('layouts.admin')
@section('contenido')
<div class="row">
                <div class="col-lg-12">
                     <ol class="breadcrumb">
                          <li class="active">
                              <i class="fa fa-desktop"></i>
                              	Cancelacion De servicio de Telefono
                            </li>
                        </ol>
                    </div>

                <!-- /.row -->

        <div class="col-lg-12">

        </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2>Lista de recibos de Telefono</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="tablaperfilpuesto">
				<thead>
					<th>NIC</th>
					<th>Fecha de vencimiento</th>
					<th>Monto Total</th>
					<th>Fecha Emision</th>
					<th>Estado</th>
				</thead>
               @foreach ($recibos as $rec)
					<tr>
						<td>{{ $rec->nic}}</td>
						<td>{{ $rec->fecha_vencimiento}}</td>
						<td>{{ $rec->monto_total}}</td>
						<td>{{ $rec->fecha_emision}}</td>
						@if($rec->estado==1)
							<td>Pagado</td>
							<td>
	                        <a href="" data-target="#modal-delete-{{$rec->idrec}}" data-toggle="modal"><button class="btn btn-lg btn-danger" disabled>
	                        <i class="fa fa-credit-card"></i> Pagar</button></a>
						</td>
						@elseif($rec->estado==0)
							<td>Sin pagar</td>
							<td>
		                        <a href="" data-target="#modal-delete-{{$rec->idrec}}" data-toggle="modal"><button class="btn btn-lg btn-danger">
		                        <i class="fa fa-credit-card"></i> Pagar</button></a>
							</td>
							@endif
						<td>

					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
