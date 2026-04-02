<!DOCTYPE html>
<html lang="{site_lang}" style="height:100% ;" dir="ltr">
<?php
$currentController = strtolower((string) $this->uri->segment(1));
$currentMethod = strtolower((string) $this->uri->segment(2));
if ($currentController === '') {
    $currentController = 'home';
}

if ($currentMethod === '') {
    $currentMethod = $currentController === 'admin' ? 'index' : '';
}

$usesDataTables = in_array($currentController, array('users', 'players', 'playersonline', 'logs'), true)
    || ($currentController === 'admin' && in_array($currentMethod, array('news', 'shop', 'adminaccounts', 'tickets', 'objects', 'maps', 'events', 'quests'), true));
$usesTimeline = $currentController === 'changelog' || ($currentController === 'admin' && $currentMethod === 'changelog');
$usesMdbCss = $currentController === 'admin' || $currentController === 'config' || $currentController === 'logs' || $currentController === 'installer';
$analyticsId = trim((string) ('{analytics_id}'));
$hasAnalyticsId = $analyticsId !== '' && preg_match('/^\{.+\}$/', $analyticsId) !== 1;
$isLoggedIn = !empty($this->session->userdata('login'));
?>
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
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Space+Grotesk:wght@400;500;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet"></noscript>
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
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/solid.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/fa.css">
    <?php if ($usesTimeline) { ?>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.min.css">
    <?php } ?>
    <?php if ($usesDataTables) { ?>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <?php } ?>
    <?php if ($usesMdbCss) { ?>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/mdb.css">
    <?php } ?>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/main.css">
<?php if ($hasAnalyticsId) { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo rawurlencode($analyticsId); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo addslashes($analyticsId); ?>');
</script>
<?php } ?>
</head>
<body class="site-shell">
<?php if (!$isLoggedIn) { ?>
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
            <form action="<?php echo base_url('home/login'); ?>" method="post" autocomplete="nope" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="modal-body modal-shell__body">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="login_user">{name}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-user"></i></span>
                            <input id="login_user" type="text" class="modal-shell__input" name="user" autocomplete="username" required>
                        </div>
                    </div>

                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="login_pass">{password}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-lock"></i></span>
                            <input id="login_pass" type="password" class="modal-shell__input" name="pass" autocomplete="current-password" required>
                        </div>
                    </div>

                    <a href="<?php echo base_url('recover'); ?>" class="modal-shell__link">{forgotpassword}</a>
                </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{login}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
            <form action="<?php echo base_url('home/reg'); ?>" method="post" id="form_reg" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="modal-body modal-shell__body">
                    <div class="modal-shell__grid">
                        <div class="modal-shell__field">
                            <label class="modal-shell__label" for="register_user">{name}</label>
                            <div class="modal-shell__input-wrap">
                                <span class="modal-shell__input-icon"><i class="fas fa-user"></i></span>
                                <input id="register_user" type="text" class="modal-shell__input" name="user" autocomplete="username" required>
                            </div>
                        </div>
                        <div class="modal-shell__field">
                            <label class="modal-shell__label" for="register_email">{email}</label>
                            <div class="modal-shell__input-wrap">
                                <span class="modal-shell__input-icon"><i class="fas fa-envelope"></i></span>
                                <input id="register_email" type="email" class="modal-shell__input" name="email" autocomplete="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-shell__grid">
                        <div class="modal-shell__field">
                            <label class="modal-shell__label" for="register_pass">{password}</label>
                            <div class="modal-shell__input-wrap">
                                <span class="modal-shell__input-icon"><i class="fas fa-lock"></i></span>
                                <input id="register_pass" type="password" class="modal-shell__input" name="pass" autocomplete="new-password" minlength="6" required>
                            </div>
                        </div>
                        <div class="modal-shell__field">
                            <label class="modal-shell__label" for="register_pass_confirm">{confirmpassword}</label>
                            <div class="modal-shell__input-wrap">
                                <span class="modal-shell__input-icon"><i class="fas fa-shield-alt"></i></span>
                                <input id="register_pass_confirm" type="password" class="modal-shell__input" name="pass1" autocomplete="new-password" minlength="6" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{register}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php if ($isLoggedIn) { ?>
<div class="modal fade" id="modal_newticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
            <form action="<?php echo base_url('userpanel/addticket'); ?>" method="post" enctype="multipart/form-data" id="form_ticket" class="modal-shell__form">
                <?php echo cms_csrf_field(); ?>
                <div class="modal-body modal-shell__body">
                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="ticket_title">{title}</label>
                        <div class="modal-shell__input-wrap">
                            <span class="modal-shell__input-icon"><i class="fas fa-heading"></i></span>
                            <input id="ticket_title" type="text" class="modal-shell__input" name="title" required>
                        </div>
                    </div>

                    <div class="modal-shell__field">
                        <label class="modal-shell__label" for="ticket_type">{chooseticket}</label>
                        <div class="modal-shell__select-wrap">
                            <select id="ticket_type" class="modal-shell__select" name="ticket" required>
                                <option value="" disabled selected>{chooseticket}</option>
                                <option value="ingame">{ticket_type_ingame}</option>
                                <option value="account">{ticket_type_account}</option>
                                <option value="billing">{ticket_type_billing}</option>
                                <option value="web">{ticket_type_web}</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-shell__field modal-shell__field--full">
                        <label class="modal-shell__label" for="ticket_body">{tickettext}</label>
                        <textarea id="ticket_body" class="modal-shell__textarea" rows="5" name="text" required></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center modal-shell__footer">
                    <button class="admin-button admin-button--primary modal-shell__submit" type="submit">{addticket}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
