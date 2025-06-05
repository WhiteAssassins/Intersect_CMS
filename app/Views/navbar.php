<?php
$db = \Config\Database::connect();
$conf = $db->table('config')->get()->getResultArray();
?>

<body>
<nav class="mb-1  navbar navbar-expand-lg navbar-dark info-color navbar-novo" style="z-index: 2;">
  <a class="navbar-brand" href="<?= base_url() ?>">
  <?= esc($serverinfo['GameName'] ?? 'Nombre del Juego') ?>
</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">{language}</a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php base_url();?>langs/es">ES</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/en">EN</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/tr">TR</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/jp">JP</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/de">DE</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/ru">RU</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/zh">ZH</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/fr">FR</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/pt">PT</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/hi">HI</a>
          <a class="dropdown-item" href="<?php base_url();?>langs/AR">AR</a>
        </div>
      </li>
                 <li class="nav-item">
                  <a href="<?php echo $conf['0']['download'] ?>"
                    class="nav-link border border-light rounded waves-effect mr-2" target="_blank">
                    <i class="fas fa-download mr-1"></i>{downloadbutton}
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('playersonline'); ?>">
                    {onlineplayers}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('users'); ?>">
                    {listusers}
                    </a>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('players'); ?>">
                    {listplayers}
                    </a>
                
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('shop'); ?>">
                   {shop}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('news'); ?>">
                   {news}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light animate__animated animate__swing" href="<?php echo base_url('changelog'); ?>">
                   {changelog}
                    </a>
                </li>
<?php if (!($session->get('login') ?? false)): ?>
    <li class="nav-item">
        <a class="nav-link waves-effect btn_modal_reg waves-light animate__animated animate__swing">
            <i class="fa fa-user animate__animated animate__swing"></i> {register}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link waves-effect btn_modal_login waves-light animate__animated animate__swing">
            <i class="fa fa-user animate__animated animate__swing"></i> {login}
        </a>
    </li>
<?php else: ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?= esc($session->get('user')) ?>
        </a>
        <div class="dropdown-menu dropdown-info dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('userpanel') ?>">
                <i class="fa fa-cog"></i> {paneluser}
            </a>
            <?php if ($session->get('rol') == 1): ?>
                <a class="dropdown-item" href="<?= base_url('admin') ?>">
                    <i class="fa fa-cogs"></i> {administrativepanel}
                </a>
            <?php endif; ?>
            <a class="dropdown-item btn_modal_newticket">
                <i class="fas fa-headset"></i> {feedback}
            </a>
            <a class="dropdown-item" href="<?= base_url('home/logout') ?>">
                <i class="fa fa-sign"></i> {disconnect}
            </a>
        </div>
    </li>
<?php endif; ?>

    </ul>
  </div>
</nav>
<?php
    if(isset($sms) && $tipo == 'error'){
        echo '<div class="alert alert-info text-center">'.$sms.'</div>';
    };
    if(isset($error)){
        echo '<div class="alert alert-info text-center">'.$error.'</div>';
    };
?>