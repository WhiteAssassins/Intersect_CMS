<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="timeline-main">
      <ul class="stepper stepper-vertical timeline timeline-basic pl-0">
      <?php foreach ($changelog_rows as $item) { ?>
        <li<?php echo $item['timeline_item_class'] !== '' ? ' class="' . $item['timeline_item_class'] . '"' : ''; ?>>
          <a href="#!">
            <span class="circle info-color z-depth-1-half"><i class="far fa-check" aria-hidden="true"></i></span>
          </a>
          <div class="step-content z-depth-1 <?php echo $item['content_alignment_class']; ?> p-4 cards-novo">
            <h4 class="font-weight-bold"><?php echo html_escape($item['title']); ?></h4>
            <p class="mt-4"><?php echo cms_render_multiline($item['text']); ?></p>
          </div>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
</div>
</div>
