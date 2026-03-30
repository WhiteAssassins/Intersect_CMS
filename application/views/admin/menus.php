<main class="admin-shell admin-shell--page">
  <section class="admin-section">
    <div class="admin-section__heading">
      <div>
        <span class="admin-section__eyebrow">{admin_sidebar_content}</span>
        <h2 class="admin-section__title">{editmenus}</h2>
      </div>
      <p class="admin-section__text">{descriptionmenu}</p>
    </div>

    <div class="admin-editor admin-editor--wide">
      <form method="POST" action="<?php echo base_url('config/editmenus'); ?>" class="admin-editor__form">
        <?php echo cms_csrf_field(); ?>
        <div class="admin-helper-link">
          <a href="https://mdbootstrap.com/docs/b4/jquery/content/icons-list/index.html" target="_blank" rel="noopener noreferrer">{iconlist}</a>
          <span>Example `fas fa-trophy`</span>
        </div>

        <input type="text" class="form-control" placeholder="{descriptionmenu}" name="menuheader" value="<?php echo $config_menu_header; ?>">

        <div class="admin-menu-grid">
          <article class="admin-menu-card">
            <span class="admin-menu-card__index">01</span>
            <div class="admin-editor__grid">
              <input type="text" class="form-control" placeholder="{iconmenu1}" name="menu1icon" value="<?php echo $config_menu1_icon; ?>">
              <input type="text" class="form-control" placeholder="{titlemenu1}" name="menu1header" value="<?php echo $config_menu1_header; ?>">
            </div>
            <input type="text" class="form-control" placeholder="{textmenu1}" name="menu1text" value="<?php echo $config_menu1_text; ?>">
          </article>

          <article class="admin-menu-card">
            <span class="admin-menu-card__index">02</span>
            <div class="admin-editor__grid">
              <input type="text" class="form-control" placeholder="{iconmenu2}" name="menu2icon" value="<?php echo $config_menu2_icon; ?>">
              <input type="text" class="form-control" placeholder="{titlemenu2}" name="menu2header" value="<?php echo $config_menu2_header; ?>">
            </div>
            <input type="text" class="form-control" placeholder="{textmenu2}" name="menu2text" value="<?php echo $config_menu2_text; ?>">
          </article>

          <article class="admin-menu-card">
            <span class="admin-menu-card__index">03</span>
            <div class="admin-editor__grid">
              <input type="text" class="form-control" placeholder="{iconmenu3}" name="menu3icon" value="<?php echo $config_menu3_icon; ?>">
              <input type="text" class="form-control" placeholder="{titlemenu3}" name="menu3header" value="<?php echo $config_menu3_header; ?>">
            </div>
            <input type="text" class="form-control" placeholder="{textmenu3}" name="menu3text" value="<?php echo $config_menu3_text; ?>">
          </article>
        </div>

        <div class="admin-editor__actions">
          <button type="submit" class="admin-button admin-button--primary">{edit}</button>
          <a href="<?php echo base_url('config'); ?>" class="admin-button admin-button--ghost">{return}</a>
        </div>
      </form>
    </div>
  </section>
</main>
