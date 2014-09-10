<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

  <head profile="<?php print $grddl_profile; ?>">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <!--[if lt IE 9]>
  <script type="text/javascript" src="<?php print base_path() . path_to_theme(); ?>/layout/plugins/html5.js"></script>
  <![endif]-->
    <?php print $styles; ?>
    
    <?php print $scripts; ?>
  </head>
  <?php
  if (!drupal_is_front_page()) {
   // $classes.= ' general_not_loaded';
  }
  ?>
  <body class="<?php print $classes; ?>" <?php print $attributes; ?>>
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>
