@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <?php //var_dump($processes);  ?>
    <div class="row">
        <div class="col-md-6">
            <h3>Datos Generales</h3>
            <span><b>ID Procedimiento:</b> @php echo $processes->processes_id @endphp </span><br>
            <span><b>Departamento:</b> @php echo $processes->department @endphp </span><br>
            <span><b>Municipio:</b> @php echo $processes->municipality @endphp </span><br>
            <span><b>Descripcion:</b> @php echo $processes->description @endphp </span><br>
            <span><b>Estado:</b> @php echo $processes->state_id @endphp </span><br>
        </div>

        <div class="col-md-6">
            <h3>Cargar Documentos</h3>
            <p>imagenes...</p>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Fechas Aprobar</h3>
            <p></p>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Estados</h3>
            <p></p>
        </div>
    </div>
</div>
@endsection