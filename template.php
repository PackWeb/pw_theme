<?php
/**
 * Custom theme functions for PackWeb.
 */

/**
 * Implements hook_preprocess_page().
 */
function pw_theme_preprocess_page(&$variables) {
  // Display 'Site Name | Slogan' in the titlebar on the frontpage.
  if (backdrop_is_front_page()) {
    $name = check_plain(config_get('system.core', 'site_name'));
    $slogan = check_plain(strip_tags(config_get('system.core', 'site_slogan')));
    $variables['head_title_array'] = array();
    $variables['head_title_array']['name'] = $name;
    if (!empty($slogan)) {
      $variables['head_title_array']['slogan'] = $slogan;
    }
    $variables['head_title'] = implode(' | ', $variables['head_title_array']);
  }
}

/**
 * Implements hook_preprocess_header().
 */
function pw_theme_preprocess_header(&$variables) {
  // Always output the site name and slogan, but hide them if they're toggled
  // off (the actual hiding happens in header.tpl.php).
  $variables['hide_site_name'] = empty($variables['site_name']);
  $variables['hide_site_slogan'] = empty($variables['site_slogan']);
  if (empty($variables['site_name'])) {
    $variables['site_name'] = check_plain(config_get('system.core', 'site_name'));
  }
  if (empty($variables['site_slogan'])) {
    $variables['site_slogan'] = filter_xss_admin(config_get('system.core', 'site_slogan'));
  }
}

