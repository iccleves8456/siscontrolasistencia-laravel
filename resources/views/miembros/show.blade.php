@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Datos del miembro registrado</h1><br>


        <div class="row">
            <div class="col-md-11">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos registrados</b></h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body" style="display: block">
                          @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombres y apellidos</label>
                                                <input type="text" name="nombre_apellido"  value="{{$miembro->nombre_apellido}}" class="form-control" required>
                                               </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <input type="text" name="direccion" value="{{$miembro->direccion}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Teléfono</label>
                                                <input type="number" name="telefono" value="{{$miembro->telefono}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Fecha nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" value="{{$miembro->fecha_nacimiento}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Género</label>
                                                <select name="genero" class="form-control" required>
                                                    @if($miembro->genero == 'MASCULINO')
                                                         <option value="MASCULINO">MASCULINO</option>
                                                         <option value="FEMENINO">FEMENINO</option>
                                                    @else
                                                        <option value="FEMENINO">FEMENINO</option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" value="{{$miembro->email}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Ministerio</label>
                                                <input type="text" name="ministerio" value="{{$miembro->ministerio}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fotografia</label>
                                        <br>
                                        <center>
                                        @if($miembro->fotografia == '')
                                            @if($miembro->genero == 'MASCULINO')
                                                    <img src="{{url('images/avatar_masculino.jpg')}}" width="150px" alt="">
                                                @else
                                                    <img src="{{url('images/avatar_femenino.jpg')}}" width="150px" alt="">
                                                @endif
                                        @else
                                            <img src="{{asset('storage'.'/'.$miembro->fotografia)}}" width="150px" alt="">
                                        @endif
                                        </center>
                                    </div>
                                </div>
                            </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{asset('miembros')}}" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
