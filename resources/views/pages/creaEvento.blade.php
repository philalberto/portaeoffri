@extends('layouts.default')
@section('content')

    {!! Html::ul($errors->all(), array('class'=>'errors'))!!}

    <div class="container">

        {!! Form::open(['url'=> 'salvaEvento', 'class' => 'form-horizontal', 'id' => 'myevento']) !!}

            <div class="form-group row">
                {!! Form::label(null, 'Data:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('data_evento', null, array('id' => 'datepicker', 'placeholder' => 'Data Evento', 'class'=> 'datepicker' )) !!}
            </div>
        
            <div class="form-group row">
                {!! Form::label(null, 'Nickname Evento:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('nickname_evento', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label(null, 'Descrizione:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('descrizione', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label(null, 'Luogo:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('luogo', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group row">
                {!! Form::label(null, 'Note:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::textarea('note', null, array ('class'=>'form-control', 'size' => '30x5')) !!}
            </div>

            <div class="form-group row">
                {!! Form::label(null, 'Nome Responsabile Evento:', ['class'=>'col-xs-3 col-form-label mr-2']) !!}
                {!! Form::text('nickname', null, ['class'=>'form-control']) !!}
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


















