@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">

        @if (Session::get('width') > 800)
            <div class="col-md-3"></div><! Vuoto -->
            <div class="col-md-6">
                @include('main.includeArticoli')
            </div>
            <div class="col-md-3"></div><! Vuoto -->
        @else
            @include('main.includeArticoli')
        @endif
    </div>
</div>

@stop

