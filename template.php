<?php
/**
 * Custom theme functions for PackWeb.
 */

/**
 * Implements hook_preprocess_header().
 *
 * Always output the site name and slogan, but hide them if they're toggled off
 * (the actual hiding happens in header.tpl.php).
 */
function pw_theme_preprocess_header(&$variables) {
  // Get booleans for the name/slogan toggle status.
  $variables['hide_site_name'] = empty($variables['site_name']);
  $variables['hide_site_slogan'] = empty($variables['site_slogan']);

  // Populate the name/slogan variables again for output regardless.
  $variables['site_name'] = filter_xss(config_get('system.core', 'site_name'));
  $variables['site_slogan'] = filter_xss(config_get('system.core', 'site_slogan'));
}

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

