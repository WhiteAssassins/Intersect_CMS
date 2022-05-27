
  <a href="#" data-activates="slide-out" class="btn btn-dark p-3 button-collapse"><i
    class="fas fa-bars"></i></a>

<div id="slide-out" class="side-nav2 side special-color-dark" style="width: 240px; transform: translateX(0px);">
  <ul class="custom-scrollbar ps">
    <li>
      <div class="logo-wrapper waves-light waves-effect waves-light">
        <a class="white-text" href="<?php echo base_url('home');?>">
        <h2 style="    padding-left: 40px;
    padding-top: 20px;"><?php $serverinfo = $this->Apiserverinfo->serverinfo();  echo $serverinfo['GameName']; ?></h2>
    </a>
      </div>
    </li>
    <li>
      <ul class="collapsible collapsible-accordion">
      <li><a href="<?php echo base_url('home');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Inicio</a>
        </li>
        <li><a href="<?php echo base_url('admin');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Dashboard</a>
        </li>
        <li><a href="<?php echo base_url('admin/shop');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Tienda</a>
        </li>
        <li><a href="<?php echo base_url('admin/news');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Noticias</a>
        </li>
        <li><a href="<?php echo base_url('admin/objects');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Objetos</a>
        </li>
        <li><a href="<?php echo base_url('admin/maps');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Mapas</a>
        </li>
        <li><a href="<?php echo base_url('admin/events');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Eventos</a>
        </li>
        <li><a href="<?php echo base_url('logs');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Logs</a>
        </li>
        <li><a href="<?php echo base_url('admin/adminaccounts');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Cuentas Administrador</a>
        </li>
        <li><a href="<?php echo base_url('config');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Configuración</a>
        </li>
        <li><a href="<?php echo base_url('home/logout');?>" class="collapsible-header waves-effect" tabindex="0"><i class="fas fa-chevron-right"></i> Desconectarse</a>
        </li>
      </ul>
    </li>
</div>


