@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <p>
                    <!-- Lien pour créer un nouvel article : "posts.create" -->
                    <a href="{{ route('posts.index') }}" title="voir les blogs" >voir les blogs</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
