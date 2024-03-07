@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Actualizar datos del usuario</h1><br>

        <div class="row">
            <div class="col-md-6">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li>{{$error}}</li>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Llene los datos</b></h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body" style="display: block">
                        <form action="{{url('/usuarios',$usuario->id)}}" method="post" >
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre del usuario</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ $usuario->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirma contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required   autocomplete="new-password">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{asset('usuarios')}}" class="btn btn-secondary">Cancelar</a>
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
