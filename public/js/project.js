/*Función que lista las proyecciones de forma ASYNCRONA*/
$(function () {
    listarImagen();
});
function listarImagen() {
    let oidProject = $("#oidProject").val();
    $.ajax({
        type: 'POST',
        url: '../../functions/projectFunctions.php',
        data: { oidProject, 'listarArchAdjun': 1 },
        dataType: "json",
        beforeSend: function () {
            $("#tableProject").html('<tr><td colspan="20"><i class="fas fa-spinner fa-spin fa-lg"></i>&nbsp<label class="strongLabel">Cargando...</label></td></tr>');
        },
        success: function (data) {
            $('#tableProject').html(data);
        }, error: function (error) {
            console.error(error);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        errorsAjax(jqXHR, textStatus, errorThrown);
        $("#tableProject").html('<i class="fas fa-exclamation-triangle iconWarn" style="color:var(--red);"></i>');
    });
}

$("#formUploadImg").submit(function (e) {
    e.preventDefault();
    subirImagen();
});

function subirImagen() {
    let form = new FormData($("#formUploadImg")[0]);
    $.ajax({
        type: 'POST',
        url: '../../functions/projectFunctions.php',
        data: form,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#btnSubirImagen').attr("disabled", true);
            $("#btnSubirImagen").html(`Subiendo... <i class="fas fa-spinner fa-lg fa-spin"></i>`);
        },
        success: function (data) {
            if (data == '1') {
                let tipoMsj = 'success';
                let msg = `Se inserto correctamente la información
                            <br><span style='color:var(--error);text-align:center;'><small>&bull; Da click sobre este mensaje para cerrarlo</small></span>`;
                let accion = "cerrarMensaje";
                mensajesAplicaciones(tipoMsj, accion, msg);
                $('#btnSubirImagen').attr("disabled", false);
                $("#btnSubirImagen").html(`Subir`);
                $("#file").val('');
                $("#file").text(`No se eligio un archivo`);
                listarImagen();
            } else if (data == '2') {
                let tipoMsj = 'warning';
                let msg = `El tamaño del archivo excede el permitido
                            <br><strong>Prueba las siguiente opción para bajarle el tamaño a la imagen</strong><a href='https://tinyjpg.com/' target='_blank'>Tiny.jpg</a>`;
                let accion = "";
                mensajesAplicaciones(tipoMsj, accion, msg);
                $("#btnSubirImagen").html(`Subir <i class="fas fa-exclamation-triangle fa-lg"></i>`);
            } else if (data == '3') {
                let tipoMsj = 'error';
                let msg = `El archivo no tiene el formato requerido
                            <br><strong>Recuerda</strong> El archivo admitido es .png o .jpg`;
                let accion = "";
                mensajesAplicaciones(tipoMsj, accion, msg);
                $("#btnSubirImagen").html(`Subir <i class="fas fa-exclamation-triangle fa-lg"></i>`);
            }
        }, error: function (error) {
            console.error(error);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        errorsAjax(jqXHR, textStatus, errorThrown);
        $("#btnSubirImagen").html('<i class="fas fa-exclamation-triangle" style="color:var(--information-warning);"></i>');
        setTimeout(function () {
            $("#btnSubirImagen").html(`<button class="btnMostrar" style="width: 70%;" name="subirArchivos" value="subirArchivos" id="btnSubirArchivos">Subir archivo</button>`);
        }, 3000);
    });
}

/*Función que indica que es la imagen principal*/
function setPrincipal(count) {
    let msg = "Esta seguro de realizar la acción determinada sobre la imagen";
    mensajesAplicaciones3Ajax(msg);
    $("#btnMensajes3Si").click(function () {
        let idImage = $("#idImage" + count).val();
        let idProject = $("#oidProject").val();
        let estAnt = $("#estado" + count).val();
        let estado = $("#newEstado" + count).val();
        $.ajax({
            type: 'POST',
            url: '../../functions/projectFunctions.php',
            data: { idImage, idProject, estado, estAnt, 'setPrincipal': 1 },
            dataType: 'JSON',
            beforeSend: function () {
                $("#tdButton" + count).html(`<i class="fas fa-spinner fa-spin spinIcon"></i>`);
            },
            success: function (data) {
                if (data == '1') {
                    let tipoMsj = 'success';
                    let msg = `Se actualizo correctamente la información
                        <br><span style='color:var(--error);text-align:center;'><small>&bull; Da click sobre este mensaje para cerrarlo</small></span>`;
                    let accion = "cerrarMensaje";
                    mensajesAplicaciones(tipoMsj, accion, msg);
                    listarImagen();
                } else if (data == '3') {
                    let tipoMsj = 'warning';
                    let msg = `Ya se cuenta con una imagen como principal
                        <br><strong>Solución</strong> Indica a esa imagen que ya no es principal y vuelve a intentar`;
                    let accion = "";
                    mensajesAplicaciones(tipoMsj, accion, msg);
                    $("#tdButton" + count).html('<i class="fas fa-exclamation-triangle iconWarn"></i>');
                } else {
                    let tipoMsj = 'error';
                    let msg = `Error al momento de actualizar el registro 
                    <br><strong>Causa: </strong> Se trato de cambiar un estado ya asignado al mismo proceso 
                    <br><span style='color:var(--error);text-align:center;'><small>&bull; Da click sobre este mensaje para refrescar la página</small></span>`;
                    let accion = "";
                    mensajesAplicaciones(tipoMsj, accion, msg);
                    $("#tdButton" + count).html(`<i class="fas fa-exclamation-triangle iconWarn" onclick="return setEstadoProyeccion(${count});"></i>`);
                }
            },
            error: function (error) {
                console.error(error);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            errorsAjax(jqXHR, textStatus, errorThrown);
            $("#tdButton" + count).html('<i class="fas fa-exclamation-triangle iconWarn" style="color:var(--red);"></i>');
            setTimeout(function () { imgProyeccionError(count, estado, estAnt); }, 2000);
        });
    });
}

/*Función que que elimina la imagen*/
function delFile(count) {
    let msg = "Esta seguro de eliminar la imagen seleccionada";
    mensajesAplicaciones3Ajax(msg);
    $("#btnMensajes3Si").click(function () {
        let oidProject = $("#oidProject" + count).val();
        let nomImage = $("#nomImagen" + count).val();
        let idImage = $("#idImage" + count).val();
        $.ajax({
            type: 'POST',
            url: '../../functions/projectFunctions.php',
            data: { oidProject, nomImage, idImage, 'deleteImg': 1 },
            dataType: "json",
            beforeSend: function () {
                $("#tdDelete" + count).html('<i class="fas fa-spinner fa-spin fa-lg"></i>');
            },
            success: function (data) {
                if (data == '1') {
                    $("#tdDelete" + count).html(`<i class="fas fa-check-circle fa-lg" style="color:#38c172;"></i>`);
                    setTimeout(function () {
                        $("#trImagen" + count).fadeOut();
                    }, 100);
                }
            }, error: function (error) {
                console.error(error);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            errorsAjax(jqXHR, textStatus, errorThrown);
            $("#tableProject").html('<i class="fas fa-exclamation-triangle iconWarn" style="color:var(--red);"></i>');
        });
    });
}
