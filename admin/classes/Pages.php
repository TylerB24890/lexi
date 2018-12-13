<?php

/**
 * Lexi Admin Pages
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon\Lexi\Admin;

class Pages {

  public function __construct() {
    add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
  }

  public function add_admin_pages() {
    global $submenu;

    // Top Level
    add_menu_page(
      __( 'Lexi', 'lexi' ),
      __( 'Lexi', 'lexi' ),
      'manage_options',
      'lexi',
      array( $this, 'render_lexi_dashboard' )
    );

    // Custom Top Level Link
    add_submenu_page(
      'lexi',
      __('Overview', 'lexi'),
      __('Overview', 'lexi'),
      'manage_options',
      'lexi'
    );

    // Options page
    add_submenu_page(
      'lexi',
      __('Options', 'lexi'),
      __('Options', 'lexi'),
      'manage_options',
      'lexi-options',
      array($this, 'render_lexi_options')
    );

    // Add external links
    $submenu['lexi'][] = array('Theme Generator', 'manage_options', 'http://theme-generator.elexicon.com');
    $submenu['lexi'][] = array('Documentation', 'manage_options', 'http://theme-generator.elexicon.com/docs');
  }

  public function render_lexi_dashboard() {
    require(LEXI_DIR . 'admin/partials/admin-dashboard.php');
  }

  public function render_lexi_options() {
    require(LEXI_DIR . 'admin/partials/admin-options.php');
  }
}
