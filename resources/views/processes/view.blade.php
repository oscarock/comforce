@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-6">
            <h3>Datos Generales <span><button class="btn btn-outline-success btn-sm" @click="finalizeState({{$processes->id}})">Finalizar</button></span></h3>
            <span><b>ID Procedimiento:</b> {{ $processes->processes_id }} </span><br>
            <span><b>Departamento:</b> {{ $processes->department }} </span><br>
            <span><b>Municipio:</b> {{ $processes->municipality }}</span><br>
            <span><b>Descripcion:</b>{{ $processes->description }}</span><br>
            <span><b>Estado:</b> 
            @if($processes->state_id == 1)
                <span class="badge badge-primary">Creado</span>
            @elseif($processes->state_id == 2)
                <span class="badge badge-success">Aprobado</span>
            @elseif($processes->state_id == 3)
                <span class="badge badge-danger">No Aprobado</span>
            @elseif($processes->state_id == 4)
                <span class="badge badge-success">Finalizado</span>
            @endif
        </div>

        <div class="col-md-6">
            <h3>Cargar Documentos</h3>
            <p>imagenes...</p>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Fechas del Proceso</h3>
            <div class="col-md-6">
                @if(Auth::user()->profile_id == 2)
                    <form v-on:submit.prevent="saveDates({{$processes->id}})">
                        <label for="">Fecha Inicio:</label>
                        <input class="form-control" type="datetime-local" id="example-datetime-local-input" v-model="start_date">
                        <label for="">Fecha Fin:</label>
                        <input class="form-control" type="datetime-local" id="example-datetime-local-input" v-model="end_date"><br>
                        <button class="btn btn-outline-primary btn-sm">Guardar</button> 
                    </form>
                @else
                    <label for="">Fecha Inicio:</label>
                    <p>{{ $processes->start_date ? $processes->start_date : 'Aun no hay tiempo definido por el aprobador' }}</p>
                    <label for="">Fecha Fin:</label>
                    <p>{{ $processes->end_date ? $processes->end_date : 'Aun no hay tiempo definido por el aprobador' }}</p>
                @endif 
            </div>
        </div>

        <div class="col-md-6 pt-5">
            <h3>Aprobador Observaciones</h3>
            <div class="col-md-6">
                @if(Auth::user()->profile_id == 2)
                    <form v-on:submit.prevent="saveStates({{$processes->id}})">
                        <label for="">Aprobar Procedimiento</label>
                        <select name="state_id" id="state_id" class="form-control" v-model="state_id">
                            @php $states = App\State::where('id', '!=', 1)->get()  @endphp
                            <option value="">--Seleccionar--</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        <label for="">Observaciones</label>
                        <textarea name="" id="" cols="30" rows="2" class="form-control" v-model="observation"></textarea><br>
                        <button class="btn btn-outline-primary btn-sm">Guardar</button>
                    </form>
                @else
                    <label for="">Observaciones:</label>
                    <p>{{ $processes->observation ? $processes->observation : 'Sin Observaciones' }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection