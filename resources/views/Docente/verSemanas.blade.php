@extends('voyager::master')
@section('css')

@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-documentation"></i>Semanas
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
                            <table id="Semanas" class="table table-striped database-tables">
                                <thead>
                                <tr>
                                    <th>Semanas</th>
                                    <th>Acciones de la tabla</th>
                                </tr>
                                </thead>

                                @for($i=1; $i<17;$i++)

                                    <tr>
                                        <td>Semana{{$i}}</td>
                                        <td>
                                            <a href="/semanas/semana1/{{base64_encode($idA)}}/{{base64_encode($i)}}/0" title="definirContenido"
                                               class="btn btn-sm btn-primary pull-right edit" ><i
                                                        class="voyager-edit"></i> <span>Agregar Contenidos</span></a>

                                        </td>
                                    </tr>

                                 @endfor

                            </table>

                        </div>

                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

@stop





