@extends('layouts.plantillabase')

@section('encabezado')
<h2>Editar Registro</h2>


    <form action="/articulo/{{$articulo->id}}" method="POST">
        @csrf    
        @method('PUT')
      <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input id="codigo" name="codigo" type="text" class="form-control" value="{{$articulo->Codigo}}">    
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$articulo->Descripcion}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$articulo->Cantidad}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$articulo->precio}}">
      </div>
      <a href="/articulo" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>



@endsection