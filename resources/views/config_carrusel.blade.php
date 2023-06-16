@extends('adminlte::page')
@section('title', 'Art Graphic')
@section('content_header')
    <link rel="shortcut icon" href="img/logoART.png" />
    <link rel="icon" href="img/logoART.png" type="image/x-icon">  
    <h1>Configuracion de imagenes carrusel</h1>
    <h1>solo pudes subir <b>5 IMG</b> max</h1>
@stop

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Subir imagen carrusel</h3>
        </div>
        <div>
            <div class="card-body">
                <div class="form-group">
                    <label for="INPUT_DEL_IMG_CARRUSEL">Selecciona una img</label>
                    <input type="file" id="INPUT_DEL_IMG_CARRUSEL" accept="image/jpeg, image/png" enctype="multipart/form-data">
                </div>
            </div>
            <div class="card-footer">
                <button  class="btn btn-primary" onclick="img_guardar_carrusel();" id="btn_carrusel">Subir IMG</button>
            </div>
        </div>
    </div>
    <br><br>
    <div class="col-12 row" id="img_append_carrusel"></div>
@stop


@section('css')
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/carrsuel.js" type="text/javascript"></script>
@stop