@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header text-center py-4">Procesos</h1>
        </div>
        <div class="col-md-7">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i> Nuevo Proceso</a><br><br>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th>ID Proceso</th>
                    <th>Descripcion</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                <tr v-for="processes in processes">
                    <td>@{{ processes.processes_id }}</td>
                    <td>@{{ processes.description }}</td>
                    <td>@{{ processes.department }}</td>
                    <td>@{{ processes.municipality }}</td>
                    <td>
                        <span class="badge badge-primary" v-if="processes.state_id == 1">Creado</span>
                        <span class="badge badge-success" v-if="processes.state_id == 2">Aprobado</span>
                        <span class="badge badge-danger"  v-if="processes.state_id == 3">No Aprobado</span>
                        <span class="badge badge-success"  v-if="processes.state_id == 4">Finalizado</span>
                    </td>
                    <td>
                    <a href="#" v-on:click.prevent="viewProcesses(processes)"><i class="far fa-eye"></i></a>
                    </td>
                </tr>
            </table>
        </div> 
    </div>
    @include('processes.create')
</div>
@endsection