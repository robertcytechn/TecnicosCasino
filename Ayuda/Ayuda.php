<?php
require_once("../core/global/php/CyTechPhp.php");
$CyDatos = new CyTech();

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Escritorio de comandos técnicos">
    <meta name="author" content="Cy Technologies">
    <title>Control Casino | Información y ayuda</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../core/images/cy icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../vendors/FontAwesome/css/all.min.css">
    <link href="../Bootstrap/css/dashboard.css" rel="stylesheet">
    <link href="../Vendors/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../Vendors/Alertify/css/alertify.min.css" rel="stylesheet">
    <link href="../Vendors/Alertify/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }  
    </style>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Control Casinos</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav d-none d-md-block">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 cytech-cerrarSesionButton" href="#">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php $CyDatos->getMenus(); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- menu superior dentro de la pagina -->
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Soporte y ayuda...</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>

                <!-- contenido de la pagina -->
                <section class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample">

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="HeadControlCasino">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#AcercaControlCasino" aria-expanded="true"
                                                    aria-controls="AcercaControlCasino">
                                                    Acerca de Control Casino  &nbsp; &nbsp;<i class="fa-solid fa-gears fa-spin text-primary"></i>
                                                </button>
                                            </h2>
                                            <div id="AcercaControlCasino" class="accordion-collapse collapse show text-center"
                                                aria-labelledby="HeadControlCasino" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>La aplicacion Control Casino</strong> Es un software diseñado para llevar el control de los errores, fallas y problemas relacionados con las maquinas del casino.
                                                    <br>
                                                    Generar reportes y estadisticas de los problemas mas comunes y frecuentes.
                                                    <br>
                                                    lleva el control de los procesos que realizan los tecnicos, asi como las pruebas que se realizan a las maquinas.
                                                    <br>
                                                    Tambien otorga informacion de las maquinas que estan actualmente en proceso de reparacion, con falla o totalmente operativas.
                                                    <br>
                                                    Informa y genera estadisticas de las fallas mas comunes y de las maquinas que mas fallan
                                                    <br>
                                                    Integra un sistema de control de inventario para los insumos o materiales de tecnicos, por ejemplo cintas, tornillos, piezas, etc.
                                                    <br>
                                                    Este software se encuentra en face <strong class="text-warning">Alpha</strong> y se encuentra en desarrollo, por lo que puede contener errores o fallas.
                                                    <br>
                                                    <strong>Control Casino &reg;</strong> es un software desarrollado por <strong>Cy Technologies</strong> y es propiedad de <strong>Cy Technologies</strong> &copy; 2023
                                                    <br>
                                                    Version <strong class="text-danger">Alpha 1.3.6</strong>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headSoporteT">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#AcordionSoporteTecnico"
                                                    aria-expanded="false" aria-controls="AcordionSoporteTecnico">
                                                    Soporte Tecnico &nbsp; &nbsp;<i class="fa-solid fa-square-phone-flip text-secondary"></i>
                                                </button>
                                            </h2>
                                            <div id="AcordionSoporteTecnico" class="accordion-collapse collapse"
                                                aria-labelledby="headSoporteT" data-bs-parent="#accordionExample">
                                                <div class="accordion-body text-center">
                                                    <p>Si es necesario puede comunicarse con <strong>José Roberto Tamayo Montejano</strong> al numero celular <strong>+52 443 716 0182</strong> via WhatsApp en un horario de 8:00 am a 3:00 pm</p>
                                                    <p>Todos Los mensajes y reportes seran atendidos lo antes posible, el tiempo de respuesta puede variar</p>
                                                    <p class="text-danger"><strong>Importante</strong>  Este apartado es solo para emergencias, reportes que no sean de caracter urgente no se contestaran, si desea generar un reporte normal en el menu de soporte y ayuda y submenu soporte puede levantar un reporte normal para su revision</p>
                                                    <p class="text-danger"><strong>No use este medio si no es nescesario</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headLicencia">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#LicenciaAcordion"
                                                    aria-expanded="false" aria-controls="LicenciaAcordion">
                                                    Licencia - Terminos y condiciones &nbsp; &nbsp;<i class="fa-solid fa-file-circle-exclamation text-success"></i>
                                                </button>
                                            </h2>
                                            <div id="LicenciaAcordion" class="accordion-collapse collapse"
                                                aria-labelledby="headLicencia" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Control Caaino © 2023 Cy Technologies. Todos los derechos
                                                    reservados. Control Casino es una marca
                                                    registrada de Cy Technologies. Ninguna parte de este software puede
                                                    ser reproducida,
                                                    distribuida, modificada o transmitida sin el permiso previo y por
                                                    escrito de Cy Technologies.<br>
                                                    <br><br><br><br>

                                                    <h5 class="text-primary">***************** Descripcion del producto
                                                        *****************</h5><br>

                                                    Este software fue creado para llevar el un mejor control de los
                                                    sucesos que ocurranen el establecimiento,
                                                    asi como controlar la información resultante de las practicas que se
                                                    realizaran<br>
                                                    en el area tecnica y de sistemas del establecimiento.<br>
                                                    Control de maquinas y sus estatus de mantenimeinto o fallos que
                                                    presenten.<br>
                                                    Control de los usuarios que usan el software.<br>
                                                    Controlar la información de reparacion de las maquinas.<br>
                                                    Controlar la información de proveedores de las maquinas, sus numeros
                                                    de telefono, sus correos electronicos
                                                    de contacto.<br>
                                                    Dar avisos de mantenimiento preventivo y correctivo de las
                                                    maquinas.<br>
                                                    Dar avisos de mantenimiento preventivo y correctivo de los equipos
                                                    de computo.<br>
                                                    Informar sobre los sucesos que ocurran en el establecimiento de
                                                    manera diaria.<br>
                                                    Informar sobre los estatus de todas las maquinas del
                                                    establecimiento.<br>
                                                    Informar sobre los estatus de todos los equipos de computo del
                                                    establecimiento.<br>
                                                    Informar sobre los estatus de todos los usuarios del
                                                    establecimiento.<br>
                                                    Informar sobre los estatus de todos los proveedores del
                                                    establecimiento.<br>
                                                    Mostrar información imprtante sobre las maquinas, equipos de
                                                    computo, usuarios y proveedores del
                                                    establecimiento.<br>
                                                    Mostrar información de contacto de los proveedores del
                                                    establecimiento.<br>
                                                    Otorgar una base de conocimiento donde se adjuntaran manuales de uso
                                                    y reperacion de las maquinas y
                                                    equipos de computo del establecimiento.<br>
                                                    Este software incluye todas las funciones mencionadas anteriormente,
                                                    además de herramientas de
                                                    inteligencia de negocio para optimizar el manejo de la sala.<br>

                                                    <br><br><br><br>

                                                    <h5 class="text-primary">***************** Política de privacidad
                                                        *****************</h5><br>

                                                    ¿Como usamos tus datos personales?
                                                    En Cy Technologies SA de CV de RL, respetamos tu derecho a la
                                                    privacidad y nos comprometemos a proteger la
                                                    información personal que nos proporciones.<br>
                                                    En esta Política de Privacidad, te informamos sobre cómo recopilamos
                                                    y utilizamos tus datos personales
                                                    cuando utilizas nuestro sitio web y nuestra aplicación móvil,
                                                    en cumplimiento con la Ley Federal de Protección de Datos Personales
                                                    en Posesión de los Particulares
                                                    (LFPDPPP) y su Reglamento (RLFPDPPP).<br>
                                                    Esta Política de Privacidad se aplica a toda la información personal
                                                    que nos proporciones o que
                                                    recopilemos de ti cuando utilices nuestros servicios.<br>
                                                    Te recomendamos que leas detenidamente esta Política de Privacidad y
                                                    te asegures de que la comprendes. Si
                                                    no estás de acuerdo con esta Política de Privacidad,
                                                    no utilices nuestros servicios ni nos proporciones tus datos
                                                    personales.<br><br>

                                                    <strong>¿Qué información recopilamos?</strong><br>
                                                    Recopilamos información personal que nos proporcionas directamente,
                                                    por ejemplo, cuando te registras en
                                                    nuestro sitio web o aplicación móvil,
                                                    cuando nos envías un correo electrónico o cuando nos proporcionas
                                                    información a través de nuestro sitio
                                                    web o aplicación móvil.<br>
                                                    La información personal que recopilamos incluye tu nombre, dirección
                                                    de correo electrónico, dirección
                                                    postal, número de teléfono
                                                    y otra información que nos proporciones al utilizar nuestros
                                                    servicios.<br>
                                                    No recopilamos información personal de menores de edad, si usted es
                                                    menor de edad no proporcione
                                                    información personal a Cy Technologies SA de CV de RL.<br>
                                                    No recopilamos información de geolocalizacion, ni información de
                                                    navegacion, ni información de cookies, ni
                                                    información de terceros.<br>
                                                    No recopilamos información de redes sociales, ni información de
                                                    terceros.<br>
                                                    No recopilamos información de tarjetas de credito, ni debito, ni
                                                    información bancaria, si al utilizar
                                                    nuestro sitio web o aplicacion movil se le solicita información de
                                                    este tipo,
                                                    NO rellene ningun campo y reportelo a Cy Technologies SA de CV de
                                                    RL. ya que es un intento de fraude y/o
                                                    suplantacion de identidad.<br><br>

                                                    <strong>¿Cómo utilizamos tu información personal?</strong><br>
                                                    Utilizamos tu información personal para proporcionarte nuestros
                                                    servicios, para responder a tus consultas
                                                    y para otros fines que se describen en esta Política de
                                                    Privacidad.<br>
                                                    La información personal que recopilamos nos permite:<br>
                                                    - Crear y administrar tu cuenta.<br>
                                                    - Enviar correos electrónicos de confirmación de registro.<br>
                                                    - Enviarte notificaciones de actualización de nuestros
                                                    servicios.<br>
                                                    - Enviarte correos electrónicos de servicio al cliente.<br>
                                                    - Enviarte correos electrónicos de marketing.<br>
                                                    - Enviar notificaciones push a tu dispositivo móvil.<br>
                                                    - Enviarte mensajes de texto a tu dispositivo móvil.
                                                    - Enviarte mensajes de WhatsApp a tu dispositivo móvil.<br>
                                                    - Enviar notificaciones importantes<br>
                                                    <br>
                                                    <strong>¿Cómo protegemos tu información personal?</strong><br>
                                                    Hemos implementado medidas de seguridad técnicas y organizativas
                                                    para proteger tu información personal
                                                    contra pérdida, uso indebido, acceso no autorizado, divulgación,
                                                    alteración o destrucción.<br>
                                                    Tambien siframos la información que nos proporcionas, que usas y que
                                                    almacenamos en nuestros servidores
                                                    para protegerla de accesos no autorizados.<br>
                                                    Sin embargo, ten en cuenta que, a pesar de que tomamos medidas para
                                                    proteger tu información, ningún sitio
                                                    web, sistema de transmisión de datos, sistema informático o conexión
                                                    inalámbrica es completamente
                                                    seguro.<br>
                                                    <br>
                                                    <strong>¿Cuáles son tus derechos de privacidad?</strong><br>
                                                    Tienes derecho a solicitar una copia de la información personal que
                                                    tenemos sobre ti, a corregirla,
                                                    actualizarla o eliminarla.<br>
                                                    También tienes derecho a solicitar que dejemos de utilizar tu
                                                    información personal con fines de
                                                    marketing.<br>
                                                    Si deseas ejercer alguno de estos derechos, comunícate con nosotros
                                                    a través de la información de contacto
                                                    que se proporcionó.<br>
                                                    Si tienes una cuenta con nosotros, también puedes acceder a tu
                                                    información personal y actualizarla en
                                                    cualquier momento iniciando sesión en tu cuenta.<br>
                                                    <br>
                                                    <strong>¿Cómo puedes contactarnos?</strong><br>
                                                    Si tienes alguna pregunta o inquietud sobre esta Política de
                                                    Privacidad o sobre el uso de tu información
                                                    personal,
                                                    comunícate con nosotros a través de la información de contacto que
                                                    se proporcionó.<br>
                                                    <br>
                                                    <strong>¿Compartimos tu información personal?</strong><br>
                                                    Cy Technologies SA de CV de RL no comparte tu información personal
                                                    con nadie, ni con ninguna empresa, ni
                                                    con ningun tercero, ni con ninguna empresa afiliada, ni con ninguna
                                                    empresa asociada, ni con ninguna
                                                    empresa subsidiaria, ni con ninguna empresa relacionada, ni con
                                                    ninguna empresa de terceros.
                                                    Cy Technologies SA de CV de RL no comparte tu información personal
                                                    con ningun solicitante de esta.<br>

                                                    <br><br><br><br>

                                                    <h5 class="text-primary">***************** Terminos y condiciones
                                                        *****************</h5><br>

                                                    Este software fue creado para uso unico de sistemas en casino Crown
                                                    City Morelia y asociados, no se
                                                    permite la distribucion de este software a terceros sin el
                                                    consentimiento de Cy Technologies®<br>
                                                    Queda totalmente prohivido el uso de este software sin licencia
                                                    expedida por Cy Technologies.<br>
                                                    La manipulacion y/o edicion de este software sin el consentimiento
                                                    de Cy Technologies® queda totalmente
                                                    prohibida y es un delito federal.<br>
                                                    Queda totalmente prohivido la toma de captura de video o fotografia
                                                    de este software.<br>
                                                    Este software esta protegido por derechos de autor y es propiedad de
                                                    Cy Technologies. marca
                                                    registrada.<br>
                                                    Queda totalmente prihibido la venta, renta, traspaso, prestamo o
                                                    reutilización de de cuentas de este
                                                    software.<br>

                                                    <br>
                                                    <strong>¿Que venecifios tengo al adquirir una licencia?</strong><br>
                                                    Al adquirir una licencia de este software usted tiene derecho a
                                                    usarlo en los equipos que usted desee,
                                                    siempre y cuando sea para uso personal y no comercial.<br>
                                                    a recibir actualizaciones de este software de manera gratuita.<br>
                                                    a recibir soporte tecnico de este software de manera gratuita.<br>
                                                    a recibir asesoria de este software de manera gratuita.<br>
                                                    a recibir capacitacion de este software de manera gratuita.<br>
                                                    a crear las cuentas de usuario que usted necesite para usar este
                                                    software.<br>
                                                    a solicitar cambios en el software para adaptarlo a sus necesidades
                                                    de manera gratuita.<br>

                                                    <br>
                                                    <strong>¿Que obligaciones tengo al adquirir una
                                                        licencia?</strong><br>
                                                    Al adquirir una licencia de este software usted se compromete a no
                                                    distribuir este software a
                                                    terceros.<br>
                                                    a no manipular ni editar este software.<br>
                                                    a no tomar capturas de video o fotografia de este software.<br>
                                                    a no vender, rentar, traspasar, prestar o reutilizar las cuentas de
                                                    este software.<br>
                                                    a no usar este software con fines comerciales.<br>
                                                    a no usar este software en equipos que no sean de su propiedad.<br>
                                                    a no usar este software en equipos que no sean de su propiedad sin
                                                    el consentimiento del propietario.<br>
                                                    a no usar este software en equipos que no sean de su propiedad sin
                                                    el consentimiento de Cy
                                                    Technologies®.<br>
                                                    <br>
                                                    <strong>¿Que pasa si no cumplo con mis obligaciones?</strong><br>
                                                    Si usted no cumple con sus obligaciones al adquirir una licencia de
                                                    este software, Cy Technologies® se
                                                    reserva el derecho de cancelar su licencia sin previo aviso y sin
                                                    reembolso.<br>
                                                    Cy Technologies® se reserva el derecho de eliminar los datos de su
                                                    cuenta sin previo aviso y sin
                                                    reembolso.<br>
                                                    Cy Technologies® se reserva el derecho de eliminar su cuenta sin
                                                    previo aviso y sin reembolso.<br>
                                                    Cy Technologies® se reserva el derecho de eliminar las cuentas de
                                                    usuario que usted haya creado sin previo
                                                    aviso y sin reembolso.<br>
                                                    <br>
                                                    <strong>¿Que pasa si cancelo mi licencia o decidio pedir la
                                                        eliminacion de mis cuentas?</strong><br>
                                                    Si usted cancela su licencia o decide pedir la eliminacion de sus
                                                    cuentas, Cy Technologies® se reserva el
                                                    derecho de eliminar su cuenta como propietario, las cuentas que
                                                    usted haya creado
                                                    y los datos de su cuenta tras pasar un timepo de 30 dias despues de
                                                    la cancelacion de su licencia o
                                                    despues de que usted haya pedido la eliminacion de sus cuentas.
                                                    <br>
                                                    <strong>¿Que pasa si Cy Technologies® cancela mi licencia o decide
                                                        eliminar mis cuentas?</strong><br>
                                                    Si Cy Technologies® cancela su licencia o decide eliminar sus
                                                    cuentas, Cy Technologies® se compromete a
                                                    notificarle con 30 dias de anticipacion para que usted pueda hacer
                                                    una copia de seguridad de sus
                                                    datos.<br>
                                                    Al no realizar la copia de seguridad de sus datos, Cy Technologies®
                                                    no se hace responsable de la perdida
                                                    de sus datos.<br>
                                                    <br>
                                                    <strong>¿Que pasa si deceo reactivar mi licencia?</strong><br>
                                                    Si usted desea reactivar su licencia, Cy Technologies® se compromete
                                                    a reactivar su licencia sin costo
                                                    alguno siempre y cuando usted no haya incumplido con sus
                                                    obligaciones al adquirir una licencia de este
                                                    software.<br>
                                                    Si usted desea reactivar su licencia, Cy Technologies® se compromete
                                                    a restaurar los datos de su cuenta
                                                    completa siempre y cuando no hayan pasado mas de 30 dias despues de
                                                    la cancelacion de su licencia o
                                                    despues de que usted haya pedido la eliminacion de sus cuentas.<br>
                                                    <br>
                                                    <strong>¿Que pasa si Cy Technologies® cancela mi licencia o decide
                                                        eliminar mis cuentas y yo deseo
                                                        reactivar mi licencia?</strong><br>
                                                    Si Cy Technologies® cancela su licencia o decide eliminar sus
                                                    cuentas y usted desea reactivar su licencia,
                                                    Cy Technologies® se compromete a reactivar su licencia sin costo
                                                    alguno siempre y cuando usted no haya
                                                    incumplido con sus obligaciones al adquirir una licencia de este
                                                    software.<br>
                                                    Si usted desea reactivar su licencia, Cy Technologies® se compromete
                                                    a restaurar los datos de su cuenta
                                                    completa siempre y cuando no hayan pasado mas de 30 dias despues de
                                                    la cancelacion de su licencia o
                                                    despues de que usted haya pedido la eliminacion de sus cuentas.<br>
                                                    Si usted ha incumplido con sus obligaciones al adquirir una licencia
                                                    de este software, Cy Technologies® se
                                                    reserva el derecho de reactivar su licencia con un costo
                                                    adicional.<br>
                                                    Si usted ha incumplido con sus obligaciones al adquirir una licencia
                                                    de este software, Cy Technologies® se
                                                    reserva el derecho de restaurar los datos de su cuenta con un costo
                                                    adicional.<br>
                                                    Cy Technologies® se reserva el derecho de reactivar su licencia de
                                                    manera permanente o temporal.<br>
                                                    <br>
                                                    <strong>¿Que pasa si Cy Technologies® cancelo mi licencia de manera
                                                        permanente?</strong><br>
                                                    Si Cy Technologies® cancela su licencia de manera permanente, Cy
                                                    Technologies® se compromete a notificarle
                                                    con 30 dias de anticipacion para que usted pueda hacer una copia de
                                                    seguridad de sus datos.<br>
                                                    Al no realizar la copia de seguridad de sus datos, Cy Technologies®
                                                    no se hace responsable de la perdida
                                                    de sus datos.<br>
                                                    Si Cy Technologies® cancela su licencia de manera permanente, Cy
                                                    Technologies® no restaurara la cuenta del
                                                    propietario, las cuentas que usted haya creado ni los datos de su
                                                    cuenta.<br>

                                                    <br>
                                                    <strong>¿Que pasa si Cy Technologies® cancelo mi licencia de manera
                                                        temporal?</strong><br>
                                                    Si Cy Technologies® cancela su licencia de manera temporal, Cy
                                                    Technologies® se compromete a no eliminar
                                                    su cuenta, sus cuentas que usted haya creado ni los datos de su
                                                    cuenta.<br>
                                                    su cuenta y licencia quedaran suspendidas hasta que Cy Technologies®
                                                    haga una revicion del estatus de su
                                                    licencia.<br>
                                                    Cy Technologies® se compromete a notificarle sobre el estatus de su
                                                    licencia y sus cambios, lo antes
                                                    posible.<br>
                                                    Una vez que se haya resuelto el estatus de su licencia de manera
                                                    positiva, Cy Technologies® se compromete
                                                    a reactivar su licencia y su cuenta sin costo alguno.<br>
                                                    Una vez que se haya resuelto el estatus de su licencia de manera
                                                    negativa, Cy Technologies® Cancelara su
                                                    cuenta y su licencia de manera permanente y sin previo aviso.<br>
                                                    <br>
                                                    <strong>¿Puedo adquirir una licencia si anteriormente cancelaron mi
                                                        licencia de manera
                                                        permanente?</strong><br>
                                                    Si usted desea adquirir una licencia despues de que Cy Technologies®
                                                    cancelo su licencia de manera
                                                    permanente, Cy Technologies® se reserva el derecho de otorgarle una
                                                    licencia.<br>
                                                    Si usted desea adquirir una licencia despues de que Cy Technologies®
                                                    cancelo su licencia de manera
                                                    permanente, Cy Technologies® se reserva el derecho de otorgarle una
                                                    licencia con un costo adicional y con
                                                    un limite de tiempo y con un limite de uso y con un limite de
                                                    funciones y con un limite de cuentas y con
                                                    un limite de equipos y con un limite de usuarios.<br>
                                                    su cuenta quedara en estatus de prueba hasta que Cy Technologies®
                                                    haga una revicion del estatus de su
                                                    licencia.<br>
                                                    Cy Technologies® se compromete a notificarle sobre el estatus de su
                                                    licencia y sus cambios, lo antes
                                                    posible.<br>
                                                    Una vez que se haya resuelto el estatus de su licencia de manera
                                                    positiva, Cy Technologies® se compromete
                                                    a reactivar su licencia y su cuenta sin costo alguno.<br>
                                                    <br>
                                                    <strong>¿Puedo adquirir una licencia si anteriormente cancelaron mi
                                                        licencia de manera
                                                        temporal?</strong><br>
                                                    Si usted desea adquirir una licencia despues de que Cy Technologies®
                                                    cancelo su licencia de manera
                                                    temporal, Cy Technologies® se reserva el derecho de otorgarle una
                                                    licencia.<br>
                                                    Sera necesario que cy Technologies® haga una revicion del estatus de
                                                    su licencia y pueda ser
                                                    reactivada.<br>
                                                    <br>
                                                    <strong>¿Cuantas licencias puedo adquirir?</strong><br>
                                                    Cy Technologies® se reserva el derecho de otorgarle mas de una
                                                    licencias por establecimiento.<br>
                                                    si desea adquirir una nueva licencia para otro establecimiento
                                                    debera adquirir una nueva licencia.<br>
                                                    Si desea adquirir una nueva licencia para otro establecimiento
                                                    debera contactarse con Cy Technologies®
                                                    para que le sea otorgada una nueva licencia en un nuevo convenio con
                                                    Cy Technologies®.<br>
                                                    <br>
                                                    <strong>¿Que costo tiene una licencia para este
                                                        software?</strong><br>
                                                    El costo de una licencia para este software no es de una sola
                                                    cantidad, el costo de una licencia para este
                                                    software es de una cantidad mensual y sera en convenio con Cy
                                                    Technologies®.<br>
                                                    El costo de licencia esta suejto a cambios con previo aviso por
                                                    parte de Cy Technologies®.<br>

                                                    <br><br><br><br>
                                                    <strong>Cy Technologies SA de CV de RL Cuachalalate #247 col.
                                                        Francisco Xavier Clavijero, Morelia Mich.
                                                        CP. 58254 <br>
                                                        José Roberto Tamayo Montejano <br>
                                                        robert-cyby@hotmail.com <br></trong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>

    <script src="../Core/global/js/JQuery.js"></script>
    <script src="../Vendors/Alertify/alertify.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/FontAwesome/js/all.min.js"></script>
    <script src="../Vendors/DataTables/datatables.min.js"></script>
    <script src="../Core/global//js/CyTechJS.js"></script>
    <script>
        CyTech.init();
    </script>
</body>

</html>