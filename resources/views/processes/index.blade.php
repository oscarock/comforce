@extends('layouts.app')

@section('content')
<div class="container pt-5" id="app">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header text-center py-4">Mis Procesos</h1>
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
                    <th></th>
                </tr>
                <tr v-for="processes in processes">
                    <td>@{{ processes.processes_id }}</td>
                    <td>@{{ processes.description }}</td>
                    <td>@{{ processes.department }}</td>
                    <td>@{{ processes.municipality }}</td>
                    <td>
                    <a href="#" v-on:click.prevent="viewBlog(blogs)"><i class="far fa-eye"></i></a>
                    <a href="#" v-on:click.prevent="deleteBlog(blogs)"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            </table>
        </div>    
    </div>
    @include('processes.create')
</div>
@endsection