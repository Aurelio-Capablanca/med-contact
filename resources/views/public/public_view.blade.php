@extends('layouts.public.app_public')
@section('title', 'Catalogue')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="row">
                    @foreach($contents as $content)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>{{ $content['nameProduct'] }}</h5>
                                </div>
                                <div class="card-body">
                                    <img src="{{ $content['imageURL'] }}" alt="{{ $content['nameProduct'] }}"
                                         class="img-fluid">
                                    <h2 class="mt-3">Price: ${{ $content['priceProduct'] }}</h2>
                                    <form method="POST" action="{{ route('public.details') }}">
                                        @csrf
                                        <input type="hidden" name="data" value="{{ json_encode($content) }}">
                                        <button type="submit">Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                @if($currentPage > 1)
                                    <li class="page-item">
                                        <a class="page-link"
                                           href="{{ url('/public/dashboard/' . ($currentPage - 1)) }}">Previous</a>
                                    </li>
                                @endif
                                <li class="page-item active">
                                    <a class="page-link" href="#">{{ $currentPage }}</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('/public/dashboard/' . ($currentPage + 1)) }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
