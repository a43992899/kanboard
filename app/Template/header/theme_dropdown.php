<?php

$current_theme = $this->user->getTheme();
$theme_options = array(
    'auto' => array(
        'icon' => 'desktop',
        'label' => t('Automatic theme - Sync with system'),
        'short_label' => 'Auto',
    ),
    'light' => array(
        'icon' => 'sun-o',
        'label' => t('Light theme'),
        'short_label' => 'Light',
    ),
    'dark' => array(
        'icon' => 'moon-o',
        'label' => t('Dark theme'),
        'short_label' => 'Dark',
    ),
);

if (! isset($theme_options[$current_theme])) {
    $current_theme = 'auto';
}

?>
<div class="dropdown cubby-theme-menu">
    <a href="#"
       class="dropdown-menu dropdown-menu-link-icon cubby-theme-menu-button"
       title="<?= $this->text->e(t('Theme')) ?>: <?= $this->text->e($theme_options[$current_theme]['short_label']) ?>">
        <i class="fa fa-fw fa-<?= $theme_options[$current_theme]['icon'] ?>" aria-hidden="true"></i>
        <span class="ui-helper-hidden-accessible"><?= $this->text->e(t('Theme')) ?></span>
        <i class="fa fa-caret-down" aria-hidden="true"></i>
    </a>
    <ul>
        <?php foreach ($theme_options as $theme => $option): ?>
            <li class="<?= $theme === $current_theme ? 'cubby-theme-current' : '' ?>">
                <?= $this->url->icon(
                    $theme === $current_theme ? 'check' : $option['icon'],
                    $option['label'],
                    'UserModificationController',
                    'switchTheme',
                    array(
                        'theme' => $theme,
                        'redirect' => $this->app->getCurrentUri(),
                    ),
                    true
                ) ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>
