{!! Form::open(['url'=> 'salvaArticoli', 'class' => 'form-horizontal', 'id' => 'formArticoliEvento']) !!}
{{ Form::hidden('token', $evento->token) }}
{{ Form::hidden('id_evento', $evento->id_evento) }}

<div class="row row-first">
    <div class="col-md-7">
        <p>{!! Form::label(null, 'Nome Persona', ['class'=>'col-xs-3 col-form-label mr-2']) !!}</p>
    </div>
    <div class="col-md-5">
        <p>{!! Form::text('persona', '' , ['class'=>'form-control']) !!}</p>
    </div>
</div><!-- /row -->
<br>

<table width="30%" align="center" class="table table-bordered">
    <tr>
        <td  colspan="3">
            <h2>Evento</h2>
        </td>
    </tr>
    <td width="45%">Data:</td>
    <td width="55%">{{ Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}</td>

    <tr>
        <td width="45%">Descrizione:</td>
        <td width="55%">{!! $evento->descrizione !!}</td>
    </tr>

    <tr>
        <td width="45%">Luogo:</td>
        <td width="55%">{!! $evento->luogo !!}</td>
    </tr>

    <tr>
        <td width="45%">Note:</td>
        <td width="55%">{!! $evento->note !!}</td>
    </tr>

    <tr>
        <td width="45%">Evento creato da:</td>
        <td width="55%">{!! $evento->persona !!}</td>
    </tr>
</table>
<br>

@foreach($tipoArticolo as $tipoArt)
    <table width="30%" align="center" class="table table-bordered">
        <tr>
            <td  colspan="3">
                <h4>{!! $tipoArt->descrizione !!}</h4>
            </td>
        </tr>
        @foreach($articoliGiaSelezionati as $art)
            @if ($tipoArt->id == $art->idTipart)
                <tr>
                    {{ Form::hidden('id[]', $art->id) }}
                    <td width="60%">{!! $art->descrizione !!}</td>
                    <td width="30%"><h6>{!! $art->persona !!}</h6></td>
                    <td width="10%" class='tdright'><div style="padding-right: 3px;"> {!! $art->quantita !!}</div></td>
                 </tr>
            @endif
        @endforeach
    </table>
    <br>
@endforeach

@foreach($tipoArticolo as $tipoArt)
    <table width="30%" align="center" class="table table-bordered">
        <tr>
            <td  colspan="3">
                <h4>{!! $tipoArt->descrizione !!}</h4>
            </td>
        </tr>
        @foreach($articolo as $art)
            @if ($tipoArt->id == $art->idTipart)
                <tr>
                    {{ Form::hidden('id[]', $art->id) }}
                    <td width="60%"><h6>{!! $art->descrizione !!}</h6></td>
                    <td width="30%"></td>
                    <td width="10%">{!! Form::text('quantita[]', $art->quantita , ['class'=>'form-control qta']) !!}</td>
                </tr>
            @endif
        @endforeach
    </table>
    <br>
@endforeach
<table width="30%" align="center" class="table">
    <tr>
        <td  colspan="3">
            {{Form::submit('Aggiorna', ['class' => 'btn btn-large btn-primary'])}}
        </td>
    </tr>
</table>
{!! Form::close() !!}

<style>

    input[type=text] {
        background-color: LightYellow;
        text-align: right;
        padding:0;
        margin-right: 3px;
    }

    h4 {
        padding:0;
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
    {
        padding-top: 0;
        padding-right: 0;
        padding-bottom: 0;
        padding-left: 3px;
    }

    .tdright {
        text-align: right;
        padding: 15px;
    }

    br {
        display: block;
        margin: 3px 0;
    }

</style>

