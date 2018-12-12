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
    add_menu_page(
      __( 'Lexi', 'lexi' ),
      __( 'Lexi', 'lexi' ),
      'manage_options',
      'lexi',
      array( $this, 'render_lexi_dashboard' )
    );
  }

  public function render_lexi_dashboard() {
    require(LEXI_DIR . 'admin/partials/admin-dashboard.php');
  }
}
