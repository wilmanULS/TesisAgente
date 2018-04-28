@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop


@section('content')
    <div class="page-content container-fluid">
        <div class="container-fluid">
            <h1 class="page-title"><i class="voyager-anchor"></i>PRUEBA</h1>
        </div>
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add" role="form"
                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">
                        </div><!-- panel-body -->

                        @foreach ($catDocentes as $user)
                            <p>This is user {{ $user->name }}</p>
                        @endforeach
                     


                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">{{ __('voyager.generic.submit') }}</button>
                        </div>

                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>


                </div>
            </div>
        </div>
    </div>
@stop