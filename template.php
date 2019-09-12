<?php
/**
 * Custom theme functions for PackWeb.
 */

/**
 * Implements hook_preprocess_page().
 */
function pw_theme_preprocess_page(&$variables) {
  // Add CSS from the Seven theme.
  $seven = backdrop_get_path('theme', 'seven');
  $options = array(
    'group' => CSS_THEME,
    'every_page' => TRUE,
    'weight' => -1,
  );
  backdrop_add_css("$seven/css/seven.base.css", $options);
  backdrop_add_css("$seven/css/style.css", $options);
  backdrop_add_css("$seven/css/responsive-tabs.css", $options);

  // Add the OpenSans font from core on every page of the site.
  backdrop_add_library('system', 'opensans', TRUE);
}

/**
 * Implements hook_css_alter().
 */
function pw_theme_css_alter(&$css) {
  // Use Seven's vertical tabs style instead of the default one.
  if (isset($css['core/misc/vertical-tabs.css'])) {
    $css['core/misc/vertical-tabs.css']['data'] = backdrop_get_path('theme', 'seven') . '/css/vertical-tabs.css';
    $css['core/misc/vertical-tabs.css']['type'] = 'file';
  }

  // Use Seven's jQuery UI theme style instead of the default one.
  if (isset($css['core/misc/ui/jquery.ui.theme.css'])) {
    $css['core/misc/ui/jquery.ui.theme.css']['data'] = backdrop_get_path('theme', 'seven') . '/css/jquery.ui.theme.css';
    $css['core/misc/ui/jquery.ui.theme.css']['type'] = 'file';
    $css['core/misc/ui/jquery.ui.theme.css']['weight'] = 10;
  }
}

