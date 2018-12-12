<?php

/**
 * Lexi Admin
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon\Lexi\Admin;

class Init {

  public function __construct() {

    if( ! is_admin() ) {
      return;
    }

    $this->load_admin_dependencies();
  }

  private function load_admin_dependencies() {
    new Pages();
    new Assets();
  }
}
