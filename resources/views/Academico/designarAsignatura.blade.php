@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-group"></i>Asignar
        <a href="../create" class="btn btn-success btn-add-new"><i class="voyager-plus"></i>
           <span>Añadir nuevo</span> </a>
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
                    {{ csrf_field() }}

                    <div class="panel-footer">
                        <table class="table table-striped database-tables">
                            <thead>
                            <tr>
                                <th>Docentes</th>
                                <th>Asignatura</th>
                                <th>Nivel</th>
                                <th>Asignatura Antecesora</th>
                                <th style="text-align:right">{{ __('voyager.database.table_actions') }}</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>
                                    <p class="name">
                                </td>
                                <td>
                                    <div class="bread_actions">
                                    </div>
                                </td>
                                <td class="actions">
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary">{{ __('voyager.generic.submit') }}</button>
                    </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop





