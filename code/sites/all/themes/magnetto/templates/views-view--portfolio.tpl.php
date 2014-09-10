<?php
/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<section id="projects" class="section page">
  <div class="inside scroll_animated_item" data-scroll-animation="fadeIn">

    <div class="<?php print $classes; ?>">
      <div class="inner">
        <div class="block_title">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <?php print $title; ?>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($header): ?>
            <div class="view-header">
              <?php print $header; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div id="project_item" class="block_project_item type_1">
        <div class="inner">

        </div>
      </div>



      <?php if ($exposed): ?>
        <div class="view-filters">
          <?php print $exposed; ?>
        </div>
      <?php endif; ?>

      <?php if ($attachment_before): ?>
        <div class="attachment attachment-before">
          <?php print $attachment_before; ?>
        </div>
      <?php endif; ?>

      <?php if ($rows): ?>


        <div class="inner">
          <div class="block_projects_slider_1 projects_container general_not_loaded">
            <div id="projects_slider_1" class="flexslider">
              <?php print $rows; ?>
            </div>
            <script type="text/javascript">

  // init portfolio slideshow block
              (function($) {
                // All your code here
                $(document).ready(function() {
                  $('#projects_slider_1 article .project_item .flexslider .slides').removeClass('slides');
                  init_portfolio_slider_1('#projects_slider_1');
                });
              })(jQuery);
            </script>

          </div>
        </div>

      <?php elseif ($empty): ?>
        <div class="view-empty">
          <?php print $empty; ?>
        </div>
      <?php endif; ?>

      <?php if ($pager): ?>
        <?php print $pager; ?>
      <?php endif; ?>

      <?php if ($attachment_after): ?>
        <div class="attachment attachment-after">
          <?php print $attachment_after; ?>
        </div>
      <?php endif; ?>

      <?php if ($more): ?>
        <?php print $more; ?>
      <?php endif; ?>

      <?php if ($footer): ?>
        <div class="view-footer">
          <?php print $footer; ?>
        </div>
      <?php endif; ?>

      <?php if ($feed_icon): ?>
        <div class="feed-icon">
          <?php print $feed_icon; ?>
        </div>
      <?php endif; ?>

    </div><?php /* class view */ ?>
  </div>
</section>

