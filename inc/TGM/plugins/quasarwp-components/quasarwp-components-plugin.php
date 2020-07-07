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
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! function_exists( 'tgm_php_mysql_versions' ) ) {

	add_action( 'rightnow_end', 'tgm_php_mysql_versions', 9 );

	/**
	 * Displays the current server's PHP and MySQL versions right below the WordPress version
	 * in the Right Now dashboard widget.
	 *
	 * @since 1.0.0
	 */
	function tgm_php_mysql_versions() {
		echo wp_kses(
			sprintf(
				/* TRANSLATORS: %1 = php version nr, %2 = mysql version nr. */
				__( '<p>You are running on <strong>PHP %1$s</strong> and <strong>MySQL %2$s</strong>.</p>', 'quasarwp' ),
				phpversion(),
				$GLOBALS['wpdb']->db_version()
			),
			array(
				'p' => array(),
				'strong' => array(),
			)
		);
	}
}
