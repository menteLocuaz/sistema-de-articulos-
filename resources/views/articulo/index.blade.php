@extends('adminlte::page')

@section('title', 'Sistema De Articulo')

@section('content_header')
    <h1>Sistema De Articulo </h1>
@stop

@section('content')
   
<a href="articulo/create " class="btn btn-primary mb-3" >CREAR</a>


<table id='articulos' class="table table-dark table-striped mt-4 table-bordered shadow-lg" style="width:100%">
    <thead class="bg-primary text-white">
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
                <a href="/articulo/{{$articulo->id}}/edit" class="btn btn-info mb-2">Editar</a>
                {{-- Borrar --}}
                <form action="/articulo/{{$articulo->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-danger mb-2" type="submit" 
                onclick="return confirm('Confirmar');">Borrar</button>
                </form>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css
    ">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#articulos').DataTable(
        {
            "lengthMenu":[[5,10,50.-1],[5,10,50,'all']]
        }
    );
    } );
</script>
@stop