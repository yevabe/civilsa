/*!
@Scripts Js Aplicativo (Mensajes de las Aplicaciones)
@version 1.0.
@description Scripts globales de los mensajes del Gestor Clínico.
@Autor Santiago Arango Gutierrez - Auxiliar de analisis y desarrollo Clínica Somer.
@Año 2020.
@Modificacion _
@Año modificacion _
*/
/*Función que imprime los mensajes desde la parte derecha de la ventana*/
function mensajeAplicacionesLogin(accion, tipMsj, msg) {
    valVisibility();
    setTimeout(function () {
        let mensajeLogin = `<div class="mensajesLogin" onclick="$(this).hide();" style="border-left-color: var(--${tipMsj});border-left-width: 5px;">
  <table class="table-msg" width="100%">
  <tr> 
	<td style="border:0px;width:15%;">
	<div id="animation" style="width:90%;float:left; margin-right:0px;"></div>
	</td>
  <td style="border:0px; text-align:left; font-size: medium;">
  <div style='width:100%;float:right;vertical-align:middle;' class='notification-text'>
  ${msg}
	</div>
  </td>
  </tr>
  </table>
  </div>`;
        $("body").append(mensajeLogin);
        lottieImageMsg(tipMsj);
        accionesMsg(accion);
    }, 2);
}

/*Función que imprime los mensajes generales*/
function mensajesAplicaciones(tipMsj, accion, msg) {
    hideMessage();
    setTimeout(function () {
        let mensaje = `<div class="overlayMensajesApp">
    <div class="body-msg" onclick="$(this)[0].parentElement.remove();" style="border-left-color: var(--${tipMsj});border-left-width: 5px;">
    <table class="table-msg" width="100%">
    <tr> 
    <td style="border:0px;width:15%;">
    <div id="animation" style="width:80%;float:left; margin-right:0px;"></div>
    </td>
    <td style="border:0px; text-align:left; font-size: medium;">
    <div style='width:100%;float:right;vertical-align:middle;'>
    <label class='text-mensaje'>
    ${msg}
    </label>
    </div>
    </td>
    </tr>
    </table>
    </div>
    </div>`;
        $("body").append(mensaje);
        lottieImageMsg(tipMsj);
        accionesMsg(accion);
    }, 2);
}

/*Función que imprime los mensajes y redireciona a una RUTA especificada*/
function mensajesAplicaciones2(tipoMsj, accion, ruta, msg, urlOpener) {
    hideMessage();
    setTimeout(function () {
        if (ruta === undefined || ruta === '') { console.error('La ruta no esta definida o fue enviada Vacia'); } else {
            let mensaje = `<div class="overlayMensajesApp">
  <div class="body-msg" onclick="$(this)[0].parentElement.remove();redireccionar('${ruta}')" style="border-left-color: var(--${tipoMsj});border-left-width: 5px;cursor:pointer;">
  <table class="table-msg" width="100%">
  <tr> 
	<td style="border:0px;width:15%;">
	<div id="animation" style="width:80%;float:left; margin-right:0px;"></div>
	</td>
	<td style="border:0px; text-align:left;">
  <label class="text-mensaje">
  ${msg}
  </label>
  </td>
  </tr>
  </table>
  </div>
  </div>`;
            $("body").append(mensaje);
            lottieImageMsg(tipoMsj);
        }
    }, 2);
}

