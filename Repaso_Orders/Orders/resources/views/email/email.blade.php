@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mensajes') }}</div>
                        <h1>Sporte de la aplicación</h1>
                        <form action="/post/mail" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <input type="hidden" id="simulatorMailAddress" name="simulatorMailAddress" value="alberto1998adoratrices@gmail.com">
                                <label for="description">Escriba su problema</label>
                                <textarea class="form-control" id="messege" name="messege"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
