@extends('usuario.layouts.template')

@section('content')
    <h1>Bienvenido!</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th>{{$cliente->ci}}</th>
                                <th>{{$cliente->nombre}}</th>
                                <th>{{$cliente->telefono}}</th>
                                <th>

                                    <a href="{{route('usuario.expedientes',$cliente->id)}}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Ver Casos</span>
                                    </a>

                                </th>
                            </tr>
                        @endforeach
                    <tbody>
                </table>
            </div>
           <a href="{{route('usuario.cliente.create')}}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Crear nuevo Cliente</span>
        </a>
        </div>
    </div>

@endsection
