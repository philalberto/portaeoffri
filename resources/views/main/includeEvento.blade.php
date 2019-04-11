<div class="form-group row" id="evento">
    
    {!! Form::open(['url'=> 'creaEvento', 'class' => 'form-horizontal', 'id' => 'myevento']) !!}

        <div class="form-group">
            {!! Form::label(null, 'Luogo:') !!}
            {!! Form::text('luogo', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Data Evento:') !!}
            {!! Form::text('sottotitolo', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Note:') !!}
            {!! Form::text('note', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('', '', ['class'=>'col-sm-4 control-label']) !!}
            {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

</div>




