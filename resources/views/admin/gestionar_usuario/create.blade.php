@extends('admin.layouts.template')
@section('title')
    Crear Nuevo Usuario
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

<form action="{{route('admin.usuario.store')}}" method="POST">
 {{ csrf_field() }}
    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre Completo</label>
        <input type="text" class="form-control" id="full_name_id" name="name" placeholder="Nombre completo">
    </div>    

    <div class="form-group"> <!-- Street 1 -->
        <label for="street1_id" class="control-label">Email</label>
        <input type="email" class="form-control" id="street1_id" name="email" placeholder="Email">
    </div>                    
                            
    <div class="form-group"> <!-- Street 2 -->
        <label for="street2_id" class="control-label">Password</label>
        <input type="password" class="form-control" id="street2_id" name="password" placeholder="Password">
    </div>                                       
                            
    <div class="form-group"> <!-- Cargo-->
        <label for="Cargo" class="control-label">Cargo</label>
        <select class="form-control" id="cargo_id" name="cargo">
            <option value="Abogado">Abogado</option>
            <option value="Procurador">Procurador</option>
        </select>                    
    </div>   
    
    <div class="form-group"> <!-- Submit Button -->
        <input type="submit" class="btn btn-primary" value="Agregar">
    </div>     
    
</form>

@endsection