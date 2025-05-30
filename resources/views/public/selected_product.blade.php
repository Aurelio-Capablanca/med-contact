@extends('layouts.public.app_public')
@section('title', 'Catalogue')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="container">

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>{{ $data['nameProduct'] }}</h5>
                        </div>
                        <div class="card-body">
                            <img src="{{ $data['imageURL'] }}" alt="{{ $data['nameProduct'] }}"
                                 class="img-fluid">
                            <h2 class="mt-3">Price: ${{ $data['priceProduct'] }}</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
