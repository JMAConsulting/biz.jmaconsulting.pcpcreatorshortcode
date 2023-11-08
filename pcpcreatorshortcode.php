<?php

require_once 'pcpcreatorshortcode.civix.php';
// phpcs:disable
use CRM_Pcpcreatorshortcode_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function pcpcreatorshortcode_civicrm_config(&$config) {
  _pcpcreatorshortcode_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function pcpcreatorshortcode_civicrm_install() {
  _pcpcreatorshortcode_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function pcpcreatorshortcode_civicrm_enable() {
  _pcpcreatorshortcode_civix_civicrm_enable();
}

if (function_exists('add_filter')) {
  add_filter('civicrm_shortcode_preprocess_atts', 'pcpcreatorshortcode_amend_args', 10, 2);
//  add_filter('civicrm_shortcode_get_data', 'pcpcreatorshortcode_amend_data', 10, 3);
}

function pcpcreatorshortcode_amend_args( $args, $shortcode_atts)  {
  extract($shortcode_atts);
  if ($component === 'pcp') {
    if ($mode === 'add') {
      $args['q'] = 'civicrm/contribute/campaign';
      $args['pageId'] = $id;
      $args['action'] = $mode;
      $args['reset'] = 1;
      $args['force'] = $force;
      $args['component'] = 'contribute';
    }
  }
  return $args;
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function pcpcreatorshortcode_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function pcpcreatorshortcode_civicrm_navigationMenu(&$menu) {
//  _pcpcreatorshortcode_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _pcpcreatorshortcode_civix_navigationMenu($menu);
//}
