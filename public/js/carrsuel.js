$(document).ready(function () {
    APPEND_IMF_CARRUSEL();
    btn_img_guardar_carrusel();
});

function btn_img_guardar_carrusel() {
    $.ajax({
        async:false,
        type: "get",
        url: "/cantidad_img_carrusel",
        data: {

        },
        dataType: "json",
        success: function (response) {
            if (response.length < 5) {
                $("#btn_carrusel").show();
            }else{
                $("#btn_carrusel").hide();
            }
        }
    });

}


function img_guardar_carrusel() {
    $.ajax({
        type: "get",
        url: "/cantidad_img_carrusel",
        data: {

        },
        dataType: "json",
        success: function (response) {
            if (response.length < 5) {
                img_guardar_carrusel1();
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'No puedes subir mas de 5 imagenes',
                    showConfirmButton: true,
                })
            }
        }
    });

}

function img_guardar_carrusel1(){

    var formData = new FormData();
    var file = $('#INPUT_DEL_IMG_CARRUSEL')[0].files[0];
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    formData.append('imagen', file);
    formData.append('_token', token);

    if( file == "" || file == undefined){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No puede estar vacio el  campo de IMG',
            showConfirmButton: true,
        })
    }else{
        $.ajax({
            url: '/img_carrusel',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              if (response.BD == "se guardo la info en db") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se guardo corrrectamente la imagen',
                    showConfirmButton: true,
                })
                $("#INPUT_DEL_IMG_CARRUSEL").val("");
                APPEND_IMF_CARRUSEL();
                btn_img_guardar_carrusel();
              }
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar la imagen');
            }
        });
    }
}

function APPEND_IMF_CARRUSEL(){
    $.ajax({
        type: "GET",
        url: "/datos_img_carrusel",
        data: {
        },
        dataType: "json",
        success: function (response) {
            document.getElementById('img_append_carrusel').innerHTML="";
           $.each(response, function (indexInArray, response) { 
             $("#img_append_carrusel").append(
                "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'>"+
                    "<div class='card bg-light d-flex flex-fill'>"+
                        "<div class='card-header text-muted border-bottom-0'>"+
                           "Art graphic"+
                        "</div>"+
                        "<div class='card-body pt-0'>"+
                            "<div class='row'>"+
                                "<div class='col-7'>"+
                                    "<h2 class='lead'><b>"+indexInArray+"</b></h2>"+
                                    "<ul class='ml-4 mb-0 fa-ul text-muted'>"+
                                       " <li class='small'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> fecha: "+response.fecha+""+
                                        "</li>"+
                                    "</ul>"+
                               " </div>"+
                                "<div class='col-5 text-center'>"+
                                    "<img src='../img/img_carrusel/"+response.nombre_img+"' alt='user-avatar' class='img-circle img-fluid'>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                        "<div class='card-footer'>"+
                           " <div class='text-right'>"+
                                "<b class='btn btn-sm bg-danger' onclick='eliminar_img_carru("+response.id+",\""+response.nombre_img+"\",)'>"+
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

function eliminar_img_carru(id,name) {

    $.ajax({
        type: "get",
        url: "/eliminar_img_carrusel",
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
                APPEND_IMF_CARRUSEL();
                btn_img_guardar_carrusel();
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