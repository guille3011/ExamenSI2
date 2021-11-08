@extends('usuario.layouts.template')

@section('title')
     Documentos
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
                                </tr>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->

@endsection