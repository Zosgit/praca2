@extends('layouts.app')
@section('title') {{ 'Dodaj opakowanie' }} @endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-cube"></i>
                    &nbsp; <b>Definicja opakowania</b>
                </div>
              @include('storeunits.fields')
            </div>
        </div>
    </div>

</div>
@endsection
