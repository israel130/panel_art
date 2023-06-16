$(document).ready(function () {
    imagenes_pagina_web();
});


function img_guardar(){

    var NOMBRE = $("#name_img").val();
    var ETIQUETA = $("#name_etiqueta").val();

    var formData = new FormData();
    var file = $('#INPUT_DEL_IMG')[0].files[0];
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    formData.append('imagen', file);
    formData.append('_token', token);
    formData.append('NOMBRE', NOMBRE);
    formData.append('ETIQUETA', ETIQUETA);

    if(NOMBRE == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No puede estar vacio el  campo Nombre',
            showConfirmButton: true,
        })
    }else if(ETIQUETA == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No puede estar vacio el  campo Etiqueta',
            showConfirmButton: true,
        })
    }else if( file == "" || file == undefined){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No puede estar vacio el  campo de IMG',
            showConfirmButton: true,
        })
    }else{
        $.ajax({
            url: '/imgguardarpub',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              if (response.BD == "se guardo la info en db") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se guardo corrrectamente la informacion',
                    showConfirmButton: true,
                })
                $("#name_img").val("");
                $("#name_etiqueta").val("");
                $("#INPUT_DEL_IMG").val("");
                imagenes_pagina_web();
              }
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar la imagen');
            }
        });
    }
}


function imagenes_pagina_web() {
    
    $.ajax({
        type: "GET",
        url: "/datos_img_catalogo",
        data: {
        },
        dataType: "json",
        success: function (response) {
            document.getElementById('img_append').innerHTML="";
           $.each(response, function (indexInArray, response) { 
             $("#img_append").append(
                "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>"+
                    "<div class='card bg-light d-flex flex-fill'>"+
                        "<div class='card-header text-muted border-bottom-0'>"+
                           ""+response.etiqueta+""+
                        "</div>"+
                        "<div class='card-body pt-0'>"+
                            "<div class='row'>"+
                                "<div class='col-7'>"+
                                    "<h2 class='lead'><b>"+response.nombre_descrip+"</b></h2>"+
                                    "<ul class='ml-4 mb-0 fa-ul text-muted'>"+
                                       " <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> fecha: "+response.fecha+""+
                                        "</li>"+
                                    "</ul>"+
                               " </div>"+
                                "<div class='col-5 text-center'>"+
                                    "<img src='../img/img_web/"+response.nombre_url+"' alt='user-avatar' class='img-circle img-fluid'>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        "<div class='card-footer'>"+
                           " <div class='text-right'>"+
                                "<b class='btn btn-sm bg-danger' onclick='eliminar("+response.id+",\""+response.nombre_url+"\",)'>"+
                                    "<i class='fas fa-trash-alt'></i>"+
                                "</b>"+
                            "</div>"+
                       " </div>"+
                    "</div>"+
                "</div>"
             );
           });
        }
    });
}


function eliminar(id,name) {

    $.ajax({
        type: "get",
        url: "/eliminar_img_catalogo",
        data: {
            id,
            name
        },
        dataType: "json",
        success: function (response) {
            if (response.delete === 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se elimino la IMG',
                    showConfirmButton: false,
                    timer: 2500
                })
                imagenes_pagina_web();
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'No se elimino la IMG',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        }
    });
}


