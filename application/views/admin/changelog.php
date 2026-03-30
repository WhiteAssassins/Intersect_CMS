<div class="modal fade" id="modal_newchangelog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content cards-novo">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">{addchangelog}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
              <form action="<?php echo base_url('admin/addchangelog'); ?>" method="post"  enctype="multipart/form-data">
                  <?php echo cms_csrf_field(); ?>
                <div class="md-form mb-5">
                    
                    <input type="text" id="defaultForm-email" class="form-control validate" name="title">
                    <label for="defaultForm-email">{title}</label>
                </div>
                <div class="md-form mb-5">
                    <textarea id="form7" class="md-textarea form-control" rows="3" name="text"></textarea>
                    <label for="form7">{description}</label>
                </div>

              
                
        </div>
        
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-info waves-effect" type="submit">{addchangelog}</button>
                </div>
                </form>
            </div>
        </div>
    </div>













<main class="admin-shell admin-shell--page">
<section class="admin-section admin-section--tight">
  <div class="admin-panel">
    <div class="admin-panel__header admin-panel__header--with-action">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
        <h2 class="admin-panel__title">{changelog}</h2>
      </div>
      <button type="button" class="admin-button admin-button--primary btn_modal_newchangelog">
        <i class="fas fa-plus"></i>
        <span>{addchangelog}</span>
      </button>
    </div>
    <div class="timeline-main">
      <!-- Timeline Wrapper -->
      <ul class="stepper stepper-vertical timeline timeline-basic pl-0">
      <?php if (empty($admin_changelog_rows)) { ?>
        <li>
          <div class="step-content z-depth-1 p-4 cards-novo admin-empty-block">
            <p class="mb-0">{emptyTable}</p>
          </div>
        </li>
      <?php } else { ?>
        <?php foreach ($admin_changelog_rows as $row) { ?>  
          <li<?php echo $row['timeline_item_class'] !== '' ? ' class="' . $row['timeline_item_class'] . '"' : ''; ?>>
            <a href="#!">
              <span class="circle info-color z-depth-1-half"><i class="far fa-check" aria-hidden="true"></i></span>
            </a>
            <div class="step-content z-depth-1 <?php echo $row['content_alignment_class']; ?> p-4 cards-novo">
              <h4 class="font-weight-bold"><?php echo $row['title']; ?></h4>
              <p class="mt-4"><?php echo $row['text']; ?></p>
              <form method="POST" action="<?php echo base_url('admin/delchangelog'); ?>">
                <?php echo cms_csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button class="admin-icon-btn admin-icon-btn--danger" type="submit" aria-label="{action}">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </li>
        <?php } ?>
      <?php } ?>
      </ul>
    </div>
  </div>
</section>
</main>
