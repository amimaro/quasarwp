<?php

/**
 * QuasarWP Components Plugin.
 *
 * Menu components generator for QuasarWP theme.
 *
 * @package     WordPress\Theme\QuasarWP
 * @author      Amir Zahlan <amir.zahlan@gmail.com>
 * @link        https://github.com/amimaro/quasarwp
 * @version     1.0.0
 * @copyright   2020-2025 Amir Zahlan
 * @license     http://creativecommons.org/licenses/GPL/3.0/ GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: QuasarWP Components Plugin
 * Plugin URI:  https://amimaro.github.io/quasarwp
 * Description: Menu components generator for QuasarWP theme.
 * Author:      Amir Zahlan
 * Author URI:  https://amimaro.com/
 * Version:     1.0.0
 * Text Domain: quasarwp
 * Domain Path: /languages
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 3, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Avoid direct calls to this file.
if (!function_exists('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

if (!function_exists('create_topics_nonhierarchical_taxonomy')) {

	add_action('init', 'create_topics_nonhierarchical_taxonomy', 0);
	/**
	 * Creates a nonhierarchical taxonomy representing a quasarwp component for menus
	 *
	 * @since 1.0.0
	 */
	function create_topics_nonhierarchical_taxonomy()
	{

		$labels = array(
			'name' => __('QWP Menu Components', 'quasarwp'),
			'singular_name' => __('Menu Component', 'quasarwp'),
			'search_items' =>  __('Search Menu Components', 'quasarwp'),
			'popular_items' => __('Popular Menu Components', 'quasarwp'),
			'all_items' => __('All Menu Components', 'quasarwp'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Menu Component', 'quasarwp'),
			'update_item' => __('Update Menu Component', 'quasarwp'),
			'add_new_item' => __('Add New Menu Component', 'quasarwp'),
			'new_item_name' => __('New Menu Component Name', 'quasarwp'),
			'separate_items_with_commas' => __('Separate menu components with commas', 'quasarwp'),
			'add_or_remove_items' => __('Add or remove menu components', 'quasarwp'),
			'choose_from_most_used' => __('Choose from the most used menu components', 'quasarwp'),
			'menu_name' => __('Menu Components', 'quasarwp'),
		);

		register_taxonomy('qwp_components', 'quasarwp', array( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.plugin_territory_register_taxonomy
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => false,
			'show_in_quick_edit' => false,
			'meta_box_cb' => false,
			'show_admin_column' => false,
			'show_in_menu'  => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => false,
			'rewrite' => array('slug' => 'qwp-components'),
		));

		wp_insert_term(
			'QWPSpace',
			'qwp_components',
			array(
				'description' => 'Menu Space.',
				'slug' => 'qwp-Space',
			)
		);

		wp_insert_term(
			'QWPSeparator',
			'qwp_components',
			array(
				'description' => 'Menu Separator.',
				'slug' => 'qwp-separator',
			)
		);

		wp_insert_term(
			'QWPLabel',
			'qwp_components',
			array(
				'description' => 'Menu Label.',
				'slug' => 'qwp-label',
			)
		);

		wp_insert_term(
			'QWPSearch',
			'qwp_components',
			array(
				'description' => 'Menu Search Input.',
				'slug' => 'qwp-search',
			)
		);

		wp_insert_term(
			'QWPLogo',
			'qwp_components',
			array(
				'description' => 'Site logo or icon.',
				'slug' => 'qwp-logo',
			)
		);
	}
}

if (!function_exists('add_menus')) {

	register_activation_hook(__FILE__, 'add_menus');
	/**
	 * Setup an initial menu items if doesn't exist
	 *
	 * @since 1.0.0
	 */
	function add_menus()
	{
		$menu_names   = array(
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu',
			'left-menu' => 'Left Drawer Menu'
		);
		$menu_ids = array();
		foreach ($menu_names as $key => $menu_name) {
			$menu_exists = wp_get_nav_menu_object($menu_name);
			if (!$menu_exists) {
				$menu_id = wp_create_nav_menu($menu_name);
				if ($menu_id > 0) {
					$menu_ids[$key] = $menu_id;
					if ($key == 'header-menu' || $key == 'footer-menu') {
						wp_update_nav_menu_item($menu_id, 0, array(
							'menu-item-title'   =>  __('QWPLogo', 'quasarwp'),
							'menu-item-status'  => 'publish'
						));
					}
					if ($key == 'header-menu') {
						wp_update_nav_menu_item($menu_id, 0, array(
							'menu-item-title'   =>  __('QWPSpace', 'quasarwp'),
							'menu-item-status'  => 'publish'
						));
						wp_update_nav_menu_item($menu_id, 0, array(
							'menu-item-title'   =>  __('QWPSearch', 'quasarwp'),
							'menu-item-status'  => 'publish'
						));
					}
					if ($key == 'left-menu') {
						wp_update_nav_menu_item($menu_id, 0, array(
							'menu-item-title' =>  '<q-icon name="home" size="md"></q-icon>&nbsp;' . __('Home', 'quasarwp'),
							'menu-item-url' => '/',
							'menu-item-status' => 'publish',
							'menu-item-type' => 'custom',
						));
					}
				}
			}
		}
		if (count($menu_ids) > 0) {
			set_theme_mod('nav_menu_locations', $menu_ids);
		}
	}
}
