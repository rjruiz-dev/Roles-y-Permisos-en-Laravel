@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Roles
                    <!-- tiene el permiso de crear productos? -->
                    @can('roles.create')
                    <!-- si los tiene se visualiza un enlace con boton -->
                    <a href="{{ route('roles.create') }}"
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
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td width="10px">
                                <!-- tienes permisos de mirar el detalle de un producto? -->
                                    @can('roles.show')
                                    <a href="{{ route('roles.show', $role->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                        Ver
                                    </a>
                                    @endcan
                                </td>     
                                <td width="10px">
                                <!-- tienes permisos de editar el detalle de un producto? -->
                                    @can('roles.edit')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                    class="btn btn-sm btn btn-outline-success">
                                        Editar
                                    </a>
                                    @endcan
                                </td>   
                                <td width="10px">
                                <!-- tienes permisos de eliminar un producto? -->
                                    @can('roles.destroy')
                                    {!! Form::open(['route' => ['roles.destroy', $role->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn btn-outline-danger">Elimnar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>                                 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection