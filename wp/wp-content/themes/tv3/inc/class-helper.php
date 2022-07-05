<?php
    class Helper {
        /**
        * Returns SVG content from URL.
        * 
        * @param string $path The URI to the SVG file.
        * 
        * @return string Output containing the SVG source.
        */
        public static function load_svg( $path ) {
            if  ( strpos( $path , 'http' ) !== FALSE ) {
                $path = parse_url($path, PHP_URL_PATH);
                $filename = ABSPATH . $path;
            } else {
                $filename = get_template_directory() . $path;
            }
        
            if (file_exists($filename)) :
                $handle = fopen( $filename, 'r' );
                return fread( $handle, filesize( $filename ) );
            else:  
                return;
            endif;
        }

        /**
        * Returns string time value.
        * 
        * @param string $post_id The post ID.
        * 
        */
        public static function display_post_time($post_id) { 
            $post_date = get_the_time('U', $post_id);
            $delta = time() - $post_date;
            
            if ( $delta < 60 ):
                echo 'tikko';
            else:
                echo the_time();
            endif;
        }
    }
?>