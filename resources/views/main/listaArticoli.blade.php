<!DOCTYPE html>
<html lang="en">
<head>
    <title>Porta e offri</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
<div class="col-md-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-md-10 text-center">Articoli</th>
                <th class="col-md-2 text-center">Quantità</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articoli as $articolo)
            <tr>
                <td>{!! $articolo->articolo !!}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>





