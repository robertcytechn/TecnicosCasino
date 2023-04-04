var CyTech = function () {
    "use strict";
    //Url global de sitio
    var url = "http://localhost/TecnicosCasino/";
    //var url = "http://cytechn.ddns.net/control/";
    //opción de debug true para encender modo debugging
    var debug = true;
    function clog(texto) {
        if (debug) {
            console.log(texto);
        }
    }
    //configuraciones para las notificaciones y modals
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

    /**
     * NormalForms. función que envía los formularios de manera normal utilizando ajax
     * serializa los datos y los envía al archivo php que se especifica em el atributo action del formulario
     *
     * @author	José Roberto Tamayo Montejano
     * @since	v0.0.1
     * @version	v1.0.0	Friday, May 3rd, 2019.
     * @return	void    retorna cadena vacía
     */
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
                },
                error: function(xhr){
                    clog(xhr);
                    alertify.error("Error al enviar los datos, error en el servidor");
                },
                success: function(xhr){
                    var json = JSON.parse(xhr);
                    clog(json);
                    if (json.estatus == "success") {
                        alertify.success(json.mensaje);
                        if (json.redirect != "null") {
                            location.href =json.redirect;
                        }
                    }
                    else if (json.estatus == "warning") {
                        alertify.warning(json.mensaje);
                        if (json.redirect != "null") {
                            location.href =json.redirect;
                        }
                    }
                    else{
                        clog(xhr);
                        alertify.error(json.mensaje);
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
        /**
     * btnCambiarEstatus. función que cambia el estatus de un registro, enviando el id y el estatus actual al archivo php que se especifica en el atributo data-urlAction del botón
     *
     * @author	José Roberto Tamayo Montejano
     * @since	v0.1.2
     * @version	v2.0.0	Friday, May 3rd, 2019.
     * @return	void    retorna cadena vacía
     * @param	tabla	Un objeto tabla seleccionado con jquery
     */
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
return {
    init: function(){NormalForms();},
    DataTables: function (datatable,botones) {
        datatable_ajax(datatable, botones);
    }
}
}("Funcionamiento de la pagina");