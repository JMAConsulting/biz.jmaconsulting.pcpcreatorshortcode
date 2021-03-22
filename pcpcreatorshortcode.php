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
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function pcpcreatorshortcode_civicrm_xmlMenu(&$files) {
  _pcpcreatorshortcode_civix_civicrm_xmlMenu($files);
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
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function pcpcreatorshortcode_civicrm_postInstall() {
  _pcpcreatorshortcode_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function pcpcreatorshortcode_civicrm_uninstall() {
  _pcpcreatorshortcode_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function pcpcreatorshortcode_civicrm_enable() {
  _pcpcreatorshortcode_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function pcpcreatorshortcode_civicrm_disable() {
  _pcpcreatorshortcode_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function pcpcreatorshortcode_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _pcpcreatorshortcode_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function pcpcreatorshortcode_civicrm_managed(&$entities) {
  _pcpcreatorshortcode_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function pcpcreatorshortcode_civicrm_caseTypes(&$caseTypes) {
  _pcpcreatorshortcode_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function pcpcreatorshortcode_civicrm_angularModules(&$angularModules) {
  _pcpcreatorshortcode_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function pcpcreatorshortcode_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _pcpcreatorshortcode_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function pcpcreatorshortcode_civicrm_entityTypes(&$entityTypes) {
  _pcpcreatorshortcode_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function pcpcreatorshortcode_civicrm_themes(&$themes) {
  _pcpcreatorshortcode_civix_civicrm_themes($themes);
}

if (function_exists('add_filter')) {
  add_filter('civicrm_shortcode_preprocess_atts', 'pcpcreatorshortcode_amend_args', 10, 2);
//  add_filter('civicrm_shortcode_get_data', 'pcpcreatorshortcode_amend_data', 10, 3);
}

function pcpcreatorshortcode_amend_args( $args, $shortcode_atts)  {
  $defaults = [
    'component' => 'contribution',
    'action' => NULL,
    'mode' => NULL,
    'id' => NULL,
    'cid' => NULL,
    'gid' => NULL,
    'cs' => NULL,
    'force' => NULL,
    'pageId' => NULL,
  ];
  $shortcode_atts = shortcode_atts($defaults, $atts, 'civicrm');
  extract($shortcode_atts);
  if ($component === 'pcp') {
    if ($action === 'add') {
      $args['q'] = 'civicrm/contribute/campaign';
      $args['pageId'] = $pageId;
      $args['action'] = $action;
      $args['reset'] = 1;
      $args['force'] = $force;
      $args['component'] = 'contribution';
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
