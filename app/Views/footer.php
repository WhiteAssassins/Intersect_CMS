<?php
    // Asegúrate de que estas variables existan para evitar errores
    $gameName = isset($serverinfo['GameName']) ? esc($serverinfo['GameName']) : 'Nombre del Juego';
    $visits = isset($visits1[0]) ? $visits1[0] : [];
?>

<footer class="page-footer font-small navbar-novo footer-bottom">
  <div class="footer-copyright text-center py-3">
    <?= esc($gameName) ?> © <?= date('Y') ?> {copyright}:
    <a href="#">AEWhite Devs </a> |
    <a href="<?= base_url('legal') ?>">{legalnotice}</a> |
    <a href="<?= base_url('terms') ?>">{terms}</a> |
    <a href="<?= base_url('privacity') ?>">{privacity}</a>
  </div>
</footer>

</body>

<!-- JS scripts -->
<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.js') ?>" async></script>
<script src="<?= base_url('js/mdb.min.js') ?>"></script>
<script src="<?= base_url('js/cards.js') ?>" async></script>
<script src="<?= base_url('js/popper.min.js') ?>" async></script>

<?php if (session('rol') == 1): ?>
  <script src="<?= base_url('tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('js/sidenav.js') ?>"></script>
<?php endif; ?>

<script src="<?= base_url('js/timeline.min.js') ?>"></script>
<script src="<?= base_url('js/dropdown.js') ?>"></script>
<script src="<?= base_url('js/dropdown-searchable.min.js') ?>"></script>
<script src="<?= base_url('js/buttons.js') ?>" async></script>
<script src="<?= base_url('js/jquery.cookie.js') ?>"></script>
<script src="<?= base_url('js/datatables2.js') ?>"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('js/main.js') ?>"></script>

<?php if (session('rol') == 1 && !empty($visits)): ?>
<script>
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var gradientFill = ctxL.createLinearGradient(0, 0, 0, 290);
  gradientFill.addColorStop(0, "rgba(0, 125, 250, 1)");
  gradientFill.addColorStop(1, "rgba(0, 125, 250, 0.1)");

  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
      datasets: [{
        label: "Visitas Mensuales",
        data: [
          <?= $visits['january'] ?? 0 ?>,
          <?= $visits['february'] ?? 0 ?>,
          <?= $visits['march'] ?? 0 ?>,
          <?= $visits['april'] ?? 0 ?>,
          <?= $visits['may'] ?? 0 ?>,
          <?= $visits['june'] ?? 0 ?>,
          <?= $visits['july'] ?? 0 ?>,
          <?= $visits['august'] ?? 0 ?>,
          <?= $visits['september'] ?? 0 ?>,
          <?= $visits['october'] ?? 0 ?>,
          <?= $visits['november'] ?? 0 ?>,
          <?= $visits['december'] ?? 0 ?>
        ],
        backgroundColor: gradientFill,
        borderColor: ['#007DFA'],
        borderWidth: 2,
        pointBorderColor: "#007DFA",
        pointBackgroundColor: "rgba(0, 125, 250, 1)"
      }]
    },
    options: { responsive: true }
  });
</script>

<script>
  $(document).ready(function() {
    var pageRefresh = 5000;
    setInterval(function() {
      $('#admin').load(location.href + " #admin");
    }, pageRefresh);
  });
</script>

<script>
  $(document).ready(function() {
    $(".button-collapse").sideNav();
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    new PerfectScrollbar(sideNavScrollbar);
  });
</script>
<?php endif; ?>

<script>
  $(document).ready(function () {
    $('#dt-filter-select').dataTable({
      language: {
        "decimal": "", "emptyTable": "{emptyTable}", "info": "{infotable}", "infoEmpty": "{infoEmpty}",
        "infoFiltered": "{infoFiltered}", "lengthMenu": "{lengthMenu}", "loadingRecords": "{loadingRecords}",
        "processing": "{processing}", "search": "{search}:", "zeroRecords": "{zeroRecords}",
        "paginate": {"first": "{first}", "last": "{last}", "next": "{next}", "previous": "{previous}"}
      },
      rowReorder: { selector: 'td:nth-child(2)' },
      responsive: true,
      initComplete: function () {
        this.api().columns().every(function () {
          var column = this;
          var select = $('<select class="browser-default custom-select form-control-sm tables-novo"><option value="" selected>{search}</option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? '^'+val+'$' : '', true, false).draw();
            });

          column.data().unique().sort().each(function (d) {
            select.append('<option value="'+d+'">'+d+'</option>');
          });
        });
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    new WOW().init();
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
        value = delta * changeTime / time;
      var interval1;

      const changeNumber = () => {
        currentNumber += value;
        currentNumber = (deltaPositive && currentNumber >= numberTo) || (!deltaPositive && currentNumber <= numberTo) ? numberTo : currentNumber;
        $this.text(parseInt(currentNumber));
        if (currentNumber == numberTo) clearInterval(interval1);
      };

      interval1 = setInterval(changeNumber, changeTime);
    };
  }(jQuery));

  $(document).ready(function(){
    $('.count-up').counter();
    $('.count1').counter();
    $('.count2').counter();
    new WOW().init();
    setTimeout(() => $('.count5').counter(), 3000);
  });
</script>

<script>
  var config = {
    base_url: '<?= base_url(); ?>',
    loading_touch_device: 1,
  };
</script>

<script>
  tinymce.init({
    selector: 'textarea#tiny',
    language: '<?= session('lang') == "jp" ? "ja" : (session('lang') == "zh" ? "zh-Hans" : (session('lang') == "fr" ? "fr_FR" : (session('lang') == "pt" ? "pt_BR" : session('lang')))) ?>',
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
    skin: 'oxide',
    encoding: 'UTF-8',
  });
</script>

<script>
  $(document).ready(function() {
    $('.mdb-select').materialSelect();
  });
</script>

</html>
