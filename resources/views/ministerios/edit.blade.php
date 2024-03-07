@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Actualizar datos del ministerio</h1><br>

        <div class="row">
            <div class="col-md-11">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li>{{$error}}</li>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Llene los datos</b></h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body" style="display: block">
                        <form action="{{url('/ministerios',$ministerio->id)}}" method="post" >
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Nombre del ministerio</label><b>*</b>
                                                <input type="text" name="nombre_ministerio" value="{{$ministerio->nombre_ministerio}}" class="form-control" required>
                                                @error('nombre_ministerio')
                                                <small style="color: red">Este campo es requerido</small>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha de ingreso</label><b>*</b>
                                                <input type="date" name="fecha_ingreso" value="{{$ministerio->fecha_ingreso}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción</label><b>*</b>
                                                <textarea name="descripcion" id="" class="form-control"  cols="30" rows="5">{!! $ministerio->descripcion !!}</textarea>
                                                <script>
                                                    CKEDITOR.replace('descripcion');
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{asset('ministerios')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
