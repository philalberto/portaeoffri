
<div class="col-md-12">

    <table class="table table-striped  table-condensed">
        <thead>
            <tr>
                <th class="col-md-12 text-center"><small>Articoli</small></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articoli as $articolo)
            <tr>
                 <td>{!! $articolo->articolo !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>




