<?php
/**
 * Header Menu Customizer Options
 *
 * @package Responsive WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Header_Menu_Colors_Customizer' ) ) :
	/**
	 *  Header Menu Customizer Options
	 */
	class Responsive_Header_Menu_Colors_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'customizer_options' ) );

		}

		/**
		 * Customizer options
		 *
		 * @since 0.2
		 *
		 * @param  object $wp_customize WordPress customization option.
		 */
		public function customizer_options( $wp_customize ) {

			/**
			 * Menu Layouts.
			 */
			$wp_customize->add_section(
				'responsive_header_menu_colors',
				array(
					'title'    => __( 'Colors', 'responsive' ),
					'panel'    => 'responsive_header_menu',
					'priority' => 4,
				)
			);

			// Background Color.
			$menu_background_color_label = __( 'Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_background', $menu_background_color_label, 'responsive_header_menu_colors', 3, '#ffffff', 'responsive_active_vertical_header' );

			// Border Color.
			$menu_border_color_label = __( 'Border Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_border', $menu_border_color_label, 'responsive_header_menu_colors', 4, '#eaeaea', 'responsive_active_vertical_header' );

			// Link Color.
			$menu_link_color_label = __( 'Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link', $menu_link_color_label, 'responsive_header_menu_colors', 5, '#333333' );

			// Link Hover Color.
			$menu_link_hover_color_label = __( 'Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_link_hover', $menu_link_hover_color_label, 'responsive_header_menu_colors', 6, '#10659C' );

			// Sub Menu Background Color.
			$responsive_header_sub_menu_background_color_label = __( 'Sub Menu Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_background', $responsive_header_sub_menu_background_color_label, 'responsive_header_menu_colors', 9, '#ffffff' );

			// Sub Menu Link Color.
			$sub_menu_link_color_label = __( 'Sub Menu Link Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link', $sub_menu_link_color_label, 'responsive_header_menu_colors', 10, '#333333' );

			// Sub Menu Link Hover Color.
			$sub_menu_link_hover_color_label = __( 'Sub Menu Link Hover Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_sub_menu_link_hover', $sub_menu_link_hover_color_label, 'responsive_sub_menu', 11, '#10659C' );

			// Menu Toggle Background Color.
			$menu_toggle_background_color_label = __( 'Menu Toggle Background Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle_background', $menu_toggle_background_color_label, 'responsive_header_menu_colors', 13, 'transparent' );

			// Menu Toggle Color.
			$menu_toggle_color_label = __( 'Menu Toggle Color', 'responsive' );
			responsive_color_control( $wp_customize, 'header_menu_toggle', $menu_toggle_color_label, 'responsive_header_menu_colors', 14, '#333333' );

		}


	}

endif;

return new Responsive_Header_Menu_Colors_Customizer();
