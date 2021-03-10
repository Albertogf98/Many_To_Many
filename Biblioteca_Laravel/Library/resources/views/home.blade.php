@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span>Bienvenido <strong>
                            {{auth()->user()->name.' '. auth()->user()->second_name}}</strong>
                        usuario tipo:  {{auth()->user()->user_type}}
                    </span><br>
                    <button type="button" class="btn btn-primary">
                        <a href="{{auth()->user()->user_type}}/home" style="text-decoration: none; color:#fff;">Home</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
