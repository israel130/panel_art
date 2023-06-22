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
                    <label for="name_descripcion">Descripción</label>
                    {{-- <input type="text" class="form-control" id="name_descripcion" placeholder="Descripción"> --}}
                    <textarea class="form-control" rows="5" placeholder="Descripción" id="name_descripcion"></textarea>
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

    <div class="modal fade" id="modal_editar">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Información - #<span id="id_art"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="email" class="form-control" id="nombre_art">
                    </div>
                    <div class="form-group">
                        <label>Etiqueta</label>
                        <input type="email" class="form-control" id="etiqueta_art">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="5" id="descripcion_art"></textarea>
                    </div>
                    <div class="col-12" id="img_art">

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar_modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardar_datos_img();">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@stop


@section('css')
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/img_pagina.js" type="text/javascript"></script>
@stop