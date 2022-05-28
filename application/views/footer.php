<footer class="page-footer font-small navbar-novo footer-bottom">


<div class="footer-copyright text-center py-3"><?php $serverinfo = $this->Apiserverinfo->serverinfo();  echo $serverinfo['GameName']; ?>  © <?php echo date('Y')?> Copyright:
  <a href="#">AEWhite Devs </a>|
     <a href="<?php echo base_url('legal'); ?>">Legal Notice </a>|
     <a href="<?php echo base_url('terms'); ?>">Terms and Conditions </a>|
     <a href="<?php echo base_url('privacity'); ?>">Privacity </a>
     
</div>



</footer>
</body> 
<script type="text/javascript" src="<?php echo base_url('public/'); ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/mdb.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/mdb.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/cards.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/popper.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/dropdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/buttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/timeline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/datatables2.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/'); ?>js/sidenav.js"></script>
    <script>
      $(document).ready(function() {
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
  // SideNav Scrollbar Initialization
  var sideNavScrollbar = document.querySelector('.custom-scrollbar');
  var ps = new PerfectScrollbar(sideNavScrollbar);
});
</script>
    <script>
      $(document).ready(function () {
  $('#dt-filter-select').dataTable({

    initComplete: function () {
      this.api().columns().every( function () {
          var column = this;
          var select = $('<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>')
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
              select.append( '<option value="'+d+'">'+d+'</option>' )
          } );
      } );
  }
  });
});
    </script>
    <script>
$('#play').on('click', function (e) {
  e.preventDefault();
  $("#player")[0].src += "?autoplay=1";
  $('#player').show();
  $('#video-cover').hide();
})
$('#modal1').on('hidden.bs.modal', function (e) {
  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
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
  
  new WOW().init();
  
  setTimeout(function () {
    $('.count5').counter();
  }, 3000);
});
</script>
    <script>
        var config = {
            base_url: '<?php echo base_url();?>',
            loading_touch_device: 1,
        }
    </script>
 <script>
  tinymce.init({
    selector: 'textarea#tiny',
    language: 'es',
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
    skin: 'oxide',
    encoding: 'UTF-8',
  });
</script>
      
<html>