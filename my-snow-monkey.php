<?php
/**
 * Plugin name: My Snow Monkey
 * Description: Olein Design 制作の My Snow Monkey
 * Version: 1.0.0
 *
 * @package my-snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'MY_SNOW_MONKEY_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Register style
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'my-snow-monkey-style',
			MY_SNOW_MONKEY_URL . '/build/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( plugin_dir_path( __FILE__ ) )
		);
	}
);

/**
 * Register Style for Editor
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'editor-styles' );

		add_editor_style( plugins_url( 'build/editor-style.css', __FILE__ ) );
	}
);
