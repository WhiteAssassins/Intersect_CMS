<footer class="page-footer footer-bottom site-footer">
  <div class="site-footer__shell">
    <div class="site-footer__brand">
      <a class="site-footer__brand-link" href="<?php echo base_url(); ?>">
        <span class="site-footer__brand-mark">
          <img src="<?php echo base_url('public/favicon/favicon.svg'); ?>" alt="{site_title}">
        </span>
        <span class="site-footer__brand-copy">
          <span class="site-footer__brand-title">{site_title}</span>
          <span class="site-footer__brand-subtitle">{site_nav_subtitle}</span>
        </span>
      </a>
      <p class="site-footer__tagline">{site_footer_tagline}</p>
      <p class="site-footer__description">{site_footer_description}</p>
    </div>

    <div class="site-footer__links">
      <div class="site-footer__group">
        <span class="site-footer__heading">{site_footer_explore}</span>
        <a href="<?php echo base_url('news'); ?>">{news}</a>
        <a href="<?php echo base_url('shop'); ?>">{shop}</a>
        <a href="<?php echo base_url('changelog'); ?>">{changelog}</a>
      </div>
      <div class="site-footer__group">
        <span class="site-footer__heading">{site_footer_project}</span>
        <a href="<?php echo base_url('playersonline'); ?>">{onlineplayers}</a>
        <a href="<?php echo base_url('users'); ?>">{listusers}</a>
        <a href="<?php echo base_url('players'); ?>">{listplayers}</a>
      </div>
      <div class="site-footer__group">
        <span class="site-footer__heading">{site_footer_legal}</span>
        <a href="<?php echo base_url('legal'); ?>">{legalnotice}</a>
        <a href="<?php echo base_url('terms'); ?>">{terms}</a>
        <a href="<?php echo base_url('privacity'); ?>">{privacity}</a>
      </div>
    </div>
  </div>

  <div class="site-footer__bottom">
    <div class="site-footer__bottom-shell">
      <span>{site_title} &copy; {current_year} {copyright}</span>
      <span class="site-footer__divider"></span>
      <span>AEWhite Devs</span>
    </div>
  </div>
</footer>
<?php
$currentController = strtolower((string) $this->uri->segment(1));
$currentMethod = strtolower((string) $this->uri->segment(2));
if ($currentController === '') {
    $currentController = 'home';
}

if ($currentMethod === '') {
    $currentMethod = $currentController === 'admin' ? 'index' : '';
}

$isAdminUser = (int) $this->session->userdata('rol') === 1;
$usesDataTables = in_array($currentController, array('users', 'players', 'playersonline', 'logs'), true)
    || ($currentController === 'admin' && in_array($currentMethod, array('news', 'shop', 'adminaccounts', 'tickets', 'objects', 'maps', 'events', 'quests'), true));
