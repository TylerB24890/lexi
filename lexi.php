<?php

/**
 * Core Lexi Framework File
 */

 $whitelist = array(
   '127.0.0.1',
   '::1'
 );

 if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
   define('LEXI_DEV', true);
 }

 define('LEXI_DIR', __DIR__ . '/');

 // Load the theme initialization class
 require_once(LEXI_DIR . '/vendor/autoload.php');
 $lexi = new \Elexicon\Lexi\Core\Init;
