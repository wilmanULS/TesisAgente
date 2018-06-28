@extends('voyager::master')
@section('page_header')
    <h1 class="page-title">
        PLAN GENERAL
    </h1>

@stop

@section('content')
    <div class="panel panel-bordered">
        <div class="panel-body">

            <div class="form-group col-md-4">
                <label for="name">Contenido *</label>
                <input required type="text" class="form-control required"
                       placeholder="Ingrese el contenido" id="contenido">
            </div>

        </div>



    </div>

@stop
