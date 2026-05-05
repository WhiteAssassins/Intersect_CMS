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
          <span>{admin_menu_icon_example}</span>
        </div>

        <div class="admin-form-section">
          <div class="admin-form-section__heading">
            <h3>{admin_menu_header_title}</h3>
            <p>{admin_menu_header_text}</p>
          </div>
          <label class="admin-form-group">
            <span class="admin-form-group__label">{descriptionmenu}</span>
            <input type="text" class="form-control" placeholder="{descriptionmenu}" name="menuheader" value="<?php echo html_escape($config_menu_header); ?>">
          </label>
        </div>

        <div class="admin-menu-grid">
          <article class="admin-menu-card">
            <span class="admin-menu-card__index">01</span>
            <div class="admin-form-section__heading admin-form-section__heading--compact">
              <h3>{titlemenu1}</h3>
              <p>{admin_menu_card_one_text}</p>
            </div>
            <div class="admin-editor__grid">
              <label class="admin-form-group">
                <span class="admin-form-group__label">{iconmenu1}</span>
                <input type="text" class="form-control" placeholder="{iconmenu1}" name="menu1icon" value="<?php echo html_escape($config_menu1_icon); ?>">
              </label>
              <label class="admin-form-group">
                <span class="admin-form-group__label">{titlemenu1}</span>
                <input type="text" class="form-control" placeholder="{titlemenu1}" name="menu1header" value="<?php echo html_escape($config_menu1_header); ?>">
              </label>
            </div>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{textmenu1}</span>
              <input type="text" class="form-control" placeholder="{textmenu1}" name="menu1text" value="<?php echo html_escape($config_menu1_text); ?>">
            </label>
          </article>

          <article class="admin-menu-card">
            <span class="admin-menu-card__index">02</span>
            <div class="admin-form-section__heading admin-form-section__heading--compact">
              <h3>{titlemenu2}</h3>
              <p>{admin_menu_card_two_text}</p>
            </div>
            <div class="admin-editor__grid">
              <label class="admin-form-group">
                <span class="admin-form-group__label">{iconmenu2}</span>
                <input type="text" class="form-control" placeholder="{iconmenu2}" name="menu2icon" value="<?php echo html_escape($config_menu2_icon); ?>">
              </label>
              <label class="admin-form-group">
                <span class="admin-form-group__label">{titlemenu2}</span>
                <input type="text" class="form-control" placeholder="{titlemenu2}" name="menu2header" value="<?php echo html_escape($config_menu2_header); ?>">
              </label>
            </div>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{textmenu2}</span>
              <input type="text" class="form-control" placeholder="{textmenu2}" name="menu2text" value="<?php echo html_escape($config_menu2_text); ?>">
            </label>
          </article>

          <article class="admin-menu-card">
            <span class="admin-menu-card__index">03</span>
            <div class="admin-form-section__heading admin-form-section__heading--compact">
              <h3>{titlemenu3}</h3>
              <p>{admin_menu_card_three_text}</p>
            </div>
            <div class="admin-editor__grid">
              <label class="admin-form-group">
                <span class="admin-form-group__label">{iconmenu3}</span>
                <input type="text" class="form-control" placeholder="{iconmenu3}" name="menu3icon" value="<?php echo html_escape($config_menu3_icon); ?>">
              </label>
              <label class="admin-form-group">
                <span class="admin-form-group__label">{titlemenu3}</span>
                <input type="text" class="form-control" placeholder="{titlemenu3}" name="menu3header" value="<?php echo html_escape($config_menu3_header); ?>">
              </label>
            </div>
            <label class="admin-form-group">
              <span class="admin-form-group__label">{textmenu3}</span>
              <input type="text" class="form-control" placeholder="{textmenu3}" name="menu3text" value="<?php echo html_escape($config_menu3_text); ?>">
            </label>
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
