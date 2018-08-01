/**
 * Created by cesarkatz on 26/3/18.
 */

function guardarNuevaEstructura() {

    $('#mensaje').addClass('hidden');

    if ($("#nombre_estructura").val() != "" && $("#nombre_corto_estructura").val() != "") {
        $.ajax({
            type: "POST",
            url: $('#form_nueva_estructura').find('input[name=url]').val(),
            data: $('#form_nueva_estructura').serialize(),
            dataType: "JSON",
            beforeSend: function (data) {
                //var imgLoading = '<img src="../../imagenes/mini_loading.gif" alt=""/>';
                //$(elem).find('div').html(imgLoading);
            },
            success: function (data) {
                if (data.estado == 'error') {
                    $('#mensaje').html(data.mensaje);
                    alert(data.mensaje);
                    $('#mensaje').removeClass('hidden');
                    recargarComboEstructura(data.id);
                    $('#modalNuevaEstructura').modal('hide');
                } else {
                    recargarComboEstructura(data.id);
                    alert('El lugar de trabajo fue agregado');
                    $('#modalNuevaEstructura').modal('hide');
                }
            }
        });
    } else {
        $('#mensaje').html('Debe completar todos los campos solicitados.');
        $('#mensaje').removeClass('hidden');
    }
}


function recargarComboEstructura(id) {
    $.ajax({
        type: "GET",
        url: $('#form_nueva_estructura').find('input[name=urlGet]').val(),
        dataType: "JSON",
        beforeSend: function (data) {
        },
        success: function (data) {
            limpiarSelect("estructura_id");
            addOptions("estructura_id", id, data);
        }
    });
}

function limpiarSelect(idSelect) {
    var select = document.getElementById(idSelect);
    while (select.length > 0) {
        select.remove(0);
    }
}


function addOptions(idSelect, id, data) {
    var select = document.getElementById(idSelect);
    var i = 0;
    for (var index in data) {
        var option = document.createElement("option");
        select.options[i] = new Option(data[index], index);
        if (index == id) {
            document.getElementById(idSelect).selectedIndex = i;
        }
        i++;
    }

}

function selectAdscripto() {
    if ($('#tipo_agente_id').val() == '2') {
        $('#situacion_laboral_id').val('1');
        $('#situacion_laboral_id').attr('disabled', 'disabled');
        $('#tramite_jubilacion').val('0');
        $('#tramite_jubilacion').attr('disabled', 'disabled');
    } else {
        $('#situacion_laboral_id').val('');
        $('#situacion_laboral_id').removeAttr('disabled');

        $('#tramite_jubilacion').val('');
        $('#tramite_jubilacion').removeAttr('disabled');

    }


}
