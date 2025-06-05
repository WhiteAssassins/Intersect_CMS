<?php
$db = \Config\Database::connect();
$session = \Config\Services::session();
$apiserverinfo = new \App\Models\Apiserverinfo();
$serverinfo = $apiserverinfo->serverinfo();

$conf = $db->table('config')->get()->getResultArray();
$months = $db->table('visits')->get()->getResultArray();

$month = date('M');

if ($month === 'Jan' || $months[0]['december'] < 0) {
    $resetData = [
        'january' => 0, 'february' => 0, 'march' => 0, 'april' => 0,
        'may' => 0, 'june' => 0, 'july' => 0, 'august' => 0,
        'september' => 0, 'october' => 0, 'november' => 0, 'december' => 0
    ];
    $db->table('visits')->where('id', 1)->update($resetData);
}

$rol = $session->get('rol');
$login = $session->get('login');

if ($rol == 2 || !$login) {
    $monthField = strtolower(date('F')); // ej. 'january'
    if (isset($months[0][$monthField])) {
        $newValue = $months[0][$monthField] + 1;
        $db->table('visits')->where('id', 1)->update([$monthField => $newValue]);
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $conf[0]['lang']?>" style="height:100% ;" dir="ltr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta charset="utf-8">
<meta name="description" content="Intersect Engine CMS">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url('public/favicon'); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">





   <title><?= isset($serverinfo['GameName']) ? esc($serverinfo['GameName']) : 'Servidor no disponible' ?></title>
    <link rel="canonical" href="<?php echo base_url();?>">
    <link rel="dns-prefetch" href="<?php echo base_url();?>">
    <link rel="preconnect" href="<?php echo base_url();?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('favicon'); ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('favicon'); ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('favicon'); ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('favicon'); ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('favicon'); ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('favicon'); ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('favicon'); ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('favicon'); ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicon'); ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('favicon'); ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicon'); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('favicon'); ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicon'); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('favicon'); ?>/manifest.json">
	<link rel="stylesheet" href="<?php echo base_url(''); ?>fontawesome/css/solid.css" async>
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/timeline.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/timeline.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/fa.css" async>
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/datatables.min.css" async>
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/mdb.css"> 
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/main.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $conf['0']['analytics'] ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $conf['0']['analytics'] ?>');
</script> 
</head>
<?php 

    foreach ($conf as $key){
?>
<body style="background: linear-gradient(90deg, <?php echo $key['color1']; ?> 23%, <?php echo $key['color2']; ?> 100%) !important;">
<?php 
$session = session();
if ($session->get('lang') == "") {
    $session->set(['lang' => $conf[0]['lang']]);
}
?>


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
            <form action="<?php echo base_url('home/login'); ?>" method="post"  autocomplete="nope"  style="color:white;">
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
                <a href="<?php echo base_url('recover'); ?>">{forgotpassword}</a>
        </div>
        
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{login}</button>
                    
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
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{register}</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    

<div class="modal fade" id="modal_newticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{createticket}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form action="<?php echo base_url('userpanel/addticket'); ?>" method="post"  enctype="multipart/form-data" id="form_ticket">
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="title"  style="color:white;">
                    <label for="defaultForm-email">{title}</label>
                </div>

                <div class="md-form mb-4">
                   
                <textarea id="form7" class="md-textarea form-control" rows="3" name="text" style="color:white;"></textarea>
  <label for="form7">{tickettext}</label>
                </div>
               
              
              
               <div class="md-form mb-4">
                   
               <select class="mdb-select md-form" name="ticket"  style="color:white;"> 
                                    <option value="" disabled selected>{chooseticket}</option>
                                    <option value="ingame">Error Ingame</option>
                                    <option value="account">Cuenta</option>
                                    <option value="billing">Compras</option>
                                    <option value="web">Web</option>
                                </select>
               </div>
                    
             </div>
             

          


                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{addticket}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

   