@extends('usuario.layouts.template')
@section('title')
    Editar Cliente
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

<form action="{{route('usuario.cliente.update', $cliente->id)}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">CI</label>
        <input type="text" class="form-control" id="full_name_id" name="ci" placeholder="Nro de carnet" value="{{$cliente->ci}}"> 
    </div>    

    <div class="form-group"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Nombre completo</label>
        <input type="text" class="form-control" id="street1_id" name="nombre" placeholder="Nombre " value="{{$cliente->nombre}}">
    </div>                    
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="street2_id" class="control-label">Telefono</label>
        <input type="text" class="form-control" id="street2_id" name="telefono" placeholder="Telefono" value="{{$cliente->telefono}}">
    </div>                                          
    
    <div class="form-group"> <!-- Submit Button -->
        <input type="submit" class="btn btn-primary" value="Aceptar">
    </div>     
    
</form>

@endsection