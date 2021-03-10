@extends('layouts.master')

@section('content')
    <form action="/delete" method="post" enctype="multipart/form-data">
        @method('delete')
        @csrf

        <input type="hidden" name="id" id="id" value="{{ $id }}">

        <div class="alert alert-danger container" role="alert">
           <span class="text-danger">¿Seguro que quieres eliminar el producto?</span>
            <button class="btn btn-danger" type="submit">Sí</button>
            <a class="btn btn-warning" href="/">No</a>
        </div>
    </form>
@endsection

