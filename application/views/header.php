<?php
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
?>
<!DOCTYPE html>
<html lang="es" style="height:100% ;">
<head>
<meta name="viewport" content="width=device-width">
    <title><?php $serverinfo = $this->Apiserverinfo->serverinfo();  echo $serverinfo['GameName']; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/solid.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/iconos.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/flag.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/mdb.css"> 
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/main.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $conf1['0']['analytics'] ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $conf1['0']['analytics'] ?>');
</script> 
</head>
<?php 

    foreach ($conf1 as $key){
?>
<body style="background: linear-gradient(90deg, <?php echo $key['color1']; ?> 23%, <?php echo $key['color2']; ?> 100%) !important;">


<?php } ?>
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog o" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{login}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('home/login'); ?>" method="post"  autocomplete="nope" >
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text"  class="form-control" name="user"  autocomplete="new-text" >
                    <label  for="defaultForm-email">{name}</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password"  class="form-control" name="pass"  autocomplete="new-password" >
                    <label  for="defaultForm-pass">{password}</label>
                </div>
                <a href="<?php echo base_url('recover'); ?>">{forgotpassword}</a>
        </div>
        
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn purple-gradient" type="submit">{login}</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{register}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('home/reg'); ?>" method="post" id="form_reg">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="defaultForm-email" class="form-control validate" name="user">
                    <label for="defaultForm-email">{name}</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass"  autocomplete="new-password" >
                    <label for="defaultForm-pass">{password}</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass1">
                    <label  for="defaultForm-pass">{confirmpassword}</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="defaultForm-pass" class="form-control validate" name="email">
                    <label for="defaultForm-pass">{email}</label>
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn purple-gradient" type="submit">{register}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    

   