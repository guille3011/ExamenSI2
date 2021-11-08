@extends('usuario.layouts.template')
@section('title')
    Editar Tramite
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
 @endif

<form action="{{route('usuario.tramite.update',array($tramite->id,$expediente->id))}}" method="POST">
 {{ csrf_field() }}
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre</label>
        <input type="text" class="form-control" id="full_name_id" name="nombre" placeholder="Nombre" value="{{$tramite->nombre}}">
    </div>    

    <div>
        <label for="Estado" class="control-label">Tipo de Proceso</label>
        <select class="form-select" name="id_typeprocedure" aria-label="Default select example">
            {{-- <option selected>Selecciona la apunte del apunte</option> --}}
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Fecha Creacion</label>
        <input type="date" id="start" name="fecha_creacion"
        value="{{$expediente->fecha_creacion}}"
         min="2018-01-01" max="2022-12-31">
    </div>                    
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="Estado" class="control-label">Estado</label>
        <select class="form-control" id="cargo_id" name="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="Cerrado">Cerrado</option>
        </select> 
    </div>     
    
    <div class="form-group"> <!-- Submit Button -->
        <input type="submit" class="btn btn-primary" value="Aceptar">
    </div>     
    
</form>

@endsection