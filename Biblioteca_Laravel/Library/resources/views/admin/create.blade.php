@extends('layouts.master')
@section('title', 'Añadir préstamo')
@section('content')
    <form style="width: 50%" method="post" action="/create">
        @method('post')
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
            <label for="secondName">Apellidos</label>
            <input type="text" class="form-control" id="secondName" name="secondName">
            <span class="text-danger">{{ $errors->first('secondName') }}</span>
        </div>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" id="author" name="author">
            <span class="text-danger">{{ $errors->first('author') }}</span>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" id="editorial" name="editorial">
            <span class="text-danger">{{ $errors->first('editorial') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
        <button type="button" class="btn btn-primary">
            <a href="{{ url('/admin/home') }}" style="text-decoration: none; color: #fff">Volver</a>
        </button>
    </form>
@endsection
