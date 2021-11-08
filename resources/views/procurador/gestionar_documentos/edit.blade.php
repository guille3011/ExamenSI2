@extends('procurador.layouts.template')

@section('title')
    Editar Documento
@endsection

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Documento</h1>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user" action="{{ route('procurador.documento.update', array($documento->id,$tramite->id)) }}" method="POST" 
                            enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="nombre" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Nombre" value="{{$documento->nombre}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="5">
                                        {{ $documento->descripcion }}
                                    </textarea>
                                </div>

                                @if (!is_null($documento->url_imagen))
                                    <img style="width: 50%" src="{{ asset('/storage/' . $documento->url_imagen) }}"
                                        alt="...">
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Imagen</label>
                                    <input type="file" name="url_imagen" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Seleccione la imagen..."
                                        accept=".jpg, .jpeg, .png">
                                </div>

                                @if (!is_null($documento->url_archivo))
                                    <a href="{{ $documento->url_archivo }}">
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Archivo</label>
                                    <input type="file" name="url_archivo" class="form-control form-control"
                                        id="exampleInputEmail" placeholder="Seleccione el archivo...">
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Aceptar">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection