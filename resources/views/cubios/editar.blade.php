@extends('layouts.app')
@section('content')
Actualizar registro del cubio
<form action="{{ url('/cubios/'.$data_cubio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('cubios.formulario')
</form>
@endsection