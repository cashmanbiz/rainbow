<?php
global $smof_data;
$rss = $smof_data['pkb_sm_rss'];
$email = $smof_data['pkb_sm_email'];
$facebook = $smof_data['pkb_sm_facebook'];
$flickr = $smof_data['pkb_sm_flickr'];
$twitter = $smof_data['pkb_sm_twitter'];
$vimeo = $smof_data['pkb_sm_vimeo'];
$youtube = $smof_data['pkb_sm_youtube'];
$gplus = $smof_data['pkb_sm_gplus'];
$skype = $smof_data['pkb_sm_skype'];
$linkedin = $smof_data['pkb_sm_linkedin'];
$pinterest = $smof_data['pkb_sm_pinterest'];
$instagram = $smof_data['pkb_sm_instagram'];
$tumblr = $smof_data['pkb_sm_tumblr'];
$foursquare = $smof_data['pkb_sm_foursquare'];


// if ( $rss || $email || $facebook || $flickr || $twitter || $vimeo || $youtube || $gplus || $skype || $linkedin || $pinterest != '' ) {

echo '<ul class="inline-block right hide-for-small social_icons_header">';
echo '<li class="divider"></li>';

if ($rss != '') {
    ?>
    <li><a href="<?php echo $rss; ?>" target="_blank"><i class="elusive-rss"></i></a></li>
<?php
};
if ($email != '') {
    ?>
    <li><a href="mailto:<?php echo $email; ?>" target="_blank"><i class="elusive-mail"></i></a></li>
<?php
}
if ($facebook != '') {
    ?>
    <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="elusive-facebook"></i></a></li>
<?php
}
if ($flickr != '') {
    ?>
    <li><a href="<?php echo $flickr; ?>" target="_blank"><i class="elusive-flickr"></i></a></li>
<?php
}
if ($twitter != '') {
    ?>
    <li><a href="<?php echo $twitter; ?>" target="_blank"><i class="elusive-twitter"></i></a></li>
<?php
}
if ($vimeo != '') {
    ?>
    <li><a href="<?php echo $vimeo; ?>" target="_blank"><i class="elusive-vimeo"></i></a></li>
<?php
}
if ($youtube != '') {
    ?>
    <li><a href="<?php echo $youtube; ?>" target="_blank"><i class="elusive-youtube"></i></a></li>
<?php
}
if ($gplus != '') {
    ?>
    <li><a href="<?php echo $gplus; ?>" target="_blank"><i class="elusive-googleplus"></i></a></li>
<?php
}
if ($skype != '') {
    ?>
    <li><a href="<?php echo $skype; ?>" target="_blank"><i class="elusive-skype"></i></a></li>
<?php
}
if ($linkedin != '') {
    ?>
    <li><a href="<?php echo $linkedin; ?>" target="_blank"><i class="elusive-linkedin"></i></a></li>
<?php
}
if ($pinterest != '') {
    ?>
    <li><a href="<?php echo $pinterest; ?>" target="_blank"><i class="elusive-pinterest"></i></a></li>
<?php
}
if ($instagram != '') {
    ?>
    <li><a href="<?php echo $instagram; ?>" target="_blank"><i class="elusive-instagram"></i></a></li>
<?php
}
if ($tumblr != '') {
    ?>
    <li><a href="<?php echo $tumblr; ?>" target="_blank"><i class="elusive-tumblr"></i></a></li>
<?php
}
if ($foursquare != '') {
    ?>
    <li><a href="<?php echo $foursquare; ?>" target="_blank"><i class="elusive-foursquare"></i></a></li>
<?php
}
echo '</ul>';

// };

?>