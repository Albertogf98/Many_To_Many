@extends('layouts.master')

@section('content')
    <h1>Agregar</h1>
    <br>
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/insert" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="units">Unidades</label>
            <input type="number" class="form-control" id="units" name="units">
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
