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
                <fieldset>
                    <legend>Definir Horas de Asignatura</legend>

                    <div class="form-group col-md-7">

                        <label for="name">Horas Teóricas *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasT">
                    </div>
                    <div class="form-group col-md-7">

                        <label for="name">Horas Práctica *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasP">
                    </div>
                    <div class="form-group col-md-7">

                        <label for="name">Horas Laboratorio *</label>
                        <input required type="number" class="form-control required"
                               placeholder="N° Total de Horas" id="horasL">
                    </div>
                    <div class="form-group col-md-6">
                        <p>(*) Requerido</p>
                    </div>

                </fieldset>

                <h3>Definir</h3>
                <fieldset>
                    <legend>Definir Competencia</legend>
                    <input type="hidden" value="{{csrf_token()}}" id="token"/>
                    <div class="form-group col-md-7">
                        <label for="name-2">Dificultad</label>
                        <select class="form-control" id="dificultad">
                            <option value='Seleccionar'>Seleccionar</option>
                            @foreach($dificultad as $dif)
                                <option value='{{$dif->dificultad}}'>{{$dif->dificultad}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-7">
                        <label for="name-2">Nivel Cognoscitivo</label>
                        <select class="form-control nivelC" id="nivelC">
                            <option value='Seleccionar'>Seleccionar</option>
                        </select>
                    </div>

                    <div class="form-group col-md-7">
                        <label for="name-2">Taxonomía</label>
                        <select name='' class="form-control" id="taxonomia">
                            <option value='Seleccionar'>Seleccionar</option>
                        </select>
                    </div>

                    <div class="form-group col-md-7">
                        <label for="name-2">Competencia *</label>
                        <textarea class="form-control" placeholder="descripcion competencia"
                                  id="competencia"></textarea>
                    </div>
                    <p>(*) Mandatory</p>
                </fieldset>

                <h3>Warning</h3>
                <fieldset>
                    <legend>You are to young</legend>

                    <p>Please go away ;-)</p>
                </fieldset>

                <h3>Finish</h3>
                <fieldset>
                    <legend>Terms and Conditions</legend>

                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label
                            for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                </fieldset>
            </form>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        var form = $("#example-advanced-form").show();

        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                //if (newIndex === 3 && Number($("#age-2").val()) < 18)
                //{
                //  return false;
                //}
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                // ajax traer nivel cognoscitivo
                $(document).ready(function () {
                    $('#dificultad').change(function(){
                        if($(this).val()!=''){
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
                                    for(var i=0;i<data.length;i++){
                                        $('#nivelC').append('<option value="'+data[i].id+'">'+data[i].descripcion+'</option>');

                                    }


                                }


                    });

                }
                    });

                    //ajax para taxonomia bloom
                    $('#nivelC').change(function(){
                        if($(this).val()!=''){
                            console.log("hmm its change taxonomia");

                            var idNivelC= $('#nivelC').val();
                            var token = $('token').val();
                            $.ajax({
                                type: "get",
                                url: "{{ route('Docente.verboTaxonomia') }}",
                                data: {
                                    nivelC:idNivelC,
                                    token: token

                                }, success: function (data) {
                                    console.log('success');

                                    console.log(data);

                                    console.log(data.length);
                                    $('#taxonomia').empty();
                                    for(var i=0;i<data.length;i++){
                                        $('#taxonomia').append('<option value="'+data[i].id+'">'+data[i].verbo+'</option>');

                                    }


                                }


                            });

                        }
                    });

                });




             /*   $('#dificultad').change(function (event) {

                    $.get("/Docente/descripcion/" + event.target.value + "", function (response, state) {
                        console.log(response);



                    });

                });*/
                // Used to skip the "Warning" step if the user is old enough.
                // if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                //{
                //  form.steps("next");
                // }
                // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    form.steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                alert("Submitted!");
            }
        }).validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password-2"
                }
            }
        });
    </script>

@stop