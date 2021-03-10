@extends('layouts.master')
@section('title', 'Editar préstamo')
@section('content')
    <form style="width: 50%" method="post" action="/edit">
        @method('post')
        @csrf
        <input type="hidden" class="form-control" id="userId" name="userId" value="{{ $user->id }}">
        <input type="hidden" class="form-control" id="bookId" name="bookId" value="{{ $book->id }}">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            <span class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="secondName">Apellidos</label>
            <input type="text" class="form-control" id="secondName" name="secondName" value="{{ $user->second_name }}">
            <span class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
            <span class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
            <span class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" id="editorial" name="editorial" value="{{ $book->editorial }}">
            <span class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="lendingDate">Fecha_préstamo</label>
            <input type="date" class="form-control" id="lendingDate" name="lendingDate">
            <span class="text-danger"></span>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
        <button type="button" class="btn btn-primary">
            <a href="{{ url('/admin/home') }}" style="text-decoration: none; color: #fff">Volver</a>
        </button>
    </form>
@endsection
