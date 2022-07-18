var AjaxLogin = {

    initialize: function(config)
    {
        actionPatch = config.actionUrl;
        redirectLoginResId = config.redirectLoginResId;
        redirectSubmitResId = config.redirectSubmitResId;
        redirect = '';
        loading = '<div class="ajaxmodal-reply"><span><img src="' + config.loading + '" /></span></div>';
        selector = {
            modalId: '#ajaxlogin-modal',
            formBoxId: '#ajaxLoginForm',
            classBtn: '.ajaxlogin-btn',
            classItem: '.ajaxlogin',
            classReply: '.ajaxmodal-reply'
        };

        $(document).on('click', selector.classBtn, function(e)
        {
            e.preventDefault();
            value = $(this).data('ajaxlogin');

            if (value) {
                $(selector.classItem).removeClass('active')
                $(selector.classItem + '-' + value).addClass('active');
                AjaxLogin.setLoading(selector.formBoxId);

                var sendData = {
                    action: value
                };

                if (value == 'Register') {
                    sendData['get'] = 1
                }

                AjaxLogin.send(sendData);
            }
        });

        $(document).on('submit', selector.modalId + ' form', function(e)
        {
            var form = $(this).serializeArray();
            var sendData = {
                action: value
            };

            $.each(form, function(i, v)
            {
                sendData[v.name] = v.value;
            });
            if (sendData.action == 'Login') {
                redirect = redirectLoginResId;
            } else if (sendData.action == 'Register') {
                redirect = redirectSubmitResId;
            }
            AjaxLogin.setLoading(selector.formBoxId);
            AjaxLogin.send(sendData);

            e.preventDefault();
        })
    },

    setLoading: function(elem)
    {
        $(elem).html(loading);
    },

    send: function(sendData)
    {
        $.ajax({
            type: 'POST',
            url: actionPatch,
            data: sendData,
            dataType: 'json',
            cache: false,
            success: function(data) {
                if (data['success'] == true) {
                    $(selector.formBoxId).html(data['data']);
                } else {
                    var message = data['message'];
                    $(selector.classReply).html('<span class="bg-danger text-danger">' + message + '</span>');
                }
            },
            error: function(data){
                if (redirect)
                    location.href = redirect;
            }
        });
    }
};
