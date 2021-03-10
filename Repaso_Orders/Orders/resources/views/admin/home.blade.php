@extends('layouts.masterAdmin')

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
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usersWithOrders as $data)

                                    <tr>
                                        <td> {{ $data->date }}</td>
                                        <td> {{ $data->name }}</td>
                                        <td> {{ $data->price }}</td>
                                        <td> {{ $data->units }}</td>
                                        <td class="card-img"><img src="{{ $data->image }}" style="width: 10%; height: 20px"></td>
                                        <td> {{ $data->description }}</td>
                                        <td><a href="{{ url('/admin/delete/'.$data->id) }}">Borrar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><br><br>
                        {{ $usersWithOrders->links() }}
@endsection
