$(function(){
    if($.cookie('modo') == 0 || $.cookie('modo') == null){
        $('body').removeClass('modooscuro')
    }else{
        $('body').addClass('modooscuro')
    }
    $(document.body).on('click','.btn_modal_login',function(){
        $('#modal_login').modal()
    })
    $(document.body).on('click','.btn_modal_reg',function(){
        $('#modal_reg').modal()
    })
    $(document.body).on('click','.btn_modal_addnews',function(){
        $('#modal_addnews').modal()
    })
    $(document.body).on('click','.btn_modal_addproduct',function(){
        $('#modal_addproduct').modal()
    })
    $(document.body).on('click','.btn_modal_addadminaccount',function(){
        $('#modal_addadminaccount').modal()
    })


    $(document.body).on('click','.modo_btn',function(){
        if($.cookie('modo') == 0 || !$.cookie('modo')){
            //activa el modo oscuro
            $.cookie('modo',1)
            $('body').addClass('modooscuro')
        }else{
            //desactiva el modo oscuro
            $.cookie('modo',0)
            $('body').removeClass('modooscuro')
        }
    })
    $(document.body).on("submit", "#form_reg", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_reg"));
        $.ajax({
            type: "POST",
            url: config.base_url + "home/reg",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Creado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })



    $(document.body).on("submit", "#form_global", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_global"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/global",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Mensaje Enviado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })


    $(document.body).on("submit", "#form_direct", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_direct"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/direct",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Mensaje Enviado Directo.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })


    $(document.body).on("submit", "#form_proximity", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_proximity"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/proximity",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Mensaje Enviado al Mapa.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })



    $(document.body).on("submit", "#form_ban", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_ban"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/ban",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Baneado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })
   
   

    $(document.body).on("submit", "#form_unban", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_unban"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/unban",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Desbaneado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })





    $(document.body).on("submit", "#form_mute", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_mute"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/mute",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Muteado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })







    $(document.body).on("submit", "#form_unmute", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_unmute"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/unmute",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Desmuteado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })






    $(document.body).on("submit", "#form_kick", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_kick"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/kick",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Expulsado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })



    $(document.body).on("submit", "#form_kill", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_kill"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/kill",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Asesinado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })





    $(document.body).on("submit", "#form_tp", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_tp"));
        $.ajax({
            type: "POST",
            url: config.base_url + "admin/tp",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Usuario Teletransportado.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })

    $(document.body).on("submit", "#form_changepassword", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_changepassword"));
        $.ajax({
            type: "POST",
            url: config.base_url + "userpanel/changepassword",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Contraseña Cambiada.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })


    $(document.body).on("submit", "#form_buyitem", function(e) {
        e.preventDefault();
        var o = new FormData(document.getElementById("form_buyitem"));
        $.ajax({
            type: "POST",
            url: config.base_url + "shop/shoping",
            data: o,
            cache: !1,
            contentType: !1,
            processData: !1,
            dataType: "json",
            success: function(e) {
                if(e.status == 200){
                    //exito
                    toastr.success('Item Comprado Correctamente.');
                }else{
                    //error y e.sms es el error
                    toastr.error(e.sms);
                }
                
            },
            error: function(e) {
                toastr.error(e.sms);
            }
        }),
        !1
    })









    
})
