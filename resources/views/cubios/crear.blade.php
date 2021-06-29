crear registro del cubio
<form action="{{ url('/cubios') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="color">Color</label>
    <input type="text" name="color" id="color">
    <br>
    <label for="peso">Peso</label>
    <input type="number" name="peso" id="peso">
    <br>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen">
    <br>
    <button type="submit">Guardar cubio</button>
</form>