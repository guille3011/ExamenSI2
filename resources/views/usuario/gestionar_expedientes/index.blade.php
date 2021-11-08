@extends('usuario.layouts.template')

@section('title')
    Gestionar Expedientes
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
                                <th>Nombre</th>
                                <th>Fecha Creacion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                            @foreach ($expedientes as $expediente)
                                <tr>
                                    <th>{{$expediente->nombre}}</th>
                                    <th>{{$expediente->fecha_creacion}}</th>
                                    <th>{{$expediente->estado}}</th>
                                    <th>

                                        <a href="{{route('usuario.tramites',$expediente->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Ver tramites</span>
                                        </a>

                                        <a href="{{route('usuario.expediente.edit',array($expediente->id,$cliente->id))}}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('usuario.expediente.delete',array($expediente->id,$cliente->id))}}" method="POST">
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
               <a href="{{route('usuario.expediente.create', $cliente->id)}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Crear nuevo Expediente</span>
            </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection