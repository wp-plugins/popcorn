<?php 
/**
 * Plugin Name: Popcorn Plugin
 * Plugin URI: http://capsicummediaworks.com/
 * Description: This WP Popcorn Plugin helps the Administrator in various ways. Admin can activate any one of the following features.1. Image Only, 2.Ask a Question,3.Text Only, 4.Custom Form.  So install and enjoy it.
 * Version: 1.0
 * Author: Sumit Nayak
 * Author URI: capsicummediaworks.com
 * License: GPL2
   Copyright 2014  Sumitkumar Nayak  (email : sumitkumarnayak@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/




// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'POPCORN_VERSION', '1.0' );
define( 'POPCORN__MINIMUM_WP_VERSION', '3.0' );
define( 'POPCORN__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'POPCORN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( POPCORN__PLUGIN_DIR . 'class/class.popcorn.php' );

add_action( 'init', array( 'popcorn', 'init' ) );

register_activation_hook(__FILE__,array( 'popcorn', 'pop_up_plugin_install' ));



?>