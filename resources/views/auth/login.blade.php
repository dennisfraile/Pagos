@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagos de recibos</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dui') ? ' has-error' : '' }}">
                            <label for="dui" class="col-md-4 control-label">DUI</label>

                            <div class="col-md-6">
                                <input id="dui" type="text" class="form-control" name="dui" value="{{ old('dui') }}" required autofocus>

                                @if ($errors->has('dui'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dui') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label  class="col-md-4 control-label" for="nombre">Numero de targeta:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                
                                
                            </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label" for="nic">Numero de seguridad:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nic" name="numeroUnico">
                                </div>
                            
                            
                        </div>
                    

                        <div class="form-group{{ $errors->has('nic') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">NIC</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('nic'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" href="Form.html">
                                    Ingresar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
