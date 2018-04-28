@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-group"></i>Designar Asignatura

    </h1>
@stop
@section('content')
    {!! Form::open(array('url'=>'Academico/designarAsignatura','method'=>'POST', 'id'=>'frmA')) !!}
    {{Form::token()}}
     <div class="panel panel-bordered">
    }
    }
    <div class="panel-body">
        <div class="form-group col-md-12">
            
            <label for="name">Docente</label>
            <select name='iddocentes' class="form-control">
                @foreach($catDocentes as $docentes)
                    <option>{{$docentes->name}}</option>

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


        <div class="form-group">
         <button class="btn btn-primary" type="submit">Guardar</button>
         <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>

    </div>
</div>
    {!! Form::close() !!}
@stop

@section('scripts')
    <script>

$('#nivel').change(function(event){
$.get("/create/asignaturas/"+event.target.value+"",function(response, state){
console.log(response);
$('#asignatura').empty();
for(i=0; i<response.length; i++ ){
    $('#asignatura').append("<option value='"+response[i].as_id+"'>"+response[i].as_nombre+"</option>")
}

});

});

        /* $('#nivel').on('change',function(e){
             console.log(e);
             var niv_id=e.target.value;

             //ajax
             $.get("/ajax-asignatura?niv_id="+niv_id,function(data){
              console.log(data);
             });
         });*/





        /*$(document).ready(function(){
            $('#nivel').on('change', function()
            {
                alert($(this).val());
                $.get('create/Asignatura',function(data){

                })
            });

        })*/


    </script>

@stop

