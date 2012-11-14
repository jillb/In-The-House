<?php

/*
 * @template  Mystique
 * @revised   December 20, 2011
 * @author    digitalnature, http://digitalnature.eu
 * @license   GPL, http://www.opensource.org/licenses/gpl-license
 */

// The "page" post type.
// pagename.php, page-slug.php, page-id.php or page-custom_template can override it.

?>

<?php atom()->template('header'); ?>

<!-- main content: primary + sidebar(s) -->
<div id="mask-3" class="clear-block">
  <div id="mask-2">
    <div id="mask-1">

      <!-- primary content -->
      <div id="primary-content">
        <div class="blocks clear-block">

          <?php atom()->action('before_primary'); ?>

          <?php the_post(); ?>

          <?php atom()->action('before_post'); ?>

          <!-- page content -->
          <div id="post-<?php the_ID(); ?>" <?php post_class('primary'); ?>>

            <?php if(!atom()->post->getMeta('hide_title')): ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <?php endif; ?>

            <a id="codecision_btn" href="#">Email this page to co-decision-maker</a>

            <?php if(get_field('production_image_1')) { ?>
               <img src="<?php the_field('production_image_1'); ?>" class="right" />
            <?php }?>


            <?php if(get_field('production_image_1')) { ?>
               <img src="<?php the_field('production_image_2'); ?>" class="right" />
            <?php }?>


            <?php if(get_field('production_image_3')) { ?>
               <img src="<?php the_field('production_image_3'); ?>" class="right" />
            <?php }?>

            <span class="field-label">Description:</span>
            <span class="field-item"><?php echo get_field('production_description'); ?></span>

            <?php if(get_field('video_embed_code1')) { ?>
              <span class="field-item"><?php echo get_field('video_embed_code1'); ?></span>
            <?php }?>

            <?php if(get_field('video_embed_code2')) { ?>
              <span class="field-item"><?php echo get_field('video_embed_code2'); ?></span>
            <?php }?>

            <?php if(get_field('video_embed_code3')) { ?>
              <span class="field-item"><?php echo get_field('video_embed_code3'); ?></span>
            <?php }?>

            <span class="field-label">Requirements:</span>
            <ul>
             <?php if(get_field('kitchen_required')) { ?>
                <li>Requires use of a kitchen.</li>
             <?php }?>
             <?php if(get_field('number_of_rooms')) { ?>
                <li><span class="field-label">Rooms: </span><?php echo get_field('number_of_rooms'); ?></li>
             <?php }?>
             <?php if(get_field('rehearsal')) { ?>
                <li>We need to have a rehearsal in the space in advance.</li>
             <?php }?>
             <?php if(get_field('custom_field1')) { ?>
                <li><?php echo get_field('custom_field1'); ?></li>
             <?php }?>
             <?php if(get_field('custom_field2')) { ?>
                <li><?php echo get_field('custom_field2'); ?></li>
             <?php }?>
             <?php if(get_field('custom_field3')) { ?>
                <li><?php echo get_field('custom_field3'); ?></li>
             <?php }?>
             <?php if(get_field('custom_field4')) { ?>
                <li><?php echo get_field('custom_field4'); ?></li>
             <?php }?>
             <?php if(get_field('custom_field5')) { ?>
                <li><?php echo get_field('custom_field5'); ?></li>
             <?php }?>

             </ul>

             <a id="contact_home_btn" href="#">Contact Myriam for a conversation in person</a>

             <a id="codecision_btn" href="#">Email this page to co-decision-maker</a>

             <a id="createown_btn" href="#">Create Own Like This Or Different!</a>

            <div class="clear-block">
              <?php the_content(); ?>
            </div>

            <?php atom()->post->pagination(); ?>

            <?php atom()->controls('post-edit'); ?>
          </div>
          <!-- /page content -->

          <?php atom()->action('after_post'); ?>

          <?php atom()->template('meta'); ?>

          <?php atom()->action('after_primary'); ?>

        </div>
      </div>
      <!-- /primary content -->

      <?php atom()->template('sidebar'); ?>

    </div>
  </div>
</div>
<!-- /main content -->

<?php atom()->template('footer'); ?>
