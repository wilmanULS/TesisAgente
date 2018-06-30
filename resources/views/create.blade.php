@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-group"></i>Designar Asignatura
    </h1>
@stop
@section('content')
    <input type="hidden" value="{{csrf_token()}}" id="token"/>
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="form-group col-md-12">

                <label for="name">Docente</label>
                <select name='iddocentes' class="form-control" id="idDocente">
                    @foreach($catDocentes as $docentes)
                        <option value='{{$docentes->id}}'>{{$docentes->name}}</option>

                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-12">

                <label for="name">Nivel</label>
                <select name='idnivel' class="form-control" id='nivel'>

                    <option placeholder="seleccionar" value='Seleccionar'>Seleccionar</option>
                    @foreach($nivel as $n)
                        <option placeholder="seleccionar" value='{{$n->as_nivel}}'>{{$n->as_nivel}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-12">

                <label for="name">Asignatura</label>
                <select name='idAsignatura' class="form-control" id='asignatura'>

                    <option value='Seleccionar'>Seleccionar</option>


                </select>
            </div>
            <div class="form-group col-md-12">

                <label for="name">Fecha de Inicio</label>
                <input required type="date" class="form-control" name="fecha_ini"
                       placeholder="Fecha de inicio del semestre" id="fecha_ini">
            </div>
            <div class="form-group col-md-12">

                <label for="name">Fecha de Finalización</label>
                <input required type="date" class="form-control" name="fecha_fin"
                       placeholder="Fecha de finalización del semestre" id="fecha_fin">
            </div>


            <div class="form-group">
                <button class="btn btn-primary" id='btnGuardar' type="submit">Guardar</button>
                <button class="btn btn-danger" id="cancelar" type="reset">Cancelar</button>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $('#nivel').change(function (event) {
            $.get("/create/asignaturas/" + event.target.value + "", function (response, state) {
                console.log(response);
                $('#asignatura').empty();
                for (i = 0; i < response.length; i++) {
                    $('#asignatura').append("<option value='" + response[i].as_id + "'>" + response[i].as_nombre + "</option>")
                }

            });

        });
        $('#cancelar').on('click', function () {
            location.href = '/Academico/designarAsignatura';
        })

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
            });
        });

        function validar() {
            indiceA = document.getElementById("asignatura").value;
            indiceN = document.getElementById("nivel").value;
            if ((indiceA == null || indiceA == 'Seleccionar') && (indiceN == null || indiceN == 'Seleccionar')) {
                return false;
            } else {
                var fIni = $('#fecha_ini').val();
                var fFin = $('#fecha_fin').val();

                if (fIni == "" && fFin == ""
                ) {
                    return false;
                }
                else {
                    return true;
                }

            }

        }

        $('#btnGuardar').click(function (e) {

            e.preventDefault();
            if (validar()) {
                var idDocente = $('#idDocente').val();
                var idAsignatura = $('#asignatura').val();
                var fecha_ini = $('#fecha_ini').val();
                var fecha_fin = $('#fecha_fin').val();
                var token = $('token').val();

                $.ajax({
                    type: "post",
                    url: "/create/asignaturas/save",
                    data: {
                        idDocente: idDocente,
                        idAsignatura: idAsignatura,
                        fecha_ini: fecha_ini,
                        fecha_fin: fecha_fin,
                        token: token

                    }, success: function (msg) {
                        alert("Se ha realizado el POST con exito " + msg);
                        location.href = 'Academico/designarAsignatura';
                    }
                });

            } else {

                alert('Complete los datos');
            }


        });


    </script>}


@stop

