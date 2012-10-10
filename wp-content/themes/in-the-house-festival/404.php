<?php

/*
 * @template  Mystique
 * @revised   December 20, 2011
 * @author    digitalnature, http://digitalnature.eu
 * @license   GPL, http://www.opensource.org/licenses/gpl-license
 */

// 404 page.
// This template is used as a placeholder for pages that don't exist on your site.

?>

<?php atom()->template('header'); ?>

  <!-- main content: primary + sidebar(s) -->
  <div id="mask-3" class="clear-block">
    <div id="mask-2">
      <div id="mask-1">

        <!-- primary content -->
        <div id="primary-content">
          <div class="blocks clear-block">

                    <h1 class="title">Oops! I couldn't find that page</h1>
        <p>I'm very sorry, but the page you requested has not been found. It may have been moved or deleted.</p> 
        <p>Just to be sure, double-check the address in the address bar. There could be a typo.</p> 
        <p>Try searching our website for the content you were looking for:</p> 
          <?php get_search_form(); ?> 
          <p>Or maybe you were looking for one of our popular pages:</p> 
          <ul> 
              <li><a href="../page1">Popular Page 1</a></li> 
              <li><a href="../page2">Popular Page 2</a></li> 
              <li><a href="../page3">Popular Page 3</a></li> 
          </ul> 

          </div>
        </div>
        <!-- /primary content -->

      </div>
    </div>
  </div>
  <!-- /main content -->

<?php atom()->template('footer'); ?>