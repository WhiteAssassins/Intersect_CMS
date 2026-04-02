window.toastr = window.toastr || {
    success: function (message) { window.alert(message); },
    error: function (message) { window.alert(message); },
    info: function (message) { window.alert(message); },
    warning: function (message) { window.alert(message); }
};

(function ($) {
    function getErrorMessage(xhr, fallbackMessage) {
        if (xhr && xhr.responseJSON && xhr.responseJSON.sms) {
            return xhr.responseJSON.sms;
        }

        return fallbackMessage;
    }

    function bindModal(triggerSelector, modalSelector) {
        $(document.body).on('click', triggerSelector, function () {
            $(modalSelector).modal();
        });
    }

    function bindAjaxForm(formSelector, endpoint, successMessage, fallbackErrorMessage) {
        $(document.body).on('submit', formSelector, function (event) {
            event.preventDefault();

            var form = this;
            var payload = new FormData(form);

            $.ajax({
                type: 'POST',
                url: config.base_url + endpoint,
                data: payload,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (response) {
                if (response && response.status === 200) {
                    toastr.success(successMessage);
                    return;
                }

                toastr.error((response && response.sms) ? response.sms : fallbackErrorMessage);
            }).fail(function (xhr) {
                toastr.error(getErrorMessage(xhr, fallbackErrorMessage));
            });
        });
    }

    $(function () {
        bindModal('.btn_modal_login', '#modal_login');
        bindModal('.btn_modal_reg', '#modal_reg');
        bindModal('.btn_modal_addnews', '#modal_addnews');
        bindModal('.btn_modal_addproduct', '#modal_addproduct');
        bindModal('.btn_modal_addadminaccount', '#modal_addadminaccount');
        bindModal('.btn_modal_newticket', '#modal_newticket');
        bindModal('.btn_modal_newchangelog', '#modal_newchangelog');

        bindAjaxForm('#form_reg', 'home/reg', 'Usuario creado.', 'No se pudo completar el registro.');
        bindAjaxForm('#form_global', 'admin/global', 'Mensaje global enviado.', 'No se pudo enviar el mensaje global.');
        bindAjaxForm('#form_direct', 'admin/direct', 'Mensaje directo enviado.', 'No se pudo enviar el mensaje directo.');
        bindAjaxForm('#form_proximity', 'admin/proximity', 'Mensaje de mapa enviado.', 'No se pudo enviar el mensaje de mapa.');
        bindAjaxForm('#form_ban', 'admin/ban', 'Usuario baneado.', 'No se pudo banear al usuario.');
        bindAjaxForm('#form_unban', 'admin/unban', 'Usuario desbaneado.', 'No se pudo desbanear al usuario.');
        bindAjaxForm('#form_mute', 'admin/mute', 'Usuario muteado.', 'No se pudo mutear al usuario.');
        bindAjaxForm('#form_unmute', 'admin/unmute', 'Usuario desmuteado.', 'No se pudo desmutear al usuario.');
        bindAjaxForm('#form_kick', 'admin/kick', 'Usuario expulsado.', 'No se pudo expulsar al usuario.');
        bindAjaxForm('#form_kill', 'admin/kill', 'Usuario derrotado.', 'No se pudo ejecutar la accion.');
        bindAjaxForm('#form_tp', 'admin/tp', 'Jugador teletransportado.', 'No se pudo teletransportar al jugador.');
        bindAjaxForm('#form_changepassword', 'userpanel/changepassword', 'Contrasena actualizada.', 'No se pudo actualizar la contrasena.');
        bindAjaxForm('#form_buyitem', 'shop/shoping', 'Compra completada.', 'No se pudo completar la compra.');
        bindAjaxForm('#form_ticket', 'userpanel/addticket', 'Ticket enviado.', 'No se pudo enviar el ticket.');
    });
}(jQuery));
