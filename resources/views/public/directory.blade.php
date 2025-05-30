@extends('layouts.public.app_public')
@section('title', 'Catalogue')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="row">
                    @foreach($doctors as $doctor)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h1>{{ $doctor->nameDoctor . ' ' . $doctor->lastnameDoctor }}</h1>
                                </div>
                                <div class="card-body">
                                    <h5 class="mt-3">Email: {{ $doctor->emailDoctor }}</h5>
                                    <h5 class="mt-3">Phone: {{ $doctor->phoneDoctor }}</h5>
                                    <h5 class="mt-3">{{ $doctor->descriptionDoctor }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
