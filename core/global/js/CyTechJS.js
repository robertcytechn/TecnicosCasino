var CyTech = function () {
    "use strict";
    //Url global de sitio
    var url = "http://localhost/TecnicosCasino/";
    //var url = "http://cytechn.ddns.net/";
    //opcion de debugueo true para encender modo debugging
    var debug = true;
    function clog(texto) {
        if (debug) {
            console.log(texto);
        }
    }

    function NormalForms() {
        $(".cytech-form").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: url + "core/" + form.attr("action"),
                type: "POST",
                data: form.serialize(),
                async: true,
                processData: true,
                beforeSend: function(){
                    $("#spinner-cytech").removeClass("visually-hidden");
                },
                error: function(){
                    $("#contenido-modal-cytech").html('<div class="alert alert-danger" role="alert"> ocurrió un error al tratar de iniciar sesión, contacta con soporte técnico </div>'); $('#CyModal').modal('show');
                    $("#spinner-cytech").addClass("visually-hidden");
                },
                success: function(xhr){
                    clog(xhr);
                    var json = JSON.parse(xhr);
                    $("#contenido-modal-cytech").html('<div class="'+json.estatus+'" role="alert">'+json.mensaje+'</div>'); $('#CyModal').modal('show');
                        $("#spinner-cytech").addClass("visually-hidden");
                    if (json.resultado == "ok"){
                        location.href = json.redirect
                    }
                }
            });
        });
    }
return {
    init: function(){NormalForms();}
}
}("Funionamiento de la pagina");