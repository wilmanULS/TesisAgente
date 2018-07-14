@extends('voyager::master')
@section('css')

@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>Editar Competencias
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add" role="form">

                        <!-- CSRF TOKEN -->


                        <div class="panel-footer">
                            <table id="Asignados" class="table table-striped database-tables">
                                <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Competencia</th>
                                    <th>Nivel</th>
                                    <th>Acciones de la tabla</th>
                                </tr>
                                </thead>
                                @foreach($competencias as $doc)
                                    <tr>

                                        <td>{{$doc->as_nombre}}</td>
                                        <td>{{$doc->descripcion}}</td>
                                        <td>{{$doc->as_nivel}}</td>
                                        <td>
                                            <a name="Eliminar" id="{{base64_encode($doc->id)}}'"
                                               class="btn btn-sm btn-danger pull-right delete"><i
                                                        class="voyager-trash"></i><span>Borrar</span></a>
                                            <a href="/Docente/editarCompetencias/{{base64_encode($doc->dasg_id)}}/{{base64_encode($doc->id)}}"
                                               title="definirContenido"
                                               class="btn btn-sm btn-primary pull-right edit" id="{{$doc->dasg_id}}"><i
                                                        class="voyager-edit"></i> <span>Editar Competencias</span></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>

                        {{$competencias->render()}}
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>

        $(document).ready(function () {
            $('.delete').on('click', function () {
                var idC = $(this).attr('id');
                if (confirm("esta seguro de querer eliminar este objeto " + idC)) {
                    $.ajax({
                        url: "{{route('Competencias.delete')}}",
                        method: "get",
                        data: {
                            idC: idC
                        }, success: function (msg) {
                            alert("Se ha eliminado con exito " + msg);
                            location.href = '/Docente/competencias';
                        }
                    })
                } else {
                    return false;
                }

            });


        });
    </script>


@stop





