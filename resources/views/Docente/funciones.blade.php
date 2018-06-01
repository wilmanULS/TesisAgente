@extends('voyager::master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>
    </h1>

@stop
@section('content')
    <div class="panel panel-bordered">
        <div class="panel-body">
            @include('voyager::alerts')
            <form id="example-advanced-form" action="#">
                <h3>Definir</h3>
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="name">Horas Teóricas *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasT">
                    </div>
                    <div class="form-group col-md-4">

                        <label for="name">Horas Práctica *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasP">
                    </div>
                    <div class="form-group col-md-4">

                        <label for="name">Horas Laboratorio *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasL">

                        <input type="hidden" value="{{csrf_token()}}" id="token"/>
                    </div>
                </div>

                <div id="competencias" class="row">
                    <div id="CP" class="row">
                        <div class="form-group col-md-4">
                            <label for="name-2">Dificultad</label>
                            <select class="form-control dificultad" id="dificultad">
                                <option value='Seleccionar'>Seleccionar</option>
                                @foreach($dificultad as $dif)
                                    <option value='{{$dif->dificultad}}'>{{$dif->dificultad}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name-2">Nivel Cognoscitivo</label>
                            <select class="form-control nivelC" id="nivelC">
                                <option value='Seleccionar'>Seleccionar</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name-2">Taxonomía</label>
                            <select name='' class="form-control taxonomia" id="taxonomia">
                                <option value='Seleccionar'>Seleccionar</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="name-2">Competencia *</label>
                            <textarea class="form-control" placeholder="descripcion competencia"
                                      id="competencia"></textarea>
                        </div>
                    </div>
                </div>

                <div id="main">
                    <input type="button" id="btAdd" value="Añadir Elemento" class="bt"/>
                    <input type="button" id="btRemove" value="Eliminar Elemento" class="bt"/>
                </div>

            </form>
        </div>

    </div>
@stop
@section('scripts')
    <script>
        // ajax traer nivel cognoscitivo
        $(document).ready(function () {
            //añadido dnamico

            var CP = 0;

// Crear un elemento div añadiendo estilos CSS
            var container = $(document.getElementById('competencias'));

            $('#btAdd').click(function () {
                if (CP < 4) {

                    CP = CP + 1;

                    // Añadir caja de texto.
                    $(container).append('<div class=row id=CP'+CP+'>  <div class="form-group col-md-4">\n' +
                        '                            <label for="name-2">Dificultad</label>\n' +
                        '                            <select class="form-control dificultad" id="dificultad'+CP+'">\n' +
                        '                                <option value=\'Seleccionar\'>Seleccionar</option>\n' +
                        '                                @foreach($dificultad as $dif)\n' +
                        '                                    <option value=\'{{$dif->dificultad}}\'>{{$dif->dificultad}}</option>\n' +
                        '\n' +
                        '                                @endforeach\n' +
                        '                            </select>\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="form-group col-md-4">\n' +
                        '                            <label for="name-2">Nivel Cognoscitivo</label>\n' +
                        '                            <select class="form-control nivelC" id="nivelC'+CP+'">\n' +
                        '                                <option value=\'Seleccionar\'>Seleccionar</option>\n' +
                        '                            </select>\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="form-group col-md-4">\n' +
                        '                            <label for="name-2">Taxonomía</label>\n' +
                        '                            <select name=\'\' class="form-control taxonomia" id="taxonomia'+CP+'">\n' +
                        '                                <option value=\'Seleccionar\'>Seleccionar</option>\n' +
                        '                            </select>\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="form-group col-md-4">\n' +
                        '                            <label for="name-2">Competencia *</label>\n' +
                        '                            <textarea class="form-control" placeholder="descripcion competencia"\n' +
                        '                                      id="competencia'+CP+'"></textarea>\n' +
                        '                        </div>  </div>');


                    $('#main').after(container);
                }
                else {      //se establece un limite para añadir elementos, 20 es el limite
                    alert('Limite alcanzado');
                    $('#btAdd').attr('class', 'bt-disable');
                    $('#btAdd').attr('disabled', 'disabled');

                }
            });

            $('#btRemove').click(function () {   // Elimina un elemento por click
                if (CP != 0) {
                    $('#CP' + CP).remove();
                    CP = CP - 1;
                }
                if (CP == 0) {
                    alert('Minimo una Competencia')
                }

            });


            //
            $('#dificultad').change(function () {
                if ($(this).val() != '') {
                    console.log("hmm its change");

                    var dificultad = $('#dificultad').val();
                    var token = $('token').val();

                    $.ajax({
                        type: "get",
                        url: "{{ route('Docente.descripcion') }}",
                        data: {
                            dificultad: dificultad,
                            token: token

                        }, success: function (data) {
                            console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            $('#nivelC').empty();
                            for (var i = 0; i < data.length; i++) {
                                $('#nivelC').append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');

                            }


                        }


                    });

                }
            });

            //ajax para taxonomia bloom
            $('#nivelC').change(function () {
                if ($(this).val() != '') {
                    console.log("hmm its change taxonomia");

                    var idNivelC = $('#nivelC').val();
                    var token = $('token').val();
                    $.ajax({
                        type: "get",
                        url: "{{ route('Docente.verboTaxonomia') }}",
                        data: {
                            nivelC: idNivelC,
                            token: token

                        }, success: function (data) {
                            console.log('success');

                            console.log(data);

                            console.log(data.length);
                            $('#taxonomia').empty();
                            for (var i = 0; i < data.length; i++) {
                                $('#taxonomia').append('<option value="' + data[i].id + '">' + data[i].verbo + '</option>');

                            }


                        }


                    });

                }
            });
//n1

            $('#dificultad1').change(function () {
                if ($(this).val() != '') {
                    console.log("hmm its change");

                    var dificultad = $('#dificultad1').val();
                    var token = $('token').val();

                    $.ajax({
                        type: "get",
                        url: "{{ route('Docente.descripcion') }}",
                        data: {
                            dificultad: dificultad,
                            token: token

                        }, success: function (data) {
                            console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            $('#nivelC1').empty();
                            for (var i = 0; i < data.length; i++) {
                                $('#nivelC1').append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');

                            }


                        }


                    });

                }
            });

            //ajax para taxonomia bloom
            $('#nivelC1').change(function () {
                if ($(this).val() != '') {
                    console.log("hmm its change taxonomia");

                    var idNivelC = $('#nivelC1').val();
                    var token = $('token').val();
                    $.ajax({
                        type: "get",
                        url: "{{ route('Docente.verboTaxonomia') }}",
                        data: {
                            nivelC: idNivelC,
                            token: token

                        }, success: function (data) {
                            console.log('success');

                            console.log(data);

                            console.log(data.length);
                            $('#taxonomia1').empty();
                            for (var i = 0; i < data.length; i++) {
                                $('#taxonomia1').append('<option value="' + data[i].id + '">' + data[i].verbo + '</option>');

                            }


                        }


                    });

                }
            });



            //
        });
    </script>

@stop