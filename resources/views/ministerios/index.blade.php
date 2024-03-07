@extends('layouts.admin')

@section('content')

    <div class="content" style="margin-left: 20px">
        <h1>Listado de ministerios</h1>

        @if($message = Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: "Buen trabajo",
                    text: "{{$message}}",
                    icon: "success"
                });
            </script>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Ministerios registrados</b></h3>
                            <div class="card-tools">
                                <a href="{{url('/ministerios/create')}}" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo ministerio</a>
                            </div>
                        </div>
                        <div class="card-body" style="display: block">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del ministerio</center></th>
                                    <th><center>Descripción</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Fecha de ingreso</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0; ?>
                                @foreach ($ministerios as $ministerio)
                                    <tr>
                                        <td style="text-align: center"><?=$contador + 1;?></td>
                                        <td>{{$ministerio->nombre_ministerio}}</td>
                                        <td>{!! $ministerio->descripcion!!}</td>
                                        <td style="text-align: center">
                                            @if ($ministerio->estado == "0")
                                                <button class="btn btn-warning btn-sm" style="border-radius: 20px">Inactivo</button>
                                            @elseif ($ministerio->estado == "2")
                                                <button class="btn btn-danger btn-sm" style="border-radius: 20px">Eliminado</button>
                                            @else
                                                <button class="btn btn-success btn-sm" style="border-radius: 20px">Activo</button>
                                            @endif
                                        </td>
                                        <td>{{$ministerio->fecha_ingreso}}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('ministerios',$ministerio->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                         	       <a href="{{route('ministerios.edit',$ministerio->id)}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>

                                                <form action="{{url('ministerios',$ministerio->id)}}" method="post" >
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" onclick="return confirm('Está seguro de eliminar este registro')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ministerios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ministerios",
                "infoFiltered": "(Filtrado de _MAX_ total Ministerios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ministerios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
                        </div>
                    </div>

            </div>
        </div>


    </div>

@endsection
