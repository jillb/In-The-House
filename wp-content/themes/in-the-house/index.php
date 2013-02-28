<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package In The House
 * @since In The House 1.0
 */

get_header(); ?>

<a id="home-logo" href="our-shows">

<?php

$post_id_home = get_post(466);
$content = $post_id_home->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;

?>

</a>

<div id="womanleft"></div>
<div id="manleft"></div>
<div id="womanmiddle"></div>
<div id="manright"></div>

<div id="post_menu">
	<div id="post"></div>
	<?php wp_nav_menu( array('depth' => 1 ));  ?>
 	<a id="sign-ourshows" href="our-shows"></a>
</div>


<?php get_footer(); ?>