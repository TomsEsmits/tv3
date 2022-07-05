<?php
    class Custom_Functions {
        public function __construct() {
            add_action( 'init', [$this, 'generate_custom_cpt'] );
            add_action( 'init', [$this, 'generate_custom_taxonomy'] );
        }

        /**
		* Generating a Custom Post Type - Latest news.
		*/
		public function generate_custom_cpt() {
			$labels = array(
				'name'                  => _x( 'Latest News', 'Post Type General Name' ),
				'singular_name'         => _x( 'Latest News', 'Post Type Singular Name' ),
				'menu_name'             => __( 'Latest News' ),
				'name_admin_bar'        => __( 'Latest News' ),
				'archives'              => __( 'Item Archives' ),
				'attributes'            => __( 'Item Attributes' ),
				'parent_item_colon'     => __( 'Parent Item:' ),
				'all_items'             => __( 'All Items' ),
				'add_new_item'          => __( 'Add New Item' ),
				'add_new'               => __( 'Add New' ),
				'new_item'              => __( 'New Item' ),
				'edit_item'             => __( 'Edit Item' ),
				'update_item'           => __( 'Update Item' ),
				'view_item'             => __( 'View Item' ),
				'view_items'            => __( 'View Items' ),
				'search_items'          => __( 'Search Item' ),
				'not_found'             => __( 'Not found' ),
				'not_found_in_trash'    => __( 'Not found in Trash' ),
				'featured_image'        => __( 'Featured Image' ),
				'set_featured_image'    => __( 'Set featured image' ),
				'remove_featured_image' => __( 'Remove featured image' ),
				'use_featured_image'    => __( 'Use as featured image' ),
				'insert_into_item'      => __( 'Insert into item' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item' ),
				'items_list'            => __( 'Items list' ),
				'items_list_navigation' => __( 'Items list navigation' ),
				'filter_items_list'     => __( 'Filter items list' ),
			);
			$args = array(
				'label'                 => __( 'Latest News' ),
				'description'           => __( 'Latest News Description' ),
				'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
				'labels'                => $labels,
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			);
			register_post_type( 'latest-news', $args );
		}

        /**
        * Generating a Custom Taxonomies.
        */
        public function generate_custom_taxonomy() {
            // Custom taxonomy for Latest news post
            $labels = array(
                'name'                       => _x( 'Categories', 'Taxonomy General Name' ),
                'singular_name'              => _x( 'Category', 'Taxonomy Singular Name' ),
                'menu_name'                  => __( 'Category' ),
                'all_items'                  => __( 'All Categories' ),
                'parent_item'                => __( 'Parent Category' ),
                'parent_item_colon'          => __( 'Parent Category:' ),
                'new_item_name'              => __( 'New Category Name' ),
                'add_new_item'               => __( 'Add New Category' ),
                'edit_item'                  => __( 'Edit Category' ),
                'update_item'                => __( 'Update Category' ),
                'view_item'                  => __( 'View Category' ),
                'separate_items_with_commas' => __( 'Separate categories with commas' ),
                'add_or_remove_items'        => __( 'Add or remove categories' ),
                'choose_from_most_used'      => __( 'Choose from the most used' ),
                'popular_items'              => __( 'Popular Categories' ),
                'search_items'               => __( 'Search Categories' ),
                'not_found'                  => __( 'Not Found' ),
                'no_terms'                   => __( 'No categories' ),
                'items_list'                 => __( 'Categories list' ),
                'items_list_navigation'      => __( 'Categories list navigation' ),
            );
            $args = array(
                'labels'                    => $labels,
                'rewrite'            	  	=> array('slug' => 'latest-news-category'),
                'hierarchical'              => true,
                'public' 					=> false,
                'show_ui' 					=> true,
                'show_in_rest' 				=> true,
                'show_admin_column' 		=> true,
                'query_var' 				=> true,
            );

            register_taxonomy( 'latest_news_cat', array( 'latest-news' ), $args );
        }
    }

    new Custom_Functions();
?>