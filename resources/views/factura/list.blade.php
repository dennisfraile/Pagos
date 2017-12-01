@extends('layouts.admin')
@section('contenido')
<div class="row">
                <div class="col-lg-12">
                     <ol class="breadcrumb">
                          <li class="active">
                              <i class="fa fa-desktop"></i>
                              	Facturas realizadas
                            </li>
                        </ol>
                    </div>

                <!-- /.row -->

        <div class="col-lg-12">

        </div>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2>Lista de facturas realizadas</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="tablaperfilpuesto">
				<thead>
					<th>Fecha</th>
					<th>Total cancelado</th>
					<th>Descripcion</th>
				</thead>
               @foreach ($facturas as $f)
					<tr>
						<td>{{ $f->fecha}}</td>
						<td>{{ $f->total_cancelado}}</td>
						<td>{{ $f->descripcion}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
