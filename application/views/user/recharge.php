<main class="userpanel-shell">
  <section class="userpanel-workspace userpanel-workspace--single">
    <div class="container">
      <div class="userpanel-single">
        <article class="userpanel-card userpanel-card--security">
          <div class="userpanel-card__header">
            <span class="userpanel-card__icon"><i class="fas fa-wallet"></i></span>
            <div>
              <span class="userpanel-card__eyebrow">{recharge}</span>
              <h1 class="userpanel-card__title">{balanceavailable}: $<?php echo number_format((float) $panel_balance, 2, '.', ''); ?></h1>
            </div>
          </div>

          <form method="POST" action="<?php echo base_url('userpanel/rechargin'); ?>" class="userpanel-form">
            <?php echo cms_csrf_field(); ?>
            <div class="userpanel-form__grid">
              <input type="number" step="0.01" min="0.01" class="form-control userpanel-form__input" name="cant" placeholder="0.01" required>
            </div>

            <div class="userpanel-radio">
              <span class="userpanel-radio__label">{paymentmethod}</span>
              <label class="userpanel-radio__option">
                <input name="billing" type="radio" value="qvapay" checked>
                <span>QvaPay</span>
              </label>
            </div>

            <div class="userpanel-form__actions">
              <a href="<?php echo base_url('userpanel'); ?>" class="admin-button admin-button--ghost">{return}</a>
              <button type="submit" class="admin-button admin-button--primary">{recharge}</button>
            </div>
          </form>
        </article>
      </div>
    </div>
  </section>
</main>
