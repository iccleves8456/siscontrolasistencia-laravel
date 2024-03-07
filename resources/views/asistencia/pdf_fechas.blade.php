<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de asistencia</title>
</head>

<bodi>
    <br>
    <h1>Reporte de asistencias por fechas</h1>
    <table id="example1" class="table table-striped table-bordered table-hover table-sm" border="1">
        <thead class="thead">
        <tr>
            <th>No</th>

            <th>Fecha</th>
            <th>Nombre y apellido del miembro</th>
        </tr>
        </thead>
        <tbody>
            <?php $contador = 0;?>
            @foreach ($asistencias as $asistencia)
            <tr>
                <td><?=$contador = $contador + 1;?></td>
                <td>{{ $asistencia->fecha }}</td>
                <td>{{ $asistencia->miembro->nombre_apellido }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

</bodi>
</html>
