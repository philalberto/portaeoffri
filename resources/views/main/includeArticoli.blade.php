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

<table width="100%" align="center" class="table table-bordered">
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
<table width="100%" align="center" class="table table-bordered">
    
@php
$tipoArticoloPrecedente = 0;
$articoloPrecedente = 0;
@endphp

@foreach($articoli as $art)

    @if ($art->id_tipo_articolo != $tipoArticoloPrecedente)
        <tr>
            <td colspan="3" class="tipoArticolo">{!! $art->descrizione_tipo_articolo !!}</td>
         </tr>
    @endif
 
    <tr>
        @if ($art->id_articolo != $articoloPrecedente)
            <td width="35%">{!! $art->descrizione_articolo !!}</td>
        @else
            <td width="35%"></td>
        @endif
        
        <td width="35%">{!! $art->nome_persona !!}</td>
        <td width="30%">{!! $art->quantita !!}</td>
    </tr>
     
    @php
        $tipoArticoloPrecedente = $art->id_tipo_articolo;
        $articoloPrecedente = $art->id_articolo;
    @endphp

@endforeach

</table>


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

