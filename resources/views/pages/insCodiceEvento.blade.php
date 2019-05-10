@extends('layouts.default')
@section('content')

    {!! Html::ul($errors->all(), array('class'=>'errors'))!!}

    <div class="container">

        {!! Form::open(['url'=> 'insCodiceEvento', 'class' => 'form-horizontal', 'id' => 'myevento']) !!}

            <div class="form-group row">
                {!! Form::label(null, 'Inserisci Codice Evento:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('codice_evento', null, ['class'=>'form-control']) !!}
            </div>
        
            <div class="form-group row">
                {!! Form::label('', '', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@stop


{{--
            <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var $input = $('.nickname');
                     $( "#target" ).keypress(function( e ) {

                    $input.keypress(function(e){
                    e.preventDefault();
                    var name = $("input[name=nickname]").val();
                    //alert(name);
                    $.ajax({
                        type:'POST',
                        url:'ajaxRequest',
                        data:{name:name},
                        success:function(data){
                            //alert("1111"+data.success);
                            document.getElementById('nicknamer').value = data.success;;
                        }
                    });
                });
            </script>
--}}


















