/*Función que que elimina la imagen*/
$("#formContact").submit(function (e) {
    e.preventDefault();
    enviarContacto();
});

function enviarContacto() {
    let datosValidosDilig = valDatosDilig();
    if (datosValidosDilig === true) {
        $.ajax({
            type: 'POST',
            url: '../../functions/contactFunctions.php',
            data: $("#formContact").serialize(),
            dataType: 'JSON',
            beforeSend: function () {
                $("#btnEnviar").prop('disabled', true);
                $("#btnEnviar").html(`Enviando... <i class="fas fa-spinner fa-lg fa-spin"></i>`);
            },
            success: function (data) {
                if (data == '1') {
                    let tipoMsj = 'success';
                    let msg = `Gracias por contactarte con nosotros, revisa tu correo electrónico
                            <br><span style='color:var(--error);text-align:center;'><small>&bull; Da click sobre este mensaje para cerrarlo</small></span>`;
                    let accion = "cerrarMensaje";
                    mensajesAplicaciones(tipoMsj, accion, msg);
                    insertInfoCorrect();
                } else if (data == '2') {
                    let tipoMsj = 'warning';
                    let msg = `Ya tenemos esta información almacenada
                            <br><strong>Gracias por contactanos con nosotros`;
                    let accion = "";
                    mensajesAplicaciones(tipoMsj, accion, msg);
                    $("#btnEnviar").html(`Enviar <i class="fas fa-exclamation-triangle fa-lg"></i>`);
                    $("#btnEnviar").prop('disabled', false);
                }
            }, error: function (error) {
                console.error(error);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            errorsAjax(jqXHR, textStatus, errorThrown);
            $("#btnEnviar").html('Enviar <i class="fas fa-exclamation-triangle" style="color:var(--information-warning);"></i>');
            $("#btnEnviar").prop('disabled', false);
        });
    }
}

/*Función donde validamos que los datos sean correctos*/
function valDatosDilig() {
    if ($("#nombre").val() == '') {
        $("#nombre").prop("required", true);
        $("#nombre").focus();
        return false;
    }
    if ($("#email").val() == '') {
        $("#email").prop("required", true);
        $("#email").focus();
        return false;
    }
    if ($("#subject").val() == '') {
        $("#subject").prop("required", true);
        $("#subject").focus();
        return false;
    }
    if ($("#content").val() == '') {
        $("#content").prop("required", true);
        $("#content").focus();
        return false;
    }
    return true;
}

function insertInfoCorrect() {
    $("#nombre").val('');
    $("#nombre").text(`Escribe aquí tu nombre completo...`);
    $("#email").val('');
    $("#email").text(`Escribe aquí tu e-mail...`);
    $("#asunto").val('');
    $("#asunto").text(`Escribe aquí el asunto de tu mensaje...`);
    $("#contenido").val('');
    $("#contenido").text(`Escribe aquí el contenido de tu mensaje...`);
    $("#btnEnviar").html(`Enviado <i class="fas fa-check-circle" style="color:var(--lead);"></i>`);
    setTimeout(function () {
        $("#btnEnviar").html(`Enviar`);
    }, 3000);
    $("#btnEnviar").prop('disabled', false);
}