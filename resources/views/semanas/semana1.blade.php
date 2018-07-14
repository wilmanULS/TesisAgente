@extends('voyager::master')
@section('css')

@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>Ingresar Contenido/
        @foreach($asignatura as $as)
            {{$as->as_nombre}}
        @endforeach
        <input type="hidden" value="{{$idA}}" id="idDasg"/>
        <input type="hidden" value="1" id="semana1"/>
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="panel-body pbody">
                        <div id="navigation_holder">
                            <ul class="pager">
                                <li class="previous"><a href="#">&larr; Anterior</a></li>
                                <span style="font-size:1.3em;font-weight:bold; text-align: center;">Semana 1</span>
                                <li class="next"><a href="/semanas/semana2/{{base64_encode($idA)}}">Siguiente &rarr;</a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label>Contenido</label>
                                <input required type="text" style="width:550px;" class="form-control required"
                                       placeholder="Ingrese Contenido" id="Contenido1">
                                <input type="hidden" value="{{csrf_token()}}" id="token"/>
                            </div>
                            <div class="col-md-2">
                                <button id="masfilas" class="btn btn-sm btn-primary">Agregar Temas
                                    <span style="font-size:16px; font-weight:bold;">+ </span>
                                </button>
                            </div>
                        </div>
                        <form method="post" action="">

                                <table class="table table-striped database-tables" id="mytable">
                                    <thead>
                                    <tr>
                                        <th >Temas</th>
                                        <th >Horas Asignadas</th>
                                        <th >% Aprobación</th>
                                        <th >Prioridad</th>
                                        <th >Acciones</th>

                                    </tr>

                                    </thead>
                                    <tbody>


                                    </tbody>

                                </table>
                            </div>
                            <div id="buttons_holder">

                                <a title="definirContenido"
                                   class="btn btn-sm btn-primary" id=""><span>Actualizar</span></a>
                                <a title="definirContenido"
                                   class="btn btn-sm btn-primary" id="ok"><span>Guardar</span></a>
                            </div>

                        </form>
                    </div>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

    <script>
        $(document).ready(function () {
            $("#masfilas").click(function () {
                $("#mytable").append('<tr><td><input type="text" class="data"/></td>' +
                    '<td> <input class="data" type="number"/></td>' +
                    '<td> <input class="data" type="number"/></td>' +
                    '<td> <select class="data">\n' +
                    '  <option value="volvo" selected>Seleccionar</option>\n' +
                    '<option value="1">1</option>\n' +
                    '  <option value="2">2</option>\n' +
                    '  <option value="3">3</option>\n' +
                    '  <option value="4">4</option>\n' +
                    '  <option value="5">5</option>\n' +
                    '</select></td>' +
                    '<td><a href="/Repositorio/ingresarOA" class="btn btn-sm btn-primary pull-right edit" "><i class="voyager-edit"></i></a>' +
                    '<a href="#" class="btn btn-sm btn-danger pull-right delete"><i class="voyager-trash"></i></a></td></tr>');
                $('.delete').off().click(function (e) {
                    $(this).parent('td').parent('tr').remove();

                });
            });
        });


        $("#ok").click(function () {

            var contenido = $('#Contenido1').val();
            var idAsignatura = $('#idDasg').val();
            var semana = $('#semana1').val();
            var token = $('token').val();
            var inputs = document.getElementsByClassName('data');
            var lista = new Array();
            var vectorAsignado = [];
            var data = [];
            for (var i = 0; i < inputs.length; i++) {
                data.push(inputs[i].value);
            }
            for (var i = 0; i < inputs.length; i = i + 4) {
                var data1 = data.slice(i, i + 4);
                lista.push(data1);
            }
            for (var index in lista) {
                var dataTemp = {
                    tema: lista[index][0],
                    hasig: lista[index][1],
                    papro: lista[index][2],
                    prioridad: lista[index][3]
                };
                vectorAsignado.push(dataTemp);
            }
            var DataCode = JSON.stringify(vectorAsignado);
            $.ajax({
                 type:"post",
                 url:"{{ route('Docente.contenidoSave')  }}",
                 data:{
                     semana:semana,
                     idAsignatura:idAsignatura,
                     contenidoS1:contenido,
                     token:token,
                     listaTemas:DataCode,
             },success: function (msg) {
                 alert("Se ha realizado el POST con exito ");

             }


             });


        });


    </script>


@stop





