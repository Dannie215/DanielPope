<section id="blog_post" class="section <?php print $main_content_class_name; ?>">
  <div class="inside">
    <div class="inner">
      <?php if ($breadcrumb && theme_get_setting('display_breadcrumb')): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>

      <?php print $messages; ?>
      <?php if ($title): ?> <div id="block-page-title" class="block_title">
        <?php if (!drupal_is_front_page()): ?>
            <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php endif; ?>
          <?php if (drupal_is_front_page() && theme_get_setting('homepage_title')): ?>
            <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>

          <?php endif; ?>
          <?php if ($page['subtitle']): ?>
            <?php print render($page['subtitle']); ?>
          <?php endif; ?>
        </div>

      <?php endif; ?>

      <div class="main_content">
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>

        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>
      <?php if ($page['sidebar']): ?>
        <div class="sidebar">
          <?php print render($page['sidebar']); ?>
        </div>
      <?php endif; ?>

      <div class="clearboth"></div>
    </div>
  </div>
</section>