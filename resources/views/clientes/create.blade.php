@extends('admin.layout')

@section('header')
    <h1>
        CLIENTES
        <small>Crear Cliente</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.clientes.index') }}"><i class="fa fa-dashboard"></i> Cliente</a></li>
        <li class="active">Crear</li>
    </ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Crear un Nuevo Clientes</h3>           
    </div>
    @include('clientes.partials.search')
    @include('clientes.partials.form')

    
       
</div>

@stop