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
        <div class="row" style="background-color: #f9f9f9;">
            <div class="panel-body col-sm-5" style="background-color: white; box-shadow: 3px 3px 5px #999; margin: 30px;">
                <label for="name">Descripción General</label>
                <br>

                <div class="form-group col-md-8">
                    <label for="name">Título *</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">Descripcion *</label>
                    <textarea class="form-control" placeholder="Ingrese una descripción"
                              id="descripcion"></textarea>
                </div>
                <div class="form-group col-md-8">
                    <label for="name">Autor *</label>
                    <input required type="text" class="form-control required"
                           placeholder="Autor" id="autor">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">Autor 1(Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Autor" id="autor">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">Autor 2 (Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Autor" id="autor">
                </div>


            </div>
            <div class="panel-body col-md-5" style="background-color: white;box-shadow: 3px 3px 5px #999;margin: 30px;">

                <label for="name">Palabras Clave</label>
                <br>
                <br>

                <div class="form-group col-md-8">
                    <label for="name">keyword 1 *</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">keyword 2 (Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">keyword 3 (Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">keyword 4 (Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-group col-md-8">
                    <label for="name">keyword 5 (Opcional)</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
            </div>

            <div class="panel-body col-md-5" style="background-color: white;box-shadow: 3px 3px 5px #999;margin: 30px;">

                <label for="name">Descripción Técnica</label>
                <br>
                <br>
                <div class="form-group col-md-8">
                    <label for="name">Tamaño *</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>

                <div class="form-group col-md-8">
                    <label for="name">Descripción (Opcional) *</label>
                    <input required type="text" class="form-control required"
                           placeholder="Ingrese Título" id="titulo">
                </div>
                <div class="form-gropu col-md-8">
                    <label for="name">Dificultad</label>
                    <select class="form-control" id="idioma">
                        <option value='Seleccionar'>Seleccionar</option>
                        @foreach($dificultad as $dif)
                            <option value='{{$dif->id}}'>{{$dif->descripcion}}</option>

                        @endforeach
                    </select>

                </div>
                <div class="form-gropu col-md-8">
                    <label for="name">Idioma</label>
                    <select class="form-control" id="idioma">
                        <option value='Seleccionar'>Seleccionar</option>
                        @foreach($idioma as $idi)
                            <option value='{{$idi->id}}'>{{$idi->descripcion}}</option>

                        @endforeach
                    </select>

                </div>
                <div class="form-gropu col-md-8">
                    <label for="name">Formato</label>
                    <select class="form-control" id="idioma">
                        <option value='Seleccionar'>Seleccionar</option>
                        @foreach($formato as $form)
                            <option value='{{$form->id}}'>{{$form->descripcion}}</option>

                        @endforeach
                    </select>

                </div>

                <div class="form-group col-md-8">
                    <label for="name">Evaluación Docente </label>
                    <select class="form-control"id="evaluacion"/>
                    <option value="" selected>Seleccionar</option>

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>

                </div>

                <div hidden class="form-group col-md-8">
                    <label for="name" >Estado </label>
                    <input id="estadophp" class="form-control required" type="text" value="Activo" readonly/>
                </div>


            </div>

            <div class="panel-body col-md-5" style="background-color: white;box-shadow: 3px 3px 5px #999;margin: 30px;">

                <label for="name">Cargar Objeto Aprendizaje</label>
                <br>
                <br>
                <div class="form-group col-md-9">
                    <label for="name" >Seleccione Archivo 1</label>
                    <input type="file" class="form-control" name="file" >
                </div>
                <div class="form-group col-md-9">
                    <label for="name" >Seleccione Archivo 2</label>
                    <input type="file" class="form-control" name="file" >
                </div>
                <div class="form-group col-md-9">
                    <label for="name" >Seleccione Archivo 3</label>
                    <input type="file" class="form-control" name="file" >
                </div>
                <div class="form-group col-md-9">
                    <label for="name" >Seleccione Archivo 4</label>
                    <input type="file" class="form-control" name="file" >
                </div>
                <div class="form-group col-md-9">
                    <label for="name" >Seleccione 5</label>
                    <input type="file" class="form-control" name="file" >
                </div>

                <div class="form-group col-md-9">
                    <input type="button" id="btAdd" value="Guardar" class="btn btn-primary"/>
                    <input type="button" id="btRemove" value="Cancelar" class="btn btn-danger"/>
                </div>
            </div>
        </div>
    </div>

@stop
