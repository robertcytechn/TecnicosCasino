"use strict";
//Url global de sitio web, se cambia dependiendo si se esta en localhost o en el servidor
var url = "http://localhost/TecnicosCasino/";
if (document.domain != "localhost") {
    var url = "http://cytechn.ddns.net/";
}

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
     * CargarCotenidoDiv Funcion que hace un llamado ajax a un archivo php y carga el contenido en un div
     * 
     * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Friday, May 3rd, 2023.
     * @return	void    retorna cadena vacía
*/
function CargarCotenidoDiv() {
    $(".cytech-load-content").click(function (e) {
        var b = $(this);
        e.preventDefault();
        var b = $(this);
        $.ajax({
            url: url + b.attr("data-link"),
            type: "POST",
            data: "id=" + b.attr("data-id"),
            async: true,
            processData: true,
            beforeSend: function () {
            },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                clog(xhr);
                var divcontend = b.attr("data-div-load");
                $("#" + divcontend).html(xhr);
            }
        });
    });
}

/**
 * btnCambiarEstatus. función que cambia el estatus de un registro en la base de datos
 * dependiendo del valor que tenga el atributo data-estatus del boton
 * @param {datatable} tabla 
 * @return	void    retorna cadena vacía
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @autor	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 */
function btnCambiarEstatus(tabla) {
    $(".btnCambiarEstatus").click(function (e) {
        e.preventDefault();
        var b = $(this);
        $.ajax({
            url: url + b.attr("data-urlAction"),
            type: "POST",
            data: "id=" + b.attr("data-id") + "&estatus=" + b.attr("data-estatus"),
            async: true,
            beforeSend: function () { },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                var json = JSON.parse(xhr);
                alertify.notify(json.mensaje, json.estatus, 5);
                if (json.reload == "true") {
                    tabla.ajax.reload();
                }
            }
        });
    });
}

/**
 * NormalForms. función que envía los formularios de manera normal utilizando ajax
 * serialize los datos y los envía al archivo php que se especifica em el atributo action del formulario
 *
 * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @return	void    retorna cadena vacía
 */
function NormalForms() {
    $(".cytech-form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: url + form.attr("action"),
            type: "POST",
            data: form.serialize(),
            async: true,
            processData: true,
            beforeSend: function () {
            },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                var json = JSON.parse(xhr);
                clog(json);
                alertify.notify(json.mensaje, json.estatus, 5);
                if (json.redirect != "null" && json.redirect != "reset") {
                    setTimeout(function () {
                        window.location.href = json.redirect;
                    }, 3000);
                }
                else if (json.redirect == "reset") {
                    form.trigger("reset");
                }
            }
        });
    });
}

/**
 * CerrarSesionButton. función que envía los datos necesarios para cerrar sesion usando ajax
 * una vez sesion cerrada nos rediriige a la pagina de login
 * 
 * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @return	void    retorna cadena vacía
 */
function CerrarSesionButton() {
    $(".cytech-cerrarSesionButton").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: url + "core/global/php/Logout.php",
            type: "POST",
            data: "LogOut=true",
            async: true,
            processData: true,
            beforeSend: function () {
            },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                var json = JSON.parse(xhr);
                clog(json);
                alertify.notify(json.mensaje, json.estatus, 5);
                if (json.redirect != "null" && json.redirect != "null") {
                    setTimeout(function () {
                        window.location.href = url + "login";
                    }, 3000);
                }
            }
        });
    });
}
/**
 * NormalForms. función que envía los formularios de manera normal utilizando ajax
 * serialize los datos y los envía al archivo php que se especifica em el atributo action del formulario
 *
 * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @return	void    retorna cadena vacía
 */
function AlterTableForms() {
    $(".cytech-formAlterTable").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: url + form.attr("action"),
            type: "POST",
            data: form.serialize(),
            async: true,
            processData: true,
            beforeSend: function () {
            },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                var json = JSON.parse(xhr);
                clog(json);
                alertify.notify(json.mensaje, json.estatus, 5);
                if (json.reload != "null") {
                    $("#"+form.attr("data-table")).DataTable().ajax.reload();  
                    $("#"+form.attr("data-modal")).modal("hide");
                    form.trigger("reset");                 
                }
            }
        });
    });
}

/**
 * datatable. función que crea y manipula las tablas usando dataTables plugin
 *
 * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @param	tabla	Un objeto tabla seleccionado con jquery
 * @param	botones	Un objeto botones un div que va a contener los botones de exportación
 * @return	void    retorna cadena vacía
 */
function datatable_ajax(tabla, botones) {
    var element = tabla.DataTable({
        responsive: true,
        "ajax": {
            url: url + tabla.attr("data-link"),
            type: "POST"
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
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todas"]],
        language: {
            "decimal": ".",
            "emptyTable": "No hay información que mostrar",
            "info": "Mostrando _START_ Al _END_ De _TOTAL_ Filas",
            "infoEmpty": "No hay resultados para la búsqueda",
            "infoFiltered": "(Filtrando De _MAX_ Filas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Filas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar: ",
            "zeroRecords": "No hay resultados para la búsqueda",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
    element.buttons().container().appendTo(botones);
    element.on("draw", function () {
        btnCambiarEstatus(element);
        CargarCotenidoDiv();
    });
}

/**
 * Cargar_Modelos_Select. función que carga los modelos de un select dependiendo del proveedor seleccionado
 *
 * @author	José Roberto Tamayo Montejano <robert-cyby@hotmail.com>
 * @since	v0.0.1
 * @version	v1.0.0	Friday, May 3rd, 2023.
 * @return	void    retorna cadena vacía
 */
function Cargar_Modelos_Select() {
    $(".select-option-change").change(function (e) {
        var select = $(this);
        $.ajax({
            url: url + select.attr("data-link"),
            type: "POST",
            data: "id=" + select.val(),
            async: true,
            processData: true,
            beforeSend: function () {
            },
            error: function (xhr) {
                clog(xhr);
                alertify.error("Error al enviar los datos, error en el servidor");
            },
            success: function (xhr) {
                clog(xhr);
                $(".select-option-load").html(xhr);
            }
        });
    });
}
var CyTech = function () {
    return {
        init: function () { NormalForms(), Cargar_Modelos_Select(), AlterTableForms(), CerrarSesionButton(); },
        DataTables: function (datatable, botones) {
            datatable_ajax(datatable, botones);
        }
    }
}("Funcionamiento de la pagina");
