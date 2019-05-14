@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6">
            <h3>Datos Generales</h3>
            <span><b>ID Procedimiento:</b> @php echo $processes->processes_id @endphp </span><br>
            <span><b>Departamento:</b> @php echo $processes->department @endphp </span><br>
            <span><b>Municipio:</b> @php echo $processes->municipality @endphp </span><br>
            <span><b>Descripcion:</b> @php echo $processes->description @endphp </span><br>
            <span><b>Estado:</b> 
            @if($processes->state_id == 1)
                <span class="badge badge-primary">Creado</span>
            @elseif($processes->state_id == 2)
                <span class="badge badge-warning">Finalizado</span>
            @elseif($processes->state_id == 3)
                <span class="badge badge-success">Aprobado</span>
            @elseif($processes->state_id == 4)
                <span class="badge badge-danger">No Aprobado</span>
            @endif
        </div>

        <div class="col-md-6">
            <h3>Cargar Documentos</h3>
            <p>imagenes...</p>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Fechas del Proceso</h3>
            <div class="col-md-6">
                <form method="POST" v-on:submit.prevent="saveDates({{$processes->id}})">
                    <label for="">Fecha Inicio:</label>
                    <input class="form-control" type="datetime-local" id="example-datetime-local-input" v-model="start_date">
                    <label for="">Fecha Fin:</label>
                    <input class="form-control" type="datetime-local" id="example-datetime-local-input" v-model="end_date"><br>
                    <button class="btn btn-outline-primary btn-sm">Guardar</button> 
                </form>  
            </div>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Estados</h3>
            <p></p>
        </div>
    </div>
</div>
@endsection