/*Función que imprime el mensaje de confirmación estos se utilizan cuando se debe confirmar que el usuario desea realizar una determinada acción*/
function mensajesAplicaciones3(msg, ruta) {
    hideMessage();
    setTimeout(function () {
        if (ruta === undefined || ruta === '') { console.error('La ruta no esta definida o fue enviada Vacia'); } else {
            let mensaje = `<div class="overlayMensajesApp" id="mensajeAplicaciones3">
    <div class="body-msg" style="border-left-color: var(--information-warning);border-left-width: 5px;">
    <table class="table-msg" width="100%" colpan="4">
    <tr> 
		<td style="border:0px;width:15%;" rowspan="2">
		<div id="animation" style="width:80%;float:left; margin-right:0px;"></div>
		</td>
		<td style="border:0px; text-align:left; font-size: medium;width:70%;" colspan="3">
    <label>${msg}</label></td>
    </tr>
    <tr>
    <td style="border:none;left:0;">
    <button class="btn-information" onclick="redireccionarSi('${ruta}');" style="width:10%;margin-left:-20%;">SI</button>
    <button class="btn-information" onclick="$(this)[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove();" style="width:10%;margin-left:5%;">NO</button>
    </td>
    </tr>
    </table>
    </div>
    </div>`;
            $("body").append(mensaje);
            lottieImageMsg('information');
        }
    }, 2);
}

