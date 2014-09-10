<?php
/**
 * @file
 * portfolio.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function portfolio_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'portfolio';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Portfolio';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['style_options']['class'] = 'slides';
  $handler->display->display_options['style_options']['wrapper_class'] = '';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Header: Global: Text area */
  $handler->display->display_options['header']['area']['id'] = 'area';
  $handler->display->display_options['header']['area']['table'] = 'views';
  $handler->display->display_options['header']['area']['field'] = 'area';
  $handler->display->display_options['header']['area']['content'] = '<h1><b>8 years of operation</b><br>250 projects implemented</h1>
  <h2>We create web productions for our clients and we promote the modernisation of web development all around world.</h2>';
  $handler->display->display_options['header']['area']['format'] = 'full_html';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Image - First image */
  $handler->display->display_options['fields']['field_image']['id'] = 'field_image';
  $handler->display->display_options['fields']['field_image']['table'] = 'field_data_field_image';
  $handler->display->display_options['fields']['field_image']['field'] = 'field_image';
  $handler->display->display_options['fields']['field_image']['ui_name'] = 'Image - First image';
  $handler->display->display_options['fields']['field_image']['label'] = '';
  $handler->display->display_options['fields']['field_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_image']['settings'] = array(
    'image_style' => 'portfolio_item',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_image']['delta_limit'] = '1';
  $handler->display->display_options['fields']['field_image']['delta_offset'] = '0';
  /* Field: Image URL */
  $handler->display->display_options['fields']['field_image_1']['id'] = 'field_image_1';
  $handler->display->display_options['fields']['field_image_1']['table'] = 'field_data_field_image';
  $handler->display->display_options['fields']['field_image_1']['field'] = 'field_image';
  $handler->display->display_options['fields']['field_image_1']['ui_name'] = 'Image URL';
  $handler->display->display_options['fields']['field_image_1']['label'] = '';
  $handler->display->display_options['fields']['field_image_1']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_image_1']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_image_1']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_image_1']['type'] = 'image_url';
  $handler->display->display_options['fields']['field_image_1']['settings'] = array(
    'url_type' => '1',
    'image_style' => '',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['field_image_1']['delta_limit'] = '1';
  $handler->display->display_options['fields']['field_image_1']['delta_offset'] = '0';
  /* Field: Content: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['exclude'] = TRUE;
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['date_format'] = 'medium';
  /* Field: Image portfolio item view */
  $handler->display->display_options['fields']['field_image_2']['id'] = 'field_image_2';
  $handler->display->display_options['fields']['field_image_2']['table'] = 'field_data_field_image';
  $handler->display->display_options['fields']['field_image_2']['field'] = 'field_image';
  $handler->display->display_options['fields']['field_image_2']['ui_name'] = 'Image portfolio item view';
  $handler->display->display_options['fields']['field_image_2']['label'] = '';
  $handler->display->display_options['fields']['field_image_2']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_image_2']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_image_2']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_image_2']['type'] = 'flexslider_format_php_image';
  $handler->display->display_options['fields']['field_image_2']['settings'] = array(
    'source_image_style' => 'portfolio_item',
    'destination_image_style' => '',
  );
  $handler->display->display_options['fields']['field_image_2']['delta_offset'] = '0';
  /* Field: Content: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['exclude'] = TRUE;
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = '';
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '<article>
  <div class="image">
    [field_image]
    <div class="hover">
      <ul class="icons">
        <li><a href="[field_image_1]" class="colorbox lnk_zoom_1" title="[title]"></a></li>
        <li><a href="#" class="lnk_link_1" data-rel="projectItem"></a></li>
      </ul>
    </div>
  </div>

  <div class="description">
    <h3><a href="#" data-rel="projectItem">[title]</a></h3>
    <div class="date">[created]</div>

  </div>

  <div class="project_item">
    [field_image_2]
    <div class="info">
      <div class="controls">
        <a href="#" class="projects_nav prev">Previous project</a>
        <a href="#" class="projects_nav next">Next project</a>
        <a href="#" class="project_close">Close project</a>
      </div>

      <div class="description">
        <h2>[title]</h2>
        [body]
      </div>
    </div>

    <div class="clearboth"></div>
  </div>
</article>';
  $handler->display->display_options['fields']['nothing']['element_type'] = '0';
  $handler->display->display_options['fields']['nothing']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['nothing']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['nothing']['element_default_classes'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'portfolio' => 'portfolio',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $export['portfolio'] = $view;

  return $export;
}
