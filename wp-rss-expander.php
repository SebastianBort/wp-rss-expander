<?php    
/*
Plugin Name: Rozszerzenie kanału RSS Feed
Description: Dodaje nowe pola do kanału RSS Feed, m.in. z obrazkiem wyróżniającym wpisu oraz ilością komentarzy.
Version: 1.0.0
Author: Sebastian Bort
*/

class WP_Rss_Expander {

        public function __construct() {
               
               add_action('rss2_item', [$this, 'append_fields']);
        }
        
        public function append_fields() {  
            
              $post_id = get_the_ID();      
              $fields = [
                    'image' => get_the_post_thumbnail_url($post_id, 'medium'),
                    'comments_count' => (int) get_post_meta($post_id, 'comments_count', true),
              ];
              
              foreach($fields AS $xml_field => $value) {
                    echo '<'.$xml_field.'>' . $value . '</'.$xml_field.'>' . PHP_EOL;   
              } 
        }         
}
new WP_Rss_Expander();


 
?>