@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="col-md-12">
            <h1 class="page-header text-center py-4">Grafica Procesos</h1>
        </div>
        <div class="col-md-6 offset-md-3">
            <div class="chart-responsive">
                <canvas width="100" height="100" ref="canvas"></canvas>
            </div>
        </div>   
            </div>
        </div>
    </div>
</div>
@endsection
