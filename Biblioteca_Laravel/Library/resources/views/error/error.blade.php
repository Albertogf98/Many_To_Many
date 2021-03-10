@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Error') }}</div>
                    <span class="text-danger">El usuario {{$name}} ya tiene {{$title}} reservado en la fecha actual ({{$lendingDate}})</span>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
