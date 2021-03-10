@extends('layouts.master')
@section('title', 'Libros prestados')
@section('content')
    <p> Bienvenido <strong>{{auth()->user()->name}}</strong> Usuario tipo <strong>{{auth()->user()->user_type}}</strong></p>
    <h3 style="text-align: center">Listado de tus préstamos</h3>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <th scope="col">Fecha_Préstamo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usersWithBooks as    $user)
            <tr>
                <td>{{ $user->title }}</td>
                <td>{{ $user->author }}</td>
                <td>{{ $user->editorial }}</td>
                @foreach($user->users as $pivot)
                    <td>{{ $pivot->pivot->lending_date }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
