@extends('layouts.plantillabase')

@section('encabezado')
    
<a href="articulo/create " class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th class=" col">ID</th>
            <th class=" col">Codigo</th>
            <th class=" col">Descripcion</th>
            <th class=" col">Cantidad</th>
            <th class=" col">Precio</th>
            <th class=" col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->Codigo}}</td>
            <td>{{$articulo->Descripcion}}</td>
            <td>{{$articulo->Cantidad}}</td>
            <td>{{$articulo->precio}}</td>
            {{-- Botones De Edicion --}}
            <td>
                <a href="/articulo/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>
                {{-- Borrar --}}
                <form action="/articulo/{{$articulo->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-danger" type="submit" 
                onclick="return confirm('Confirmar');">Borrar</button>
                </form>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>
@endsection