<div id="node-<?php print $node->nid; ?>" class="node node-teaser"<?php print $attributes; ?>>
<?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="content">
    <div class="featured_content">
      <?php if (!empty($content['field_video'])): ?>
        <?php print render($content['field_video']); ?>
      <?php endif; ?>

      <?php if (!empty($content['field_audio'])): ?>
        <?php print render($content['field_audio']); ?>
      <?php endif; ?>
      <?php if (!empty($content['field_image'])): ?>
        <?php print render($content['field_image']); ?>
      <?php endif; ?>
    </div>
    <div class="description">
      <h3><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h3>
      <?php if ($display_submitted): ?>
        <div class="info submitted">
          <?php print $submitted; ?>
        </div>
      <?php endif; ?>
      <div class="text">
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content);
        ?>
      </div>
      <div class="button"><a href="<?php print $node_url; ?>" class="general_button type_5"><?php print t('Read more'); ?></a></div>
    </div>
  </div>
</div>