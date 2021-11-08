@extends('usuario.layouts.template')

@section('title')
    Gestionar Tramites
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
                            @foreach ($tramites as $tramite)
                                <tr>
                                    <th>{{$tramite->nombre}}</th>
                                    <th>{{$tramite->fecha_creacion}}</th>
                                    <th>{{$tramite->estado}}</th>
                                    <th>

                                        <a href="{{route('usuario.documentos',$tramite->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Ver Documentos</span>
                                        </a>

                                        <a href="{{route('usuario.tramite.edit',array($tramite->id,$expediente->id))}}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('usuario.tramite.delete',array($tramite->id,$expediente->id))}}" method="POST">
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
               <a href="{{route('usuario.tramite.create',$expediente->id)}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Crear nuevo Tramite</span>
            </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->

@endsection