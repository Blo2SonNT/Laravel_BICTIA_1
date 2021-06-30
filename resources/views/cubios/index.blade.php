@extends('layouts.app')
@section('content')
vista de los cubios registrados en la bd :D
@if (Session::has('alerta'))
    {{ Session::get('alerta') }}
@endif
<div class="container">
    <br>
<a href="{{ url('cubios/create') }}">Crear registro de cubio</a>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Peso</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cubios as $cubio)
        <tr>
            <td>{{ $cubio->id }}</td>
            <td>
                <img width="100" src="{{ asset('storage').'/'.$cubio->imagen }}" alt="">
            </td>
            <td>{{ $cubio->nombre }}</td>
            <td>{{ $cubio->color }}</td>
            <td>{{ $cubio->peso }}</td>
            <td>
                <a href="{{ url('cubios/'.$cubio->id.'/edit') }}">Editar</a>
            </td>
            <td>
                <form action="{{ url('cubios/'.$cubio->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Esta seguro de eliminar el cubio?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection