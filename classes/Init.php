<?php

/**
 * Theme initialization class
 *
 * Initial theme setup and functions
 *
 * @author Tyler Bailey <tylerb.media@gmail.com>
 * @version 1.0.0
 */

namespace Elexicon\Lexi\Core;
use \Elexicon\Lexi\Core\Helper;

class Init {

	/**
	 * Constructs the class variables
	 *
	 * Configures theme with WP
	 */
	public function __construct() {
		$this->setup_theme();
	}

	private function setup_theme() {
		add_action('after_setup_theme', array($this, 'theme_init'));
		add_action('init', array($this, 'register_theme_menus'));
		add_action('upload_mimes', array($this, 'add_svg_support'));

		$this->load_dependencies();
	}

	/**
	 * Load Lexi dependency files & register shortcodes
	 * @return null
	 */
	private function load_dependencies() {
		require_once(LEXI_DIR . 'theme-functions.php');

		new \Elexicon\Lexi\Shortcodes\Register();
	}

	/**
	 * Initialize The Theme
	 * @return null
	 */
	public function theme_init() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on beer, use a find and replace
		 * to change 'beer' to the name of your theme in all the template files.
		 */
		load_theme_textdomain(Helper::$theme_slug, get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', Helper::$theme_slug),
			'secondary' => esc_html__('Secondary', Helper::$theme_slug),
			'footer' => esc_html__('Footer', Helper::$theme_slug)
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		/*
		 * Enable support for Post Formats.
		 */
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		));

		// Remove unnecessary elements from header
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
		remove_action('template_redirect', 'rest_output_link_header', 11, 0);
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('admin_print_styles', 'print_emoji_styles');
	}

	/**
	 * Add SVG Support to WP Media Library
	 *
	 * @param array $file_types Array of supported MIME types
	 * @return array 						Modified list of supported MIME types
	 */
	public function add_svg_support($file_types) {
		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge( $file_types, $new_filetypes );
		return $file_types;
	}

	/**
	 * Register Primary Menu with WP
	 */
	public function register_theme_menus() {
		$menus = array(
			__('Primary Menu', Helper::$theme_slug)
		);

		foreach($menus as $menu) {
			$exists = wp_get_nav_menu_object($menu);

			if(!$exists) {
				$menu_id = wp_create_nav_menu($menu);
			}
		}
	}
}
