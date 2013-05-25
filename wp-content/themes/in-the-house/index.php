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

<div id="homemain">
	<!-- 	<a href="our-shows" id="lala"></a> -->

<!--  	<a id="home-logo" href="our-shows">

		<img src="<?php bloginfo('url') ?>/wp-content/uploads/2013/03/logo.png" />

		<?php

		$post_id_home = get_post(466);
		$content = $post_id_home->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		echo $content;

		?>
 
	</a> -->

	<?php
	$top = wp_get_nav_menu_items('Main Menu');
	$firstlink = $top[0]->url;
	?>


	<div id="home-logo">

		<a id="insideframe" href="<?php echo $firstlink ?>">

<!-- 			<p class="read-more"></p> -->

			<!-- 		<img src="<?php bloginfo('url') ?>/wp-content/uploads/2013/03/logo.png" /> -->

			<?php

			$post_id_home = get_post(466);
			$content = $post_id_home->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);

			echo $content;

			?>
		</a>

	</div>

	<!--	<div id="womanleft"></div> -->
<!-- 	<div id="nextshowplane"></div>
	<div tabindex="-1" class="slideDown"> -->

<div id="nextshowplane" tabindex="-1" class="slideDown">
		<div id="slideContent">

		<?php

			$post_id_feature = get_post(2644);  /* local 570 */
			$feature = $post_id_feature->post_content;
			$feature = apply_filters('the_content', $feature);
			$feature = str_replace(']]>', ']]>', $feature);

			echo $feature;

			?>

		</div>
<!-- 		<div class="flagwave"></div> -->
	</div>
	<div id="unicycle" class="homeperson"></div>
	<div id="manleft" class="homeperson"></div>
	<div id="womanmiddle" class="homeperson"></div>
	<div id="internationalright" class="homeperson"></div>

	<div id="post_menu">
		<div id="post"></div>
		<?php wp_nav_menu( array('depth' => 1 ));  ?>
		<!-- a id="sign-ourshows" href="our-shows"></a>
		<a id="sign-yourshows" href="your-shows"></a>
		<a id="sign-pastshows" href="past-shows"></a -->
	</div>

	<?php get_footer(); ?>

</div>


