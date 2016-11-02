<?php
/**
 * Compatibility functions for TablePress
 */

/**
 * Remove TablePress search integration with the WordPress search
 *
 * This is because TablePress in Oklahome Watch is trying to search so many tables that WordPress gets an "Allowed memory size of xx bytes exhausted" error
 *
 * @filter tablepress_wp_search_integration
 * @since 2016-05-03
 */
add_filter( 'tablepress_wp_search_integration', '__return_false' );
