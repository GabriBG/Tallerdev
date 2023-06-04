@extends('layouts.app', ['page' => ('Docentes'),'pageSlug' => 'crearP'])

@section('content')
<h1>Docentes</h1>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> <h4>Ingresar Docente</h4>
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error) <li>{{$error}}</li>
@endforeach
</ul> </div>
@endif
    </div>
</div>
{!!Form::open(array('url'=>'docente','method'=>'POST','autocomplete'=>'off') )!!}
{{Form::token()}}

<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12"> <div class="form-group">
<label for="email">Nombre de usuario</label>
<input type="text" name="username" value="{{ isset($users->username)?$users->username:old('username') }}" id="username" class="form-control" placeholder="Nombre de usuario">
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="email">Contraseña</label>
<input type="text" name="password" value="{{ isset($users->password)?$users->password:old('password') }}" id="password" class="form-control" placeholder="Contraseña">
        </div>
    </div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="documento">Numero Documento</label>
<input type="number" name="documento_identidad" value="{{ isset($personas->documento_identidad)?$personas->documento_identidad:old('documento_identidad') }}" id="documento_identidad" class="form-control" placeholder="Digite el número Documento"> </div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="nombre">Nombres</label>
<input type="text" name="nombre" value="{{ isset($personas->nombre)?$personas->nombre:old('nombre') }}" id="nombre" class="form-control" placeholder="Nombre Completo">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="apellido">Apellidos</label>
<input type="text" name="apellido" value="{{ isset($personas->apellido)?$personas->apellido:old('apellido') }}" id="apellido" class="form-control" placeholder="Apellidos Completos">
</div>
    </div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12"> <div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" value="{{ isset($users->email)?$users->email:old('email') }}" id="email" class="form-control" placeholder="Correo Electrónico">
        </div>
    </div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="email">Telefono</label>
<input type="text" name="telefono" value="{{ isset($personas->telefono)?$personas->telefono:old('telefono') }}" id="telefono" class="form-control" placeholder="Telefono">
        </div>
    </div>

<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
<div class="form-group">

    <label for="role">Rol:</label>
    <select name="role" id="role" class="form-control">
            <option value="2">
                Docente
            </option>
    </select>
<br>
<button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection
