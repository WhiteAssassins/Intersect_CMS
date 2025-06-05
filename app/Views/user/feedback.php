<?php 
            $nombre = $this->session->userdata('user');
            $this->db->like('user',$nombre);
            $resultado = $this->db->get('users');
            $rest = $resultado->result_array(); 
?>
































































<div class="container" style="padding-top: 50px;">
<div class="classic-tabs mx-2">

  <ul class="nav tabs-cyan" id="myClassicTabShadow" role="tablist">
    <li class="nav-item">
      <a class="nav-link  waves-light active show" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
        role="tab" aria-controls="profile-classic-shadow" aria-selected="true">Tickets Abiertos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="follow-tab-classic-shadow" data-toggle="tab" href="#follow-classic-shadow"
        role="tab" aria-controls="follow-classic-shadow" aria-selected="false">Tickets Cerrados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light btn_modal_newticket"
        role="tab" aria-controls="contact-classic-shadow" aria-selected="false">Crear Nuevo Ticket</a>
    </li>
  </ul>

  <div class="tab-content card" id="myClassicTabContentShadow">
    <div class="tab-pane fade active show" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
        sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
        dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="tab-pane fade" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
      <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
        quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
    <div class="tab-pane fade" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
        eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
        assumenda est, omnis dolor repellendus. </p>
    </div>
    <div class="tab-pane fade" id="awesome-classic-shadow" role="tabpanel" aria-labelledby="awesome-tab-classic-shadow">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.</p>
    </div>
  </div>

</div>
</div>

<script>
  // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
  </script>