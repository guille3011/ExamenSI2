@extends('procurador.layouts.template')

@section('title')
     Expedientes
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Expedientes</h6>
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

                                        <a href="{{route('procurador.tramites',$expediente->id)}}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Ver tramites</span>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
