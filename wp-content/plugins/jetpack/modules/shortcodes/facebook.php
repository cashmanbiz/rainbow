<?php
/**
 * Facebook embeds
 */

define( 'JETPACK_FACEBOOK_EMBED_REGEX', '#^https?://(www.)?facebook\.com/([^/]+)/(posts|photos)/([^/]+)?#' );
define( 'JETPACK_FACEBOOK_ALTERNATE_EMBED_REGEX', '#^https?://(www.)?facebook\.com/permalink.php\?([^\s]+)#' );
define( 'JETPACK_FACEBOOK_PHOTO_EMBED_REGEX', '#^https?://(www.)?facebook\.com/photo.php\?([^\s]+)#' );
define( 'JETPACK_FACEBOOK_PHOTO_ALTERNATE_EMBED_REGEX', '#^https?://(www.)?facebook\.com/([^/]+)/photos/([^/]+)?#' );
define( 'JETPACK_FACEBOOK_VIDEO_EMBED_REGEX', '#^https?://(www.)?facebook\.com/video.php\?([^\s]+)#' );
define( 'JETPACK_FACEBOOK_VIDEO_ALTERNATE_EMBED_REGEX', '#^https?://(www.)?facebook\.com/([^/]+)/videos/([^/]+)?#' );


// Example URL: https://www.facebook.com/VenusWilliams/posts/10151647007373076
wp_embed_register_handler( 'facebook', JETPACK_FACEBOOK_EMBED_REGEX, 'jetpack_facebook_embed_handler' );

// Example URL: https://www.facebook.com/permalink.php?id=222622504529111&story_fbid=559431180743788
wp_embed_register_handler( 'facebook-alternate', JETPACK_FACEBOOK_ALTERNATE_EMBED_REGEX, 'jetpack_facebook_embed_handler' );

// Photos are handled on a different endpoint; e.g. https://www.facebook.com/photo.php?fbid=10151609960150073&set=a.398410140072.163165.106666030072&type=1
wp_embed_register_handler( 'facebook-photo', JETPACK_FACEBOOK_PHOTO_EMBED_REGEX, 'jetpack_facebook_embed_handler' );

// Photos (from pages for example) can be 