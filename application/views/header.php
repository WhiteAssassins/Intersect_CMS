<!DOCTYPE html>
<html lang="{site_lang}" style="height:100% ;" dir="ltr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta charset="utf-8">
<meta name="description" content="Intersect Engine CMS">
<meta name="msapplication-TileColor" content="#120d13">
<meta name="msapplication-TileImage" content="<?php echo base_url('public/favicon'); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#120d13">






    <title>{site_title}</title>
    <link rel="canonical" href="<?php echo base_url();?>">
    <link rel="dns-prefetch" href="<?php echo base_url();?>">
    <link rel="preconnect" href="<?php echo base_url();?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('public/favicon'); ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/favicon'); ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('public/favicon'); ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('public/favicon'); ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('public/favicon'); ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('public/favicon'); ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('public/favicon'); ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('public/favicon'); ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('public/favicon'); ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/svg+xml" href="<?php echo base_url('public/favicon'); ?>/favicon.svg">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('public/favicon'); ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('public/favicon'); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('public/favicon'); ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/favicon'); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('public/favicon'); ?>/manifest.json">
	<link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/solid.css" async>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/fa.css" async>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/datatables.min.css" async>
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/mdb.css"> 
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/main.css">
<script async src="https://www.googletagmanager.com/gtag/js?id={analytics_id}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{analytics_id}');
</script> 
</head>
<body class="site-shell">
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog o" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-lock"></i></span>
            <span class="modal-shell__eyebrow">{site_nav_subtitle}</span>
            <h4 class="modal-title w-100 font-weight-bold">{login}</h4>
            <p class="modal-shell__text">{modal_login_text}</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3 modal-shell__body">
            <form action="<?php echo base_url('home/login'); ?>" method="post"  autocomplete="nope" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text"  class="form-control" name="user"  autocomplete="new-text"  style="color:white;">
                    <label  for="defaultForm-email">{name}</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password"  class="form-control" name="pass"  autocomplete="new-password"  style="color:white;">
                    <label  for="defaultForm-pass">{password}</label>
                </div>
                <a href="<?php echo base_url('recover'); ?>" class="modal-shell__link">{forgotpassword}</a>
        </div>
        
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="btn btn-outline-info waves-effect modal-shell__submit" type="submit">{login}</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-user-plus"></i></span>
            <span class="modal-shell__eyebrow">{site_nav_subtitle}</span>
            <h4 class="modal-title w-100 font-weight-bold">{register}</h4>
            <p class="modal-shell__text">{modal_register_text}</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3 modal-shell__body">
            <form action="<?php echo base_url('home/reg'); ?>" method="post" id="form_reg" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="defaultForm-email" class="form-control validate" name="user" style="color:white;">
                    <label for="defaultForm-email">{name}</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass"  autocomplete="new-password" style="color:white;">
                    <label for="defaultForm-pass">{password}</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass1"  style="color:white;">
                    <label  for="defaultForm-pass">{confirmpassword}</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="defaultForm-pass" class="form-control validate" name="email"  style="color:white;">
                    <label for="defaultForm-pass">{email}</label>
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="btn btn-outline-info waves-effect modal-shell__submit" type="submit">{register}</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    

<div class="modal fade" id="modal_newticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center modal-shell__header">
            <span class="modal-shell__badge"><i class="fas fa-headset"></i></span>
            <span class="modal-shell__eyebrow">{site_nav_subtitle}</span>
            <h4 class="modal-title w-100 font-weight-bold">{createticket}</h4>
            <p class="modal-shell__text">{modal_ticket_text}</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3 modal-shell__body">
            <form action="<?php echo base_url('userpanel/addticket'); ?>" method="post"  enctype="multipart/form-data" id="form_ticket" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="title"  style="color:white;">
                    <label for="defaultForm-email">{title}</label>
                </div>

                <div class="md-form mb-4">
                   
                <textarea id="form7" class="md-textarea form-control" rows="3" name="text" style="color:white;"></textarea>
  <label for="form7">{tickettext}</label>
                </div>
               
              
              
               <div class="md-form mb-4">
                   
               <select class="mdb-select md-form modal-shell__select" name="ticket"  style="color:white;"> 
                                    <option value="" disabled selected>{chooseticket}</option>
                                    <option value="ingame">{ticket_type_ingame}</option>
                                    <option value="account">{ticket_type_account}</option>
                                    <option value="billing">{ticket_type_billing}</option>
                                    <option value="web">{ticket_type_web}</option>
                                </select>
               </div>
                    
             </div>
             

          


                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="btn btn-outline-info waves-effect modal-shell__submit" type="submit">{addticket}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

   
