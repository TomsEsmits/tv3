<?php
  	class Theme_Setup {
		public function __construct() {
			$this->add_theme_support( 'post-thumbnails' );
			add_action( 'admin_menu', [$this, 'remove_default_post_type'] );
			add_action( 'allowed_block_types_all', [$this, 'allowed_block_types'] );
			add_filter( 'the_time', [$this, 'post_time'] );
		}

		/**
		* Registers theme support for a given feature.
		* 
		* @param string $feature The feature being added.
		*/
		public function add_theme_support( $feature )
		{
			add_action('after_setup_theme', function() use ( $feature ) {
				add_theme_support( $feature );
			});
		}

		/**
		* Remove Wordpress default post type
		*/
		public function remove_default_post_type() {
			remove_menu_page( 'edit.php' );
		}

		/**
		* Remove Wordpress default Gutenberg blocks.
		*/
		public function allowed_block_types( $allowed_blocks ) {
			$allowed_blocks = array();
		
			return $allowed_blocks;
		}
  	}
?>