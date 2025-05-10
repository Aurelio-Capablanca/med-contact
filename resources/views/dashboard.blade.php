@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Hello card</h5>
                </div>
                <div class="card-body">
                    <h1>Welcome, {{Auth::user()->nameUsers . ' ' . Auth::user()->lastnameUsers }}</h1>
                    <!-- Your dashboard content here -->
                </div>
            </div>
        </div>
    </div>
@endsection
