@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Página principal</h1>
        <div class="row">
            <br>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php  $contador_usuarios = 0; ?>
                        @foreach ($usuarios as $usuario)
                                <?php $contador_usuarios = $contador_usuarios + 1; ?>
                        @endforeach
                        <h3><?=$contador_usuarios;?></h3>
                        <p>Usuarios </p>
                    </div>
                    <div class="icon" >
                        <i class="fas"><i class="bi bi-person-check"></i></i>
                    </div>
                    <a href="{{url('usuarios')}}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                       <?php  $contador_ministerios = 0; ?>
                        @foreach ($ministerios as $ministerio)
                                <?php $contador_ministerios = $contador_ministerios + 1; ?>
                        @endforeach
                        <h3><?=$contador_ministerios;?></h3>
                        <p>Ministerios </p>
                    </div>
                    <div class="icon" >
                        <i class="fas"><i class="bi bi-building"></i></i>
                    </div>
                    <a href="{{url('ministerios')}}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php  $contador_miembros = 0; ?>
                        @foreach ($miembros as $miembro)
                                <?php $contador_miembros = $contador_miembros + 1; ?>
                        @endforeach
                        <h3><?=$contador_miembros;?></h3>
                        <p>Ministerios </p>
                    </div>
                    <div class="icon" >
                        <i class="fas"><i class="bi bi-people-fill"></i></i>
                    </div>
                    <a href="{{url('miembros')}}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php  $contador_asistencias = 0; ?>
                        @foreach ($asistencias as $asistencia)
                                <?php $contador_asistencias = $contador_asistencias + 1; ?>
                        @endforeach
                        <h3><?=$contador_asistencias;?></h3>
                        <p>Asistencias </p>
                    </div>
                    <div class="icon" >
                        <i class="fas"><i class="bi bi-calendar2-week"></i></i>
                    </div>
                    <a href="{{url('asistencias')}}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
