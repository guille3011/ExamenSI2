@extends('admin.layouts.template')
@section('title')
    Crear Nuevo Tipo de Tramite 
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

<form action="{{route('admin.tiposTT.store')}}" method="POST">
 {{ csrf_field() }}
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre</label>
        <input type="text" class="form-control" id="full_name_id" name="nombre" placeholder="Nombre">
    </div>      
    
    <div class="form-group"> <!-- Submit Button -->
        <input type="submit" class="btn btn-primary" value="Agregar">
    </div>     
    
</form>

@endsection