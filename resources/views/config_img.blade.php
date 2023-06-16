@extends('adminlte::page')
@section('title', 'Art Graphic')
@section('content_header')
    <link rel="shortcut icon" href="img/logoART.png" />
    <link rel="shortcut icon" href="{{ asset('img/logoART.png') }}"> 
    <h1>Configuracion de imagenes <b>catalogo</b></h1>
@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Subir imagen</h3>
        </div>
        <div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name_img">nombre</label>
                    <input type="text" class="form-control" id="name_img" placeholder="nombre">
                </div>
                <div class="form-group">
                    <label for="name_etiqueta">etiqueta</label>
                    <input type="text" class="form-control" id="name_etiqueta" placeholder="etiqueta">
                </div>
                <div class="form-group">
                    <label for="INPUT_DEL_IMG">Selecciona una img</label>
                    <input type="file" id="INPUT_DEL_IMG" accept="image/jpeg, image/png" enctype="multipart/form-data">
                </div>
            </div>
            <div class="card-footer">
                <button  class="btn btn-primary" onclick="img_guardar();">Subir IMG</button>
            </div>
        </div>
    </div>
    <br><br>
    <div class="col-12 row" id="img_append"></div>
@stop


@section('css')
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/img_pagina.js" type="text/javascript"></script>
@stop