<main class="home-rebrand">
  <section class="home-hero">
    <div class="home-hero__veil"></div>
    <div class="home-hero__grid"></div>
    <div class="home-hero__content">
      <div class="home-hero__copy wow fadeInUp" data-wow-delay="0.1s">
        <span class="home-kicker">{home_hero_kicker}</span>
        <h1 class="home-title">{site_title}</h1>
        <p class="home-lead">
          <?php echo $home_menu_header; ?>
        </p>
        <div class="home-actions">
          <a href="{download_url}" class="home-btn home-btn--primary" target="_blank">
            <i class="fas fa-download"></i>
            <span>{downloadbutton}</span>
          </a>
          <a href="<?php echo base_url('news'); ?>" class="home-btn home-btn--ghost">
            <i class="fas fa-scroll"></i>
            <span>{news}</span>
          </a>
        </div>
        <div class="home-signal">
          <span class="home-signal__line"></span>
          <span>{statistics}</span>
        </div>
      </div>

      <div class="home-hero__visual wow fadeInUp" data-wow-delay="0.25s">
        <div class="home-orbit home-orbit--outer"></div>
        <div class="home-orbit home-orbit--inner"></div>
        <img src="<?php echo base_url('public/img/brand-mark.svg'); ?>" alt="{site_title}" class="home-brand-mark">
        <div class="home-status home-status--top">
          <span class="home-status__label">{useronline}</span>
          <strong class="count1" data-from="0" data-to="<?php echo $home_online_count; ?>" data-time="1000"><?php echo $home_online_count; ?></strong>
        </div>
        <div class="home-status home-status--bottom">
          <span class="home-status__label">{usersregistered}</span>
          <strong class="count-up" data-from="0" data-to="<?php echo $home_total_users; ?>" data-time="500"><?php echo $home_total_users; ?></strong>
        </div>
      </div>
    </div>
  </section>

  <section class="home-band wow fadeInUp" data-wow-delay="0.15s">
    <div class="home-band__inner">
      <?php foreach ($home_metric_rows as $metricRow) { ?>
        <article class="home-metric">
          <div class="home-metric__icon">
            <i class="<?php echo $metricRow['icon']; ?>"></i>
          </div>
          <div class="home-metric__body">
            <span class="home-metric__label"><?php echo $metricRow['label']; ?></span>
            <strong class="home-metric__value">
              <span class="<?php echo $metricRow['counter_class']; ?>" data-from="0" data-to="<?php echo $metricRow['value']; ?>" data-time="<?php echo $metricRow['time']; ?>"><?php echo $metricRow['value']; ?></span><?php echo $metricRow['suffix']; ?>
            </strong>
          </div>
        </article>
      <?php } ?>
    </div>
  </section>

  <section class="home-support">
    <div class="home-section-heading wow fadeInUp" data-wow-delay="0.1s">
      <span class="home-kicker">{features}</span>
      <h2>{home_support_title}</h2>
      <p>{home_support_text}</p>
    </div>

    <div class="home-feature-grid">
      <?php foreach ($home_feature_rows as $featureRow) { ?>
        <article class="home-feature wow fadeInUp" data-wow-delay="0.15s">
          <div class="home-feature__icon">
            <i class="<?php echo $featureRow['icon']; ?>"></i>
          </div>
          <h3><?php echo $featureRow['title']; ?></h3>
          <p><?php echo $featureRow['text']; ?></p>
        </article>
      <?php } ?>
    </div>
  </section>

  <section class="home-story">
    <div class="home-story__panel wow fadeInUp" data-wow-delay="0.1s">
      <span class="home-kicker">{changelog}</span>
      <h2>{home_story_title}</h2>
      <p>{home_story_text}</p>
      <div class="home-story__actions">
        <a href="<?php echo base_url('changelog'); ?>" class="home-link-pill">{changelog}</a>
        <a href="<?php echo base_url('shop'); ?>" class="home-link-pill">{shop}</a>
        <a href="<?php echo base_url('playersonline'); ?>" class="home-link-pill">{onlineplayers}</a>
      </div>
    </div>
    <div class="home-story__aside wow fadeInUp" data-wow-delay="0.2s">
      <div class="home-story-card">
        <span class="home-story-card__eyebrow">{home_story_card_one_eyebrow}</span>
        <strong><?php echo number_format($home_online_count); ?></strong>
        <p>{useronline}</p>
      </div>
      <div class="home-story-card">
        <span class="home-story-card__eyebrow">{home_story_card_two_eyebrow}</span>
        <strong><?php echo number_format($home_total_users); ?></strong>
        <p>{usersregistered}</p>
      </div>
      <div class="home-story-card">
        <span class="home-story-card__eyebrow">{home_story_card_three_eyebrow}</span>
        <strong><?php echo $home_uptime_hours; ?>H</strong>
        <p>{onlinetime}</p>
      </div>
    </div>
  </section>

  <section class="home-final-cta wow fadeInUp" data-wow-delay="0.1s">
    <span class="home-kicker">{downloadbutton}</span>
    <h2>{home_final_title}</h2>
    <p>{home_final_text}</p>
    <div class="home-actions home-actions--center">
      <a href="{download_url}" class="home-btn home-btn--primary" target="_blank">
        <i class="fas fa-download"></i>
        <span>{downloadbutton}</span>
      </a>
      <a href="<?php echo base_url('news'); ?>" class="home-btn home-btn--ghost">
        <i class="fas fa-arrow-right"></i>
        <span>{news}</span>
      </a>
    </div>
  </section>
</main>
