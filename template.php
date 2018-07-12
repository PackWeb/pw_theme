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

