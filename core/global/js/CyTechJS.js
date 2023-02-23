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
                        className: "uk-button uk-button-primary"
                    },
                    {
                        extend: "excel",
                        text: '<span class="fa fa-lg fa-file-excel"></span> Excel',
                        titleAttr: "Exportar tabla a excel",
                        className: "uk-button uk-button-primary"
                    },
                    {
                        extend: "pdf",
                        text: '<span class="fa fa-lg fa-file-pdf"></span> Pdf',
                        titleAttr: "Exportar tabla a PDF",
                        className: "uk-button uk-button-primary"
                    },
                    {
                        extend: "print",
                        text: '<span class="fa fa-lg fa-print"></span> Imprimir',
                        titleAttr: "Imprimir la tabla",
                        className: "uk-button uk-button-secondary"
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
            $(".uk-form-inline > label").addClass("uk-label");
            $(".uk-form-inline > label").css('width',"auto");
            $(".dataTables_wrapper > .lista_cantidad > label").addClass("uk-label");
            $(".dataTables_wrapper > .lista_cantidad > label > select").addClass("uk-select uk-input-dt");
            element.on("draw", function () {
                botonEliminarDatatables(element);
            });
        }
        function botonEliminarDatatables(tabla) {
            $(".button_eliminar_datatable").click(function (e) {
                e.preventDefault();
                var b = $(this);
                var i = b.attr("data-idnot");
                var l = b.attr("data-link");
                $.ajax({
                    url: url + l,
                    type: "POST",
                    data: "idnot=" + i,
                    async: true,
                    success: function (xhr) {
                        var f = xhr.split("??", 2);
                        notificacion(f[0], f[1]);
                        tabla.ajax.reload();
                    }
                });
             });
        }
return {
    init: function(){NormalForms();},
    DataTables: function (datatable,botones) {
        datatable_ajax(datatable, botones);
    }
}
}("Funionamiento de la pagina");