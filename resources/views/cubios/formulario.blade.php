@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" value="{{ isset($data_cubio->nombre) ? $data_cubio->nombre : old('nombre') }}">
<br>
<label for="color">Color</label>
<input type="text" name="color" id="color" value="{{ isset($data_cubio->color) ? $data_cubio->color : old('color') }}">
<br>
<label for="peso">Peso</label>
<input type="number" name="peso" id="peso" value="{{ isset($data_cubio->peso) ? $data_cubio->peso : old('peso') }}">
<br>
<label for="imagen">Imagen</label>
@if ( isset($data_cubio->imagen))
<img src="{{ asset('storage').'/'.$data_cubio->imagen }}" class="w-50" alt="">    
@endif
<input type="file" name="imagen" id="imagen">
<br>
<button type="submit">Guardar cubio</button>
