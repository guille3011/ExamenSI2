@extends('procurador.layouts.template')

@section('title')
    Gestionar Documentos
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
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Documento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                            @foreach ($documentos as $documento)
                                <tr>
                                    <th>{{$documento->nombre}}</th>
                                    <th>{{$documento->descripcion}}</th>
                                    <td>
                                        <img style="width: 50%" src="{{ asset('/storage/' . $documento->url_imagen) }}"
                                            alt="...">
                                    </td>
                                    <td>
                                        <a href="{{ asset('/storage/' . $documento->url_archivo) }}">
                                            Archivo...
                                        </a>
                                    </td>
                                    <th>
                                        <a href="{{route('procurador.documento.edit',array($documento->id,$tramite->id))}}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('procurador.documento.delete',array($documento->id,$tramite->id))}}" method="POST">
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
               <a href="{{route('procurador.documento.create', $tramite->id)}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Crear nuevo Documento</span>
            </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->

@endsection