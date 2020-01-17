<?php

/* Two ways to make hashtags clickable search links. Just add your preferred solution to functions.php
 *
 * The first makes the change when publishing the post so changes the actual post content.
 * The second leaves the post content untouched, performing the conversion when viewing




/* 1. Before saving the post */

function linked_hashtags( $content ) {
  $content = preg_replace('/((?<!&|\#|\)|\||\/|\[|[0-9]|[a-z]|=")#(?!\s|#|\*|\$|^[a-z]).*?)([^\s|^"|^\)|^\.<]+)/i', '<span class="hashtag"><a href="'.site_url().'?s=%23'.'$2">#$2</a></span>', $content);
  return $content;
}

add_filter( 'content_save_pre', 'linked_hashtags', 10, 1 );




/* 2. Only at display */

function linked_hashtags( $content ) {
  $content = preg_replace('/((?<!&|\#|\)|\||\/|\[|[0-9]|[a-z]|=")#(?!\s|#|\*|\$|^[a-z]).*?)([^\s|^"|^\)|^\.<]+)/i', '<span class="hashtag"><a href="'.site_url().'?s=%23'.'$2">#$2</a></span>', $content);
  return $content;
}

add_filter( 'the_content', 'linked_hashtags', 10, 1 );




/* Smart quotes may have to be disabled for the second option to work if the hashtag is enclosed in quote marks  */
 
remove_filter('the_content', 'wptexturize');

?>
