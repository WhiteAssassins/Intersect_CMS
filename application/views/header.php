<!DOCTYPE html>
<html lang="es" style="height:100% ;">
<head>
    <title><?php $serverinfo = $this->Apiserverinfo->serverinfo();  echo $serverinfo['GameName']; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/fontawesome.css">
	<link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/brands.css">
	<link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/solid.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>fontawesome/css/iconos.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/timeline.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/mdb.css"> 
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('public/'); ?>css/main.css">
    
</head>
<?php 
    $conf = $this->db->get('config');
    $conf1 = $conf->result_array();
    foreach ($conf1 as $key){
?>
<body style="background: linear-gradient(135deg, <?php echo $key['color1']; ?> 23%, <?php echo $key['color2']; ?> 100%) !important;">

<?php } ?>
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog o" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Login Admin</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('home/login'); ?>" method="post">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="defaultForm-email" class="form-control validate" name="user">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-email">Nombre</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-pass">Contraseña</label>
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn purple-gradient" type="submit">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Registro</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('home/reg'); ?>" method="post" id="form_reg">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="defaultForm-email" class="form-control validate" name="user">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-email">Nombre</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-pass">Contraseña</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" id="defaultForm-pass" class="form-control validate" name="pass1">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-pass">Confirmar Contraseña</label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="defaultForm-pass" class="form-control validate" name="email">
                    <label data-error="Error" data-success="Correcto" for="defaultForm-pass">Correo</label>
                </div>
        </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn purple-gradient" type="submit">Registro</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    

   