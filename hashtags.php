<?php

/* Turn off smart quotes so hashtag function works correctly */
 
remove_filter('the_content', 'wptexturize');
 
/* convert hashtags to clickable links */
 
add_filter( 'the_content', 'linked_hashtags' );
 
function linked_hashtags( $content ) {
    $content = preg_replace('/(?<!:|\s|&|"|\')(\s)#([^\s|^"|^\.<]+)/i', '<span class="hashtag">$1<a href="'.site_url().'?s=%23'.'$2">#$2</a></span>', $content);
 
  return $content;
}

?>