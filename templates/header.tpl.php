<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 */
?>

<?php if ($logo): ?>
  <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
    <img src="<?php print $logo; ?>" alt="<?php print t('@site-name logo', array('@site-name' => $site_name)); ?>" />
  </a>
<?php endif; ?>

<?php if ($site_name || $site_slogan): ?>
  <div class="name-and-slogan<?php if ($hide_site_name && $hide_site_slogan) print ' element-invisible'; ?>">
    <?php if ($site_name): ?>
      <div class="site-name<?php if ($hide_site_name) print ' element-invisible'; ?>">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <?php print $site_name; ?>
        </a>
      </div>
    <?php endif; ?>

    <?php if ($site_slogan): ?>
      <div class="site-slogan<?php if ($hide_site_slogan) print ' element-invisible'; ?>">
        <?php print $site_slogan; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php if ($menu): ?>
  <nav class="header-menu">
    <?php print $menu; ?>
  </nav>
<?php endif; ?>

