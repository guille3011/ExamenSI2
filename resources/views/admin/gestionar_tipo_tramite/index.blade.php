@extends('admin.layouts.template')

@section('title')
    Gestionar Tipo de Tramites
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                            @foreach ($tipos as $tipo)
                                <tr>
                                    <th>{{$tipo->nombre}}</th>
                                    <th>
                                        <a href="{{route('admin.tiposTT.edit',$tipo->id)}}" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Editar</span>
                                        </a>

                                        <form action="{{route('admin.tiposTT.delete',$tipo->id)}}" method="POST">
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
               <a href="{{route('admin.tiposTT.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Crear nuevo tipo de tramite</span>
            </a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection