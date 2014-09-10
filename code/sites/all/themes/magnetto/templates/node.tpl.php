
<div id="node-<?php print $node->nid; ?>" class="block_blog_post <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2 class="node-title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($node->type == 'blog' && $page): ?>
    <div class="title">
      <h1><?php print $title; ?></h1>
    </div>
  <?php endif; ?>
  <?php if ($display_submitted): ?>
    <div class="info submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
    ?>
    <?php if (!$page): ?>
      <div class="button"><a class="general_button type_5" href="<?php print $node_url; ?>"><?php print t('Read more'); ?></a></div>
    <?php endif; ?>
    <?php
    if ($page) {
      print render($content['links']);
    }
    ?>
  </div>

  <?php if ($page && $node->type == 'blog'): ?>
    <?php $node_full_url = url('node/' . $node->nid, array('absolute' => TRUE)); ?>
    <div class="share">
      <div class="text"><?php print t('Share this post'); ?></div>
      <div class="social">
        <ul class="general_social_1">
          <li><a title="Facebook" class="social_1" href="http://www.facebook.com/sharer.php?u=<?php print $node_full_url; ?>&amp;t=<?php print $node->title; ?>">Facebook</a></li>
          <li><a title="Twitter" class="social_2" href="http://twitter.com/home?status=<?php print $node->title; ?> <?php print $node_full_url; ?>">Twitter</a></li>
          <li><a title="Google Plus" class="social_3" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php print $node_full_url; ?>&amp;title=<?php print $node->title; ?>">Google Plus</a></li>
          <li><a class="social_4" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $node_full_url; ?>&amp;title=<?php print $node->title; ?>&amp;source=<?php print url(); ?>">LinkedIn</a></li>
          <li><a data-pin-config="above" data-pin-do="buttonPin" title="Pinterest" class="social_5" href="//pinterest.com/pin/create/button/?url=<?php print $node_full_url; ?>&amp;description=<?php print $node->title; ?>">Pinterest</a></li>									
        </ul>
      </div>

      <div class="clearboth"></div>
    </div>
  <?php endif; ?>
</div>

<?php print render($content['comments']); ?>