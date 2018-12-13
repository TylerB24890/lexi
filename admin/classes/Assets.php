<?php

/**
 * Loads Lexi Admin Assets
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */


namespace Elexicon\Lexi\Admin;

if ( ! defined( 'ABSPATH' ) ) exit(); // No direct access

class Assets {
  public function __construct() {
    add_action( 'admin_enqueue_scripts', array( $this, 'load_assets' ) );
  }

  public function load_assets( $hook ) {

    wp_enqueue_style( 'lexi-admin', LEXI_URL . 'admin/assets/styles/lexi-admin.css' );
    wp_enqueue_script( 'lexi-admin-js', LEXI_URL . 'admin/assets/js/lexi-admin.js', array('jquery') );
  }
}