/*Función que ejecuta el confirm en Ajax -- Retorna TRUE cuando se le da si de lo contrario retorna FALSE */
function mensajesAplicaciones3Ajax(msg) {
    hideMessage();
    let mensaje = `<div class="overlayMensajesApp" id="mensajeAplicaciones3">
    <div class="body-msg" style="border-left-color: var(--information-warning);border-left-width: 5px;">
    <table class="table-msg" width="100%" colpan="4">
    <tr> 
		<td style="border:0px;width:15%;" rowspan="2">
		<div id="animation" style="width:80%;float:left; margin-right:0px;"></div>
		</td>
		<td style="border:0px; text-align:left; font-size: medium;width:70%;" colspan="3">
    ${msg}
    </td>
    </tr>
    <tr>
    <td style="border:none;align:center;">
    <button class="btn-information" id="btnMensajes3Si" style="width:10%;margin-left:20%;">SI</button>
    <button class="btn-information" id="btnMensajes3No" style="width:10%;text-align:center;background:transparent;margin-left:2%;color: var(--red);font-weight:bold;">NO</button>
    </td>
    </tr>
    </table>
    </div>
    </div>`;
    $("body").append(mensaje);
    lottieImageMsg('information');
    $("#btnMensajes3Si").click(function () { $("#btnMensajes3Si")[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove(); });
    $("#btnMensajes3No").click(function () { $("#btnMensajes3No")[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove(); });
}
/*
Esta es la estructura que debe envíar el Usuario Desarrollador
mensajesAplicaciones3Ajax(msg);
$("#btnMensajes3Si").click(function () {
//Opciones a realizar si se da SI
});
$("#btnMensajes3No").click(function () {
//Opciones a realizar si se da NO
});
*/
/*Función que imprime los Lotties en los mensajes*/
function lottieImageMsg(tipMsj) {
    // var protocol = window.location.protocol;
    // var host = window.location.hostname;
    switch (tipMsj) {
        case 'success':
            /**Params: id, path, loop, speed, autoplay*/
            // lottieImage('animation', protocol + '//' + host + '/Base/assets/lotties/successV2.json', false, 1, true);
            lottieImage('animation', '/lotties/success.json', false, 1, true);
            break;
        case 'error':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/error.json', false, 1, true);
            break;
        case 'warning':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/warning.json', true, 1, true);
            break;
        case 'info':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/info.json', false, 1, true);
            break;
        case 'information':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/warning-information.json', true, 1, true);
            break;
        case 'error404':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/404-not-found.json', true, 1, true);
        // break;
        case 'network':
            /**Params: id, path, loop, speed, autoplay*/
            lottieImage('animation', '/lotties/no-internet-connection.json', true, 1, true);
            break;
    }
}
/*Función que genera las acciones determinadas en los mensajes*/
function accionesMsg(accion) {
    if (accion === 'relocate') {
        setTimeout(function () {
            window.location = window.location;
        }, 3000);
    } else if (accion === 'cerrarMensaje') {
        setTimeout(function () {
            hideMessage()
        }, 2000);
    } else if (accion === 'cerrarModal') {
        setTimeout(function () {
            hideMessage()
        }, 2000);
        setTimeout(function () {
            closeModalApp()
        }, 2000);
    } else if (accion === 'cerrarVentana') {
        setTimeout(function () {
            opener.location.reload()
        }, 700);
        setTimeout(function () {
            self.close();
        }, 3000);
    } else if (accion === 'reload') {
        setTimeout(function () {
            window.location.reload()
        }, 3000);
    }
}
/*Función que se utiliza en los mensajesAplicaciones2 para redireccionar a una determinada Ruta*/
function redireccionar(ruta) {
    if (ruta != '') {
        window.location = ruta;
    } else {
        let accion = 'relocate';
        accionesMsg(accion);
    }
}
/*Función que se ejecuta en los mensajesAplicaciones3 para realizar determinada acción y se dan click en el Botón de SI*/
function redireccionarSi(ruta) {
    setTimeout(function () {
        opener.location.reload()
    }, 2000);
    setTimeout(function () {
        window.location = ruta;
    }, 0);
}
/*Función que oculta los mensajes*/
function hideMessage() {
    if ($('.overlayMensajesApp').is(':visible')) {
        $(".overlayMensajesApp").remove();
    }
}

function valVisibility() {
    if ($('.mensajesLogin').is(':visible')) {
        $('.mensajesLogin').remove();
    }
}

/*Modal Global del gestor clínico*/
function modalApp(html, width, height) {
    let div = document.getElementById("modalDilig");
    if (div === undefined || div === null) {
        if (html == '' || html === undefined) {
            let msg = "Verifique la propiedad <strong>HTML</strong> ya que no fue posible cargarla";
            let accion = "";
            let tipoMsj = "warning";
            mensajesAplicaciones(tipoMsj, accion, msg);
        }
        if (width == '' || width === undefined) { width = '90'; }
        if (height == '' || height === undefined) { height = "90"; } else if (height > 100) {
            height = "100";
        }
        let modalAplicacion = `<div class="overlayModalApp">
  <div class="modalApp-body" style="width:${width}%;height:${height}%;">
  <div class="modalApp-header">
  <span class="modalApp-close" onclick="closeModalApp();">&times;</span>
  <div class="modalApp-title">
  
  </div>
  </div>
  <div class="modalApp-content" align="center">
  ${html}
  </div>
  </div>
  </div>
  <div id='modalSuperior'></div>`;
        let modalAplicaciones = document.createElement("DIV");
        modalAplicaciones.setAttribute("id", "modalDilig");
        modalAplicaciones.innerHTML = modalAplicacion;
        $("body").append(modalAplicaciones);
    }
}
/*Función que cierra el modal General*/
function closeModalApp() {
    $("#modalDilig").fadeOut();
    setTimeout(function () {
        $("#modalDilig").remove();
        $("#overlayModalApp").remove();
    }, 1);
}


/*Función que genera un modal Superior al modalApp*/
function modalAppSuper(html, width, height) {
    let div = document.getElementById("modalSuperDilig");
    if (div === undefined || div === null) {
        if (html == '' || html === undefined) {
            let msg = "Verifique la propiedad <strong>HTML</strong> ya que no fue posible cargarla";
            let accion = "";
            let tipoMsj = "warning";
            mensajesAplicaciones(tipoMsj, accion, msg);
        }
        if (width == '' || width === undefined) { width = '90'; }
        if (height == '' || height === undefined) { height = "80"; } else if (height > 80) {
            height = "80";
        }
        let mensajeSuperior = `<div class="overlayModalAppSuper">
  <div class="modalAppSuper-body" style="width:${width}%;height:${height}%;">
  <div class="modalAppSuper-header">
  <span class="modalAppSuper-close" onclick="closeModalAppSuper();">&times;</span>
  <div class="modalAppSuper-title">
  
  </div>
  </div>
  <div class="modalAppSuper-content" align="center">
  ${html}
  </div>
  </div>
  </div>`;
        let modalSuperior = document.createElement("DIV");
        modalSuperior.setAttribute("id", "modalSuperDilig");
        modalSuperior.innerHTML = mensajeSuperior;
        $("#modalSuperior").append(modalSuperior);
    }
}

/*Función que cierra el modal General*/
function closeModalAppSuper() {
    $("#modalSuperDilig").fadeOut();
    $("#modalSuperDilig").remove();
}

/*Función que imprime los mensajes generales*/
function mensajeConnection() {
    hideMessage();
    setTimeout(function () {
        let mensaje = `<div class="overlayMensajesApp">
    <div class="body-msg" onclick="$(this)[0].parentElement.remove();" style="border-left-color: var(--network);border-left-width: 5px;">
    <table class="table-msg" width="100%">
    <tr> 
    <td style="border:0px;width:20%;">
    <img src='../assets/images/server_down.svg' width='100' height='100'>
    </td>
    <td style="border:0px; text-align:center; font-size: medium;">
    <div style='width:90%;vertical-align:middle;'>
    <label class='text-mensaje'>
    <span style='margin-left:2%;'><strong><i class="fas fa-plug"></i> <span style='text-transform:capitalize;'>Parece</span> que no estas conectado.</strong></span>
    <br> <span style='text-transform:capitalize;'>Verifica</span> tu conexión a internet e intenta de nuevo.
    </label>
    </div>
    </td>
    </tr>
    </table>
    </div>
    </div>`;
        $("body").append(mensaje);
    }, 2);
}

/*Función que valida los errores en una solicitud de Ajax*/
function errorsAjax(jqXHR, textStatus, errorThrown) {
    if (jqXHR.status === 0) {
        mensajeConnection();
    } else if (jqXHR.status == 404) {
        let tipMsj = "error404";
        let accion = "";
        let msg = `<strong>Internal Server Error [404].</strong> 
        <br> La página a la que intenta acceder no se encuentra en el servidor `;
        mensajesAplicaciones(tipMsj, accion, msg);
    } else if (jqXHR.status == 500) {
        let tipMsj = "error";
        let accion = "";
        let msg = `<strong>Internal Server Error [500].</strong> 
        <br> Comunicate con el desarrollador a cargo o con el personal de Asistencia técnica `;
        mensajesAplicaciones(tipMsj, accion, msg);
    } else if (textStatus === 'parsererror') {
        let tipMsj = "error";
        let accion = "";
        let msg = `<strong>Requested JSON parse failed.</strong> 
        <br> Comunicate con el desarrollador a cargo o con el personal de Asistencia técnica `;
        mensajesAplicaciones(tipMsj, accion, msg);
        console.info(jqXHR.responseText);
    } else if (textStatus === 'timeout') {
        let tipMsj = "error";
        let accion = "";
        let msg = `<strong>Time out error.</strong> 
        <br> Tiempo de ejecución alcanzado;
        <br> Comunicate con el desarrollador a cargo o con el personal de Asistencia técnica  `;
        mensajesAplicaciones(tipMsj, accion, msg);
    } else if (textStatus === 'abort') {
        let tipMsj = "error";
        let accion = "";
        let msg = `<strong>Ajax request aborted.</strong> 
        <br> Comunicate con el desarrollador a cargo o con el personal de Asistencia técnica  `;
        mensajesAplicaciones(tipMsj, accion, msg);
    } else {
        // alert('Uncaught Error: ' + jqXHR.responseText);
        let tipMsj = "error";
        let accion = "";
        let msg = `<strong>Uncaught Error:</strong> 
        <br><span style="color:var(--red);">${jqXHR.responseText}</span>
        <br> Comunicate con el desarrollador a cargo o con el personal de Asistencia técnica`;
        mensajesAplicaciones(tipMsj, accion, msg);
    }
}
