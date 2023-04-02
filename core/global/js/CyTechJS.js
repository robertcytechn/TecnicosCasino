var CyTech = function () {
    "use strict";
    //Url global de sitio
    //var url = "http://localhost/TecnicosCasino/";
    var url = "http://cytechn.ddns.net/control/";
    //opcion de debugueo true para encender modo debugging
    var debug = true;
    function clog(texto) {
        if (debug) {
            console.log(texto);
        }
    }
    //Funcion para mostrar notificaciones
    alertify.defaults.glossary.ok = "Aceptar";
    alertify.defaults.glossary.cancel = "Cancelar";
    alertify.defaults.glossary.confirm = "Confirmar";
    alertify.defaults.glossary.close = "Cerrar";
    alertify.defaults.glossary.maximize = "Maximizar";
    alertify.defaults.glossary.minimize = "Minimizar";
    alertify.defaults.glossary.restore = "Restaurar";
    alertify.defaults.glossary.input = "Ingresar";
    alertify.defaults.glossary.select = "Seleccionar";
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";
    alertify.defaults.glossary.title = "Control Casinos";
    alertify.defaults.notifier.position = "top-right";
    alertify.defaults.notifier.delay = 5;
    alertify.defaults.notifier.close = true;
    alertify.defaults.notifier.pauseOnHover = true;
    alertify.defaults.notifier.button = true;


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
    /**
     * datatable. función que crea y manipula las tablas usando dataTables plugin
     *
     * @author	José Roberto Tamayo Montejano
     * @since	v0.0.1
     * @version	v1.0.0	Friday, May 3rd, 2019.
     * @param	tabla	Un objeto tabla seleccionado con jquery
     * @param	botones	Un objeto botones un div que va a contener los botones de exportación
     * @return	void    retorna cadena vacía
     */
        function datatable_ajax(tabla, botones) {
            var element = tabla.DataTable({
                "ajax" : {
                    url: url+tabla.attr("data-link"),
                    type:"POST"
                },
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: "copy",
                        text: '<span class="fa fa-lg fa-copy"></span> Copiar',
                        titleAttr: "Copiar Tabla",
                        className: "btn btn-info"
                    },
                    {
                        extend: "excel",
                        text: '<span class="fa fa-lg fa-file-excel"></span> Excel',
                        titleAttr: "Exportar tabla a excel",
                        className: "btn btn-success"
                    },
                    {
                        extend: "pdf",
                        text: '<span class="fa fa-lg fa-file-pdf"></span> Pdf',
                        titleAttr: "Exportar tabla a PDF",
                        className: "btn btn-danger"
                    },
                    {
                        extend: "print",
                        text: '<span class="fa fa-lg fa-print"></span> Imprimir',
                        titleAttr: "Imprimir la tabla",
                        className: "btn btn-dark"
                    },
                ],
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Todas"] ],
                language: {
                    "decimal":        ".",
                    "emptyTable":     "No hay información que mostrar",
                    "info":           "Mostrando _START_ Al _END_ De _TOTAL_ Filas",
                    "infoEmpty":      "No hay resultados para la búsqueda",
                    "infoFiltered":   "(Filtrando De _MAX_ Filas)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ Filas",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar: ",
                    "zeroRecords":    "No hay resultados para la búsqueda",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Ultima",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                }
            });
            element.buttons().container().appendTo(botones);
            element.on("draw", function () {
                btnCambiarEstatus(element);
            });
        }
    function btnCambiarEstatus(tabla) {
        $(".btnCambiarEstatus").click(function (e) {
            e.preventDefault();
            alerta("draw", "draw", "alert");
                var b = $(this);
                $.ajax({
                    url: url + b.attr("data-urlAction"),
                    type: "POST",
                    data: "id=" + b.attr("data-id") + "&estatus=" + b.attr("data-estatus"),
                    async: true,
                    success: function (xhr) {
                        var f = xhr.split("??", 2);
                        //notificacion(f[0], f[1]);
                        //tabla.ajax.reload();
                    }
                });
        });
    }
    /**
     * alerta. función que crea y manipula las alertas usando notiy plugin
     *
     * @author	José Roberto Tamayo Montejano
     * @since	v0.0.1
     * @version	v1.0.0	Wednesday, Mar 30th, 2023.
     * @param	titulo	Un string titulo que contiene el titulo a mostrar
     * @param	mensaje Un string mensaje que contiene el mensaje a mostrar
     * @param	tipo	Un string tipo  que contiene el tipo de alerta a mostrar (alert | success | error | warning | info)
     * @return	void    retorna cadena vacía
     */
    function alerta(titulo, mensaje, tipo){

    }
return {
    init: function(){NormalForms();},
    DataTables: function (datatable,botones) {
        datatable_ajax(datatable, botones);
    }
}
}("Funionamiento de la pagina");