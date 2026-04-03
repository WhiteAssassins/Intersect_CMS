<?php
$viewText = get_defined_vars();
$translate = static function ($key, $default = '') use ($viewText) {
    return isset($viewText[$key]) && $viewText[$key] !== '' ? $viewText[$key] : $default;
};
?>
<!DOCTYPE html>
<html lang="<?php echo html_escape($current_language_code ?? 'es'); ?>" dir="<?php echo html_escape($current_language_direction ?? 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title><?php echo html_escape($translate('installer_page_title', 'Intersect CMS Installer')); ?></title>
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/installer.css'); ?>">
</head>
<body class="installer-body<?php echo !empty($current_language_is_rtl) ? ' site-shell--rtl' : ''; ?>">
<main class="installer-shell">
    <section class="installer-hero">
        <div class="installer-hero__copy">
            <span class="installer-hero__eyebrow"><?php echo html_escape($translate('installer_hero_eyebrow', 'Intersect Engine CMS')); ?></span>
            <h1 class="installer-hero__title"><?php echo html_escape($translate('installer_hero_title', 'Easy install wizard')); ?></h1>
            <p class="installer-hero__text"><?php echo html_escape($translate('installer_hero_text', 'This setup prepares the database, imports the base schema, creates the first admin account and stores the local configuration so the CMS can boot without manual file edits.')); ?></p>
        </div>
        <div class="installer-hero__meta">
            <span class="installer-hero__pill">CodeIgniter 3.1.13</span>
            <span class="installer-hero__pill"><?php echo html_escape($translate('installer_hero_pill_guided', 'Guided setup')); ?></span>
            <span class="installer-hero__pill"><?php echo html_escape($translate('installer_hero_pill_secure', 'Secure defaults')); ?></span>
        </div>
    </section>

    <?php if (!empty($success)) { ?>
        <section class="installer-panel installer-panel--success">
            <span class="installer-section__eyebrow"><?php echo html_escape($translate('installer_success_eyebrow', 'Installation complete')); ?></span>
            <h2 class="installer-section__title"><?php echo html_escape($translate('installer_success_title', 'Your CMS is ready')); ?></h2>
            <p class="installer-section__text"><?php echo html_escape($translate('installer_success_text', 'The project now has a local installer state file, an initialized database and a custom admin account.')); ?></p>

            <div class="installer-summary">
                <article class="installer-summary__card">
                    <span class="installer-summary__label"><?php echo html_escape($translate('installer_field_base_url', 'Base URL')); ?></span>
                    <strong><?php echo html_escape($summary['base_url'] ?? ''); ?></strong>
                </article>
                <article class="installer-summary__card">
                    <span class="installer-summary__label"><?php echo html_escape($translate('installer_summary_database', 'Database')); ?></span>
                    <strong><?php echo html_escape($summary['database'] ?? ''); ?></strong>
                </article>
                <article class="installer-summary__card">
                    <span class="installer-summary__label"><?php echo html_escape($translate('installer_field_admin_user', 'Admin user')); ?></span>
                    <strong><?php echo html_escape($summary['admin_user'] ?? ''); ?></strong>
                </article>
                <article class="installer-summary__card">
                    <span class="installer-summary__label"><?php echo html_escape($translate('installer_field_default_language', 'Default language')); ?></span>
                    <strong><?php echo html_escape(strtoupper($summary['language'] ?? 'es')); ?></strong>
                </article>
            </div>

            <div class="installer-actions">
                <a href="<?php echo base_url(); ?>" class="admin-button admin-button--primary"><?php echo html_escape($translate('installer_action_open_site', 'Open website')); ?></a>
                <a href="<?php echo base_url('admin'); ?>" class="admin-button admin-button--ghost"><?php echo html_escape($translate('installer_action_open_admin', 'Open admin panel')); ?></a>
            </div>
        </section>
    <?php } else { ?>
        <?php if (!empty($errors)) { ?>
            <section class="installer-panel installer-panel--danger">
                <span class="installer-section__eyebrow"><?php echo html_escape($translate('installer_error_eyebrow', 'Review needed')); ?></span>
                <h2 class="installer-section__title"><?php echo html_escape($translate('installer_error_title', 'The install could not finish')); ?></h2>
                <ul class="installer-error-list">
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo html_escape($error); ?></li>
                    <?php } ?>
                </ul>
            </section>
        <?php } ?>

        <section class="installer-layout">
            <aside class="installer-panel">
                <span class="installer-section__eyebrow"><?php echo html_escape($translate('installer_checks_eyebrow', 'Server checks')); ?></span>
                <h2 class="installer-section__title"><?php echo html_escape($translate('installer_checks_title', 'Environment readiness')); ?></h2>
                <p class="installer-section__text"><?php echo html_escape($translate('installer_checks_text', 'These checks make sure the project can write local config, use MySQL and import the bundled schema.')); ?></p>

                <div class="installer-checks">
                    <?php foreach ($checks as $check) { ?>
                        <article class="installer-check <?php echo !empty($check['status']) ? 'installer-check--ok' : 'installer-check--fail'; ?>">
                            <div>
                                <strong><?php echo html_escape($check['label']); ?></strong>
                                <small><?php echo html_escape($check['detail']); ?></small>
                            </div>
                            <span><?php echo html_escape(!empty($check['status']) ? $translate('installer_status_ok', 'OK') : $translate('installer_status_fail', 'FAIL')); ?></span>
                        </article>
                    <?php } ?>
                </div>
            </aside>

            <section class="installer-panel installer-panel--form">
                <span class="installer-section__eyebrow"><?php echo html_escape($translate('installer_form_eyebrow', 'Setup wizard')); ?></span>
                <h2 class="installer-section__title"><?php echo html_escape($translate('installer_form_title', 'Project, database and admin')); ?></h2>
                <p class="installer-section__text"><?php echo html_escape($translate('installer_form_text', 'Fill in the basic project details first. Advanced integrations are optional and can be completed later from the admin panel.')); ?></p>

                <form method="post" class="installer-form">
                    <div class="installer-form__group">
                        <h3><?php echo html_escape($translate('installer_group_project', 'Project')); ?></h3>
                        <div class="installer-form__grid">
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_base_url', 'Base URL')); ?></span>
                                <input type="url" name="base_url" value="<?php echo html_escape($form['base_url'] ?? ''); ?>" placeholder="https://example.com/cms/" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_default_language', 'Default language')); ?></span>
                                <select name="default_lang" required>
                                    <?php foreach ($installer_language_options as $languageOption) { ?>
                                        <option value="<?php echo html_escape($languageOption['code']); ?>" <?php echo (($form['default_lang'] ?? 'es') === $languageOption['code']) ? 'selected' : ''; ?>>
                                            <?php echo html_escape($languageOption['short'] . ' - ' . $languageOption['label']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_download_url', 'Download URL')); ?></span>
                                <input type="url" name="download_url" value="<?php echo html_escape($form['download_url'] ?? ''); ?>" placeholder="https://example.com/download">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_analytics_id', 'Analytics ID')); ?></span>
                                <input type="text" name="analytics_id" value="<?php echo html_escape($form['analytics_id'] ?? ''); ?>" placeholder="G-XXXXXXXXXX">
                            </label>
                        </div>
                    </div>

                    <div class="installer-form__group">
                        <h3><?php echo html_escape($translate('installer_group_database', 'Database')); ?></h3>
                        <div class="installer-form__grid">
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_db_host', 'Host')); ?></span>
                                <input type="text" name="db_host" value="<?php echo html_escape($form['db_host'] ?? 'localhost'); ?>" placeholder="localhost" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_db_port', 'Port')); ?></span>
                                <input type="text" name="db_port" value="<?php echo html_escape($form['db_port'] ?? '3306'); ?>" placeholder="3306" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_db_name', 'Database name')); ?></span>
                                <input type="text" name="db_name" value="<?php echo html_escape($form['db_name'] ?? 'intersec'); ?>" placeholder="intersec" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_db_user', 'Database user')); ?></span>
                                <input type="text" name="db_user" value="<?php echo html_escape($form['db_user'] ?? 'root'); ?>" placeholder="root" required>
                            </label>
                            <label class="installer-field installer-field--full">
                                <span><?php echo html_escape($translate('installer_field_db_pass', 'Database password')); ?></span>
                                <input type="password" name="db_pass" value="<?php echo html_escape($form['db_pass'] ?? ''); ?>" placeholder="<?php echo html_escape($translate('installer_placeholder_db_pass', 'Leave blank if there is no password')); ?>">
                            </label>
                        </div>
                    </div>

                    <div class="installer-form__group">
                        <h3><?php echo html_escape($translate('installer_group_admin', 'Admin account')); ?></h3>
                        <div class="installer-form__grid">
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_admin_user', 'Admin username')); ?></span>
                                <input type="text" name="admin_user" value="<?php echo html_escape($form['admin_user'] ?? 'Admin'); ?>" placeholder="Admin" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_admin_email', 'Admin email')); ?></span>
                                <input type="email" name="admin_email" value="<?php echo html_escape($form['admin_email'] ?? ''); ?>" placeholder="admin@example.com" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_admin_pass', 'Password')); ?></span>
                                <input type="password" name="admin_pass" value="<?php echo html_escape($form['admin_pass'] ?? ''); ?>" placeholder="<?php echo html_escape($translate('installer_placeholder_admin_pass', 'At least 6 characters')); ?>" required>
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_admin_pass_confirm', 'Confirm password')); ?></span>
                                <input type="password" name="admin_pass_confirm" value="<?php echo html_escape($form['admin_pass_confirm'] ?? ''); ?>" placeholder="<?php echo html_escape($translate('installer_placeholder_admin_pass_confirm', 'Repeat the password')); ?>" required>
                            </label>
                        </div>
                    </div>

                    <div class="installer-form__group">
                        <h3><?php echo html_escape($translate('installer_group_integrations', 'Optional integrations')); ?></h3>
                        <div class="installer-form__grid">
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_api_ip', 'Intersect API host')); ?></span>
                                <input type="text" name="api_ip" value="<?php echo html_escape($form['api_ip'] ?? ''); ?>" placeholder="127.0.0.1:5400">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_api_user', 'Intersect API user')); ?></span>
                                <input type="text" name="api_user" value="<?php echo html_escape($form['api_user'] ?? ''); ?>" placeholder="api-user">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_api_pass', 'Intersect API password or SHA-256')); ?></span>
                                <input type="password" name="api_pass" value="<?php echo html_escape($form['api_pass'] ?? ''); ?>" placeholder="api-user-password">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_qvapay_id', 'QvaPay app ID')); ?></span>
                                <input type="text" name="qvapay_id" value="<?php echo html_escape($form['qvapay_id'] ?? ''); ?>">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_qvapay_secret', 'QvaPay app secret')); ?></span>
                                <input type="password" name="qvapay_secret" value="<?php echo html_escape($form['qvapay_secret'] ?? ''); ?>">
                            </label>
                            <label class="installer-field">
                                <span><?php echo html_escape($translate('installer_field_support_email', 'Support email')); ?></span>
                                <input type="email" name="support_email" value="<?php echo html_escape($form['support_email'] ?? ''); ?>" placeholder="support@example.com">
                            </label>
                            <label class="installer-field installer-field--full">
                                <span><?php echo html_escape($translate('installer_field_support_email_password', 'Support email password')); ?></span>
                                <input type="password" name="support_email_password" value="<?php echo html_escape($form['support_email_password'] ?? ''); ?>">
                            </label>
                        </div>
                    </div>

                    <div class="installer-actions">
                        <button type="submit" class="admin-button admin-button--primary"><?php echo html_escape($translate('installer_action_install', 'Install Intersect CMS')); ?></button>
                    </div>
                </form>
            </section>
        </section>
    <?php } ?>
</main>
</body>
</html>
