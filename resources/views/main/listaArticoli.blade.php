<!DOCTYPE html>
<html lang="en">
<head>
    <title>Porta e offri</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div class="col-md-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-md-10 text-center">Articoli</th>
                <th class="col-md-1 text-center">Seleziona</th>
                <th class="col-md-1 text-center">Quantità</th>
            </tr>
        </thead>
        {!! Form::open(['url'=> 'salvaArticoli', 'class' => 'form-horizontal', 'id' => 'formArticoliEvento']) !!}
        <tbody>
            @foreach($articoli as $articolo)
            <tr>
                <td>{!! $articolo->articolo !!}</td>
                <td>{{ Form::checkbox('articoloSelezionato') }}</td>
                <td>{{ Form::text('quantitaArticolo') }}</td>
            </tr>
            @endforeach
        </tbody>
        {!! Form::close() !!}
    </table>

</div>

</body>
</html>





