<div class="form-group row" id="evento">
    
    {!! Form::open(['url'=> 'visualizzaEvento', 'class' => 'form-horizontal', 'id' => 'myevento']) !!}

        <div class="form-group">
            {!! Form::label(null, 'Codice Evento:') !!}
            {!! Form::text('codiceEvento', null, ['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('', '', ['class'=>'col-sm-4 control-label']) !!}
            {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

</div>




