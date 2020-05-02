@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Productos
                    <!-- tiene el permiso de crear productos? -->
                    @can('products.create')
                    <!-- si los tiene se visualiza un enlace con boton -->
                    <a href="{{ route('products.create') }}"
                    class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>
                    @endcan
                </div>

                <div class="card-body">
                    <!-- listado de productos-->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td width="10px">
                                <!-- tienes permisos de mirar el detalle de un producto? -->
                                    @can('products.show')
                                    <a href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                        Ver
                                    </a>
                                    @endcan
                                </td>     
                                <td width="10px">
                                <!-- tienes permisos de editar el detalle de un producto? -->
                                    @can('products.edit')
                                    <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-sm btn btn-outline-success">
                                        Editar
                                    </a>
                                    @endcan
                                </td>   
                                <td width="10px">
                                <!-- tienes permisos de eliminar un producto? -->
                                    @can('products.destroy')
                                    {!! Form::open(['route' => ['products.destroy', $product->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn btn-outline-danger">Elimnar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>                                 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection