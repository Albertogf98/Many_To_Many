@extends('layouts.master')

@section('content')
    <p>Bienvenid@  {{auth()->user()->user_type }}<b>{{': ' . auth()->user()->name}} </b></p>
    <h3><b>Notas de los alumnos</b></h3>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Unidades</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)

                <tr>
                    <td> {{ $order->date }}</td>
                    <td> {{ $order->name }}</td>
                    <td> {{ $order->price }}</td>
                    <td> {{ $order->units }}</td>
                    <td class="card-img"><img src="{{ $order->image }}" style="width: 10%; height: 20px"></td>
                    <td> {{ $order->description }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/create">Añadir</a>
    </div><br><br>
    {{ $orders->links() }}
@endsection

