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

  /**
   * Add admin menu pages
   */
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

    $this->lexi_separator();

    // Add external links
    $submenu['lexi'][] = array('Theme Generator', 'manage_options', 'http://theme-generator.elexicon.com');
    $submenu['lexi'][] = array('Documentation', 'manage_options', 'http://theme-generator.elexicon.com/docs');
    $submenu['lexi'][] = array('Support', 'manage_options', 'https://github.com/TylerB24890/lexi/issues');
  }

  /**
   * Render the Lexi Overview (dashboard) page
   * @return void
   */
  public function render_lexi_dashboard() {
    require(LEXI_DIR . 'admin/partials/admin-dashboard.php');
  }

  /**
   * Render the Lexi Options page
   * @return void
   */
  public function render_lexi_options() {
    require(LEXI_DIR . 'admin/partials/admin-options.php');
  }

  /**
   * Custom WP Admin Menu Separator
   * @param  string $parent The parent item where to place the separator
   * @return void
   */
  private function lexi_separator($parent = 'lexi') {
    // Separator
    add_submenu_page(
      $parent,
      '',
      '<span class="lexi-separator"></span>',
      "manage_options",              //capability (set to your requirement)
      "#"
    );
  }
}
