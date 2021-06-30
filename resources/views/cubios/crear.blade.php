@extends('layouts.app')
@section('content')
crear registro del cubio
<form action="{{ url('/cubios') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('cubios.formulario')
</form>
@endsection