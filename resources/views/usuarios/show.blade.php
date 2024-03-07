@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Usuario:  {{$usuario->name}}</h1><br>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body" style="display: block">
                             <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre del usuario</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" disabled autofocus >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" disabled>
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Fecha ingreso</label>
                            <div class="col-md-6">
                                <input id="" type="date" class="form-control  name="fecha_ingreso" value="{{ $usuario->fecha_ingreso }}" disabled >
                            </div>
                        </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{asset('usuarios')}}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
