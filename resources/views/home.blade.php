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
                    <!-- Lien pour lister les utilisateurs -->
                    <a href="{{ route('users_index') }}" title="voir les utilisateurs" >voir les utilisateurs</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
