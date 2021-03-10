@extends('layouts.master')
@section('title', 'Aministrador')
@section('content')
    <style>
        svg {
            width: 10%;
        }
    </style>
    <p> Bienvenido <strong>{{auth()->user()->name}}</strong> Usuario tipo <strong>{{auth()->user()->user_type}}</strong></p>
    <h3 style="text-align: center">Listado de los préstamos de la biblioteca</h3>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <th scope="col">Fecha_préstamo</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($usersWithBooks as $user)
            @foreach($user->books as $book)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->second_name }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->editorial }}</td>
                    <td>{{ $book->pivot->lending_date }}</td>
                    <td>
                        <button class="btn btn-danger">
                            <a style="text-decoration: none; color: #fff" href="{{ url('/admin/delete/'. json_encode(['bookId' => $book->pivot->book_id, 'userId' => $book->pivot->user_id])) }}">Eliminar</a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-warning">
                            <a style="text-decoration: none; color: #fff" href="{{ url('/admin/edit/'. json_encode(['bookId' => $book->pivot->book_id, 'userId' => $book->pivot->user_id])) }}">Editar</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
    {{$usersWithBooks->links()}}<br>
    <button type="button" class="btn btn-primary">
        <a style="text-decoration: none; color: #fff" href="{{ url('/admin/create') }}">Añadir préstamo</a>
    </button>
@endsection