$usesTimeline = $currentController === 'changelog' || ($currentController === 'admin' && $currentMethod === 'changelog');
$usesTinyMce = $isAdminUser && (
    ($currentController === 'admin' && in_array($currentMethod, array('news', 'editnews'), true))
    || ($currentController === 'config' && in_array($currentMethod, array('legal', 'terms', 'privacity'), true))
);
$usesChart = $isAdminUser && $currentController === 'admin' && $currentMethod === 'index';
$usesMdbJavascript = $isAdminUser;
?>
<script type="text/javascript" src="<?php echo base_url('public/'); ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/bootstrap.js"></script>
    <?php if ($usesMdbJavascript) { ?>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/mdb.min.js"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/main.js"></script>
    <?php if ($usesTimeline) { ?>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/timeline.min.js"></script>
    <?php } ?>
    <?php if ($usesDataTables) { ?>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/datatables2.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <?php } ?>
    <?php if ($usesTinyMce) { ?>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>tinymce/tinymce.min.js"></script>
    <?php } ?>
    <?php if($usesChart){ ?>

      <script>
    var lineChartElement = document.getElementById("lineChart");
    if (lineChartElement) {
            var ctxL = lineChartElement.getContext('2d');
    var gradientFill = ctxL.createLinearGradient(0, 0, 0, 290);
    gradientFill.addColorStop(0, "rgba(0, 125, 250, 1)");
    gradientFill.addColorStop(1, "rgba(0, 125, 250, 0.1)");
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        datasets: [
          {
            label: "Visitas Mensuales",
            data: [{visits_january}, {visits_february}, {visits_march}, {visits_april}, {visits_may}, {visits_june}, {visits_july}, {visits_august}, {visits_september}, {visits_october}, {visits_november}, {visits_december}],
            backgroundColor: gradientFill,
            borderColor: [
              '#007DFA',
            ],
            borderWidth: 2,
            pointBorderColor: "#007DFA",
            pointBackgroundColor: "rgba(0, 125, 250, 1)",
          }
        ]
      },
      options: {
        responsive: true
      }
    });
    }
        </script>
      <?php } ?>

    <?php if ($usesDataTables) { ?>
    <script>
      $(document).ready(function () {
  $('#dt-filter-select').dataTable({
    language: {
"decimal": "",
"emptyTable": "{emptyTable}",
"info": "{infotable}",
"infoEmpty": "{infoEmpty}",
"infoFiltered": "{infoFiltered}",
"infoPostFix": "",
"thousands": ",",
"lengthMenu": "{lengthMenu}",
"loadingRecords": "{loadingRecords}",
"processing": "{processing}",
"search": "{search}:",
"zeroRecords": "{zeroRecords}",
"paginate": {
"first": "{first}",
"last": "{last}",
"next": "{next}",
"previous": "{previous}"
}
},
    responsive: true,
        
    initComplete: function () {
      
      this.api().columns().every( function () {
        
          var column = this;
          var select = $('<select  class="browser-default custom-select form-control-sm tables-novo"><option value="" selected>{search}</option></select>')
              .appendTo( $(column.footer()).empty() )
              .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                  );

          column
                      .search( val ? '^'+val+'$' : '', true, false )
                      .draw();
              } );

          column.data().unique().sort().each( function ( d, j ) {
              if (d === null || d === undefined || d === '') {
                  return;
              }

              $('<option/>', {
                  value: d,
                  text: d
              }).appendTo(select);
          } );
      } );
  }
  });
});
    </script>
    <?php } ?>

    
    <script>
        $(document).ready(function() {
  if (typeof WOW !== 'undefined') {
    new WOW().init();
  }
});
    </script>
    <script>
    (function ($){
  $.fn.counter = function() {
    const $this = $(this),
    numberFrom = parseInt($this.attr('data-from')),
    numberTo = parseInt($this.attr('data-to')),
    delta = numberTo - numberFrom,
    deltaPositive = delta > 0 ? 1 : 0,
    time = parseInt($this.attr('data-time')),
    changeTime = 10;
    
    let currentNumber = numberFrom,
    value = delta*changeTime/time;
    var interval1;
    const changeNumber = () => {
      currentNumber += value;
      (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
      this.text(parseInt(currentNumber));
      currentNumber == numberTo ? clearInterval(interval1) : currentNumber;  
    }

    interval1 = setInterval(changeNumber,changeTime);
  }
}(jQuery));

$(document).ready(function(){

  $('.count-up').counter();
  $('.count1').counter();
  $('.count2').counter();
  
  if (typeof WOW !== 'undefined') {
    new WOW().init();
  }
  
  setTimeout(function () {
    $('.count5').counter();
  }, 3000);
});
</script>
    <script>
        var config = <?php echo json_encode(array(
            'base_url' => base_url(),
            'loading_touch_device' => 1,
        ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    </script>
 <?php if($usesTinyMce){ ?>
 <script>
  tinymce.init({
    selector: 'textarea#tiny',
    language: '{tinymce_language}',
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
    skin: 'oxide',
    encoding: 'UTF-8',
  });
</script>
<?php } ?>

 </body>
</html>
