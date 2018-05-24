<?php
/**
 * Auto Group Pictures
 *
 * @author Julien Gargot <julien@g-u-i.me>
 * @version 1.0.0
 */
kirbytext::$pre[] = function($kirbytext, $text) {
  $text = preg_replace_callback('!(\(image:([^\)]+)\)\n{0,1})+!is', function($matches) use($kirbytext) {
    $html = $matches[0];
    $images = preg_match_all('/\(image:([^\)]+)\)/i', $html);
    if ( $images > 0 ) {
      return '<div class="' . c::get('gallery.container', 'gallery') . '" data-count-images="' . $images . '">' . $html . '</div>';
    } else {
      return $html;
    }
  }, $text);
  return $text;
};
