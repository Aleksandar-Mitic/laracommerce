@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 m-auto d-block">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h1>Welcome to {{ config('app.name', 'Laravel') }}</h1>

        </div>
    </div>
</div>
@endsection
