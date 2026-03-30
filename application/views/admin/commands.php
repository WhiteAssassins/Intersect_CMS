<?php
if (isset($sms) && $tipo == 'error') {
    echo '<div class="alert alert-info text-center">' . $sms . '</div>';
}
if (isset($error)) {
    echo '<div class="alert alert-info text-center">' . $error . '</div>';
}

function renderCommandOptions($options)
{
    foreach ($options as $option) {
        echo '<option value="' . htmlspecialchars($option['value'], ENT_QUOTES, 'UTF-8') . '">'
            . htmlspecialchars($option['label'], ENT_QUOTES, 'UTF-8')
            . '</option>';
    }
}
?>
<main class="admin-shell admin-shell--page admin-shell--commands">

<div class="container my-1 px-0">
<div class="admin-section__heading">
  <div>
    <span class="admin-section__eyebrow">{admin_sidebar_system}</span>
    <h2 class="admin-section__title">{commands}</h2>
  </div>
  <p class="admin-section__text">{admin_metrics_text}</p>
</div>
</div>

<div class="container my-1 px-0 rounded">
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/direct'); ?>" id="form_direct" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{directmessage}</h4>

                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>

                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
                        <button style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/proximity'); ?>" id="form_proximity" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{mapmessage}</h4>

                        <select class="mdb-select md-form" name="map" searchable="{search}..">
                          <?php renderCommandOptions($command_map_options); ?>
                        </select>

                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
                        <button style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{globalmessage}</h4>
              <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_global" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="{message}">
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/global'); ?>" id="form_cmd" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{consolecommand} (Disabled)</h4>
                        <input type="text" id="prefixInside" class="form-control" name="txt" placeholder="/{command}">
                        </form>
                    </div>
  </div>
</div>
</div>
</div>
</main>
<div class="container my-1 px-0 rounded">
<div class="row">
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/ban'); ?>" id="form_ban" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{ban}</h4>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="{reason}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="{duration}">
                        <button style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{mute}</h4>
              <form method="POST" action="<?php echo base_url('admin/mute'); ?>" id="form_mute" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                        <input type="text" id="prefixInside" class="form-control" name="reason" placeholder="{reason}">
                        <br>
                        <input type="text" id="prefixInside" class="form-control" name="time" placeholder="{duration}">
                        <button style="display:none" type="submit"></button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/unban'); ?>" id="form_unban" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{unban}</h4>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                          <button class="btn btn-outline-info waves-effect" type="submit" style="margin-left: 55px;">{unmute}</button>
                        </form>
                    </div>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/unmute'); ?>" id="form_unmute" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{unmute}</h4>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                        <button class="btn btn-outline-info waves-effect" type="submit" style="margin-left: 55px;">{unmute}</button>
                        </form>
                    </div>
  </div>
</div>
</div>
</div>
</main>

<div class="container my-1 px-0 rounded">
<div class="row">

<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
                       <h4 class="text-center font-weight-bold mb-4 pb-2">{teleport}</h4>
              <form method="POST" action="<?php echo base_url('admin/tp'); ?>" id="form_tp" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                          <select class="mdb-select md-form" name="map" searchable="{search}..">
                          <?php renderCommandOptions($command_map_options); ?>
                          </select>
                          <button class="btn btn-outline-info waves-effect" type="submit" style="margin-left: 30px;">{teleport}</button>
                        </form>
                    </div>
  </div>
</div>

</div>

<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/kick'); ?>" id="form_kick" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{kickuser}</h4>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                          <button class="btn btn-outline-info waves-effect" type="submit" style="margin-left: 55px;">{kickuser}</button>
                        </form>
                    </div>
  </div>
</div>

</div>

<div class="col-lg-3 col-md-6 mb-4">
<div class="media white z-depth-1 rounded cards-novo">
  <div class="media-body p-1">
  <div class="md-form ">
              <form method="POST" action="<?php echo base_url('admin/kill'); ?>" id="form_kill" class="form-admin">
                <?php echo cms_csrf_field(); ?>
                        <h4 class="text-center font-weight-bold mb-4 pb-2">{Kill}</h4>
                        <select class="mdb-select md-form" name="user" searchable="{search}..">
                          <?php renderCommandOptions($command_player_options); ?>
                        </select>
                          <button class="btn btn-outline-info waves-effect" type="submit" style="margin-left: 55px;">{Kill}</button>
                        </form>
                    </div>
  </div>
</div>

</div>
</div>
</div>
</div>
