<div class="wrapper">
  <!-- HEADER BEGIN -->
  <header>
    <div id="header">
      <div class="inner">
        <div id="logo_top">
          <?php if ($logo): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <div id="name-and-slogan">
              <?php if ($site_name): ?>
                <?php if ($title): ?>
                  <div id="site-name"><strong>
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </strong></div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                  <h1 id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  </h1>
                <?php endif; ?>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <div id="site-slogan"><?php print $site_slogan; ?></div>
              <?php endif; ?>
            </div> <!-- /#name-and-slogan -->
          <?php endif; ?>
        </div>
		<?php if($page['language_switcher']):?>
			<div id="language-switcher-wrapper">
				<?php print render($page['language_switcher']); ?>
			</div>
		<?php endif; ?>
        <div class="main_menu">
          <nav>
            <?php if (!$page['main_navigation']): ?>
              <?php if ($main_menu || $secondary_menu): ?>
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => False)); ?>
                <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => False)); ?>
                <!-- /.section, /#navigation -->
              <?php endif; ?>
            <?php else: ?>
              <?php print render($page['main_navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- HEADER END -->


  <!-- CONTENT BEGIN -->
  <div id="content" class="">

    <?php if ($page['slider']): ?>
      <section id="home" class="section page">
        <div class="block_main_slider general_not_loaded">
          <?php print render($page['slider']); ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if ($page['section_services']): ?>
      <section id="services" class="section page">
        <div class="inside">
          <div class="inner">
            <?php print render($page['section_services']); ?>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php
    if ($page['section_parallax_1']): print render($page['section_parallax_1']);
    endif;
    ?>

    <?php if ($page['section_portfolio']): ?>
      <?php print render($page['section_portfolio']); ?>
    <?php endif; ?>

    <?php
    if ($page['section_parallax_2']): print render($page['section_parallax_2']);
    endif;
    ?>


    <?php if ($page['section_about']): ?>
      <section id="about" class="section page">
        <div class="inside">
          <div class="inner">
            <?php print render($page['section_about']); ?>
            <div class="shadow_1"></div>
            <div class="shadow_2"></div>

            <script type="text/javascript">
              jQuery(function() {
                init_team_slider_1('#team_slider_1');
              });
            </script>
          </div>
        </div>

    </div>
  </div>
  </section>
<?php endif; ?>

<?php if ($page['section_blog']): ?>
  <?php print render($page['section_blog']); ?>
<?php endif; ?>

<?php if ($page['section_clients']): ?>
  <section class="section" id="clients">
    <div class="inside">
      <div class="inner">
        <?php print render($page['section_clients']); ?>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php
if ($page['section_parallax_3']): print render($page['section_parallax_3']);
endif;
?>

<?php
if (drupal_is_front_page()) {
  if (theme_get_setting('display_frontpage_main_content')) {
    require 'main-content.tpl.php';
  }
} else {
  require 'main-content.tpl.php';
}
?>

<?php $use_map = theme_get_setting('use_map'); ?>
<section class="section" id="contacts">
  <div class="inside">
    <?php if ($use_map): ?>
      <div class="block_contacts_button">
        <a href="#" id="view_map" class="general_button type_3"><?php print t('View Map'); ?></a>
        <a href="#" id="view_contacts" class="general_button type_4"><?php print t('View'); ?> <span><?php print t('contacts'); ?></span></a>
      </div>
    <?php endif; ?>
    <div class="block_contacts">
      <div class="inner">
        <?php if ($use_map): ?>
          <div class="column">
            <div class="info">
              <h2 id="map_locations">
                <?php
                $m_html = '';
                for ($i = 1; $i < 5; $i++) {
                  $m_location = theme_get_setting('location_' . $i);
                  $m_title = theme_get_setting('location_' . $i . '_title');
                  $m_address = theme_get_setting('location_' . $i . '_address');
                  $m_info = theme_get_setting('location_' . $i . '_info');
                  if ($m_location) {
                    if ($i == 1) {
                      $_current = 'class="current" ';
                    }

                    $m_html.= '<a href="#" ' . $_current . 'data-address="' . $m_address . '" data-name="' . $m_address . '">' . $m_title . '</a>';
                  }
                }
                print $m_html;
                ?>
              </h2>

              <div class="location">
                <div class="addresses">

                  <?php
                  $m_html_1 = '';
                  for ($i = 1; $i < 5; $i++) {

                    if (theme_get_setting('location_' . $i)) {
                      $m_info = theme_get_setting('location_' . $i . '_info');
                      if (!empty($m_info)) {
                        if ($i == 1) {
                          $m_html_1 .= '<div class="current">';
                        } else {
                          $m_html_1 .= '<div>';
                        }
                        $m_html_1 .= $m_info . "\n";
                        $m_html_1 .= '</div>';
                      }
                    }
                  }
                  print $m_html_1;
                  ?>
                </div>
                <?php $social_links = theme_get_setting('social_links'); ?>
                <?php if ($social_links): ?>
                  <div class="social">
                    <?php print $social_links; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($page['footer_contact_form']): ?>
          <div class="column">
            <div class="form">
              <?php print render($page['footer_contact_form']); ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="clearboth"></div>
      </div>
    </div>

    <?php if ($use_map): ?>
      <div class="block_map">
        
        <div id="map"></div>
      </div>
    <?php endif; ?>
  </div>
</section>




</div>
<!-- CONTENT END -->

<!-- FOOTER BEGIN -->
<footer>
  <div id="footer">
    <div class="inner">
      <div class="block_copyrights">
        <?php print render($page['footer']); ?>
      </div>
      <div class="block_button_up"><a href="#" id="button_up"><?php print t('UP'); ?></a></div>

      <div class="clearboth"></div>
    </div>
  </div>
</footer>
<!-- FOOTER END -->
</div>