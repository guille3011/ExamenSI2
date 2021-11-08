@extends('usuario.layouts.template')

@section('title')
    Gestionar Clientes
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
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

                                        <a href="{{route('usuario.cliente.edit',$cliente->id)}}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('usuario.cliente.delete',$cliente->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Eliminar</span>
                                            </button>
                                        </form>
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

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection