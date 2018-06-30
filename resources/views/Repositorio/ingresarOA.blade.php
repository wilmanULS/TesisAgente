@extends('voyager::master')
@section('css')

@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>
Ingresar Objetos Aprendizaje

    </h1>
@stop

@section('content')
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Título *</label>
                <input required type="text" class="form-control required"
                       placeholder="Ingrese Título" id="titulo">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Descripcion *</label>
                <textarea class="form-control" placeholder="Ingrese una descripción"
                          id="descripcion"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="name">Autor *</label>
                <input required type="text" class="form-control required"
                       placeholder="Autor" id="autor">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Evaluación Docente </label>
                <select id="evaluacion"/>
                <option value="" selected>--</option>\n' +
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>

            </div>

            <div class="form-group col-md-4">
                <label for="name">Estado </label>
                <input id="estadophp" class="data" type="text" value="Activo" readonly/>
            </div>





        </div>



        </div>


    </div>

@stop
