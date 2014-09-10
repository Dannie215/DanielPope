<?php

function magnetto_preprocess_html(&$variables) {

  drupal_add_html_head(
          array(
      '#tag' => 'meta',
      '#attributes' => array(
          'name' => 'viewport',
          'content' => 'width=device-width, initial-scale=1',
      ),
          ), 'astrum:viewport_meta'
  );
}

function magnetto_preprocess_page(&$variables) {

  /*
    if (!module_exists('jquery_update')) {
    drupal_set_message(t('Jquery update is required, <a target="_blank" href="!url">Download it</a>,  install and switch jquery to version 1.7', array('!url' => 'http://drupal.org/project/jquery_update')), 'warning');
    } else {
    $set_jquery_update = variable_get('set_jquery_update', FALSE);
    if (!$set_jquery_update) {
    variable_set('jquery_update_jquery_version', '1.7');
    variable_set('set_jquery_update', '1.7');
    }
    }
   */


  $page = $variables['page'];
  $variables['main_content_class_name'] = 'page';
  if ($page['sidebar']) {
    $variables['main_content_class_name'] = 'right_sidebar';
  }
}

function magnetto_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<div class="block_tabs_type_1"><div class="tabs"><ul class="primary">';
    $variables['primary']['#suffix'] = '</ul></div></div>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="nav nav-pills secondary">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

function magnetto_status_messages(&$variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
      'status' => t('Status message'),
      'error' => t('Error message'),
      'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $m_class = $type;
    if ($type == 'status') {
      $m_class = 'success';
    }
    $output .= "<div class=\"messages general_info_box $m_class\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<a class="close" href="#">Close</a><h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    } else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

function magnetto_format_comma_field($field_category, $node, $limit = NULL) {

  if (module_exists('i18n_taxonomy')) {
    $language = i18n_language();
  }

  $category_arr = array();
  $category = '';
  $field = field_get_items('node', $node, $field_category);

  if (!empty($field)) {
    foreach ($field as $item) {
      $term = taxonomy_term_load($item['tid']);


      if ($term) {
        if (module_exists('i18n_taxonomy')) {
          $term_name = i18n_taxonomy_term_name($term, $language->language);

// $term_desc = tagclouds_i18n_taxonomy_term_description($term, $language->language);
        } else {
          $term_name = $term->name;
//$term_desc = $term->description;
        }

        $category_arr[] = l($term_name, 'taxonomy/term/' . $item['tid']);
      }

      if ($limit) {
        if (count($category_arr) == $limit) {
          $category = implode(', ', $category_arr);
          return $category;
        }
      }
    }
  }
  $category = implode(', ', $category_arr);

  return $category;
}

function magnetto_preprocess_node(&$variables) {
  $variables['view_mode'] = $variables['elements']['#view_mode'];
// Provide a distinct $teaser boolean.
  $variables['teaser'] = $variables['view_mode'] == 'teaser';
  $variables['node'] = $variables['elements']['#node'];
  $node = $variables['node'];

  $variables['date'] = format_date($node->created);
  $variables['name'] = theme('username', array('account' => $node));

  $uri = entity_uri('node', $node);
  $variables['node_url'] = url($uri['path'], $uri['options']);
  $variables['title'] = check_plain($node->title);
  $variables['page'] = $variables['view_mode'] == 'full' && node_is_page($node);

// Flatten the node object's member fields.
  $variables = array_merge((array) $node, $variables);

// Helpful $content variable for templates.
  $variables += array('content' => array());
  foreach (element_children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }

// Make the field variables available with the appropriate language.
  field_attach_preprocess('node', $node, $variables['content'], $variables);

// Display post information only on certain node types.
  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $variables['display_submitted'] = TRUE;
    $submitted = $variables['date'];
    
    if (!empty($variables['view_mode']) && ($variables['view_mode'] !== 'teaser')) {
      $submitted .= '<span class="info_separator">/</span>';
      $submitted.= '<span class="author">' . t('Posted by') . ' ' . $variables['name'] . ' </span>';
    }

    if (!empty($node->comment_count)) {
      $submitted .= '<span class="info_separator">/</span>';
      $submitted .= $node->comment_count . ' ' . t('Comments');
    }

    $variables['submitted'] = $submitted; //t('Submitted by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
    $variables['user_picture'] = theme_get_setting('toggle_node_user_picture') ? theme('user_picture', array('account' => $node)) : '';
  } else {
    $variables['display_submitted'] = FALSE;
    $variables['submitted'] = '';
    $variables['user_picture'] = '';
  }

// Gather node classes.
  $variables['classes_array'][] = drupal_html_class('node-' . $node->type);
  if ($variables['promote']) {
    $variables['classes_array'][] = 'node-promoted';
  }
  if ($variables['sticky']) {
    $variables['classes_array'][] = 'node-sticky';
  }
  if (!$variables['status']) {
    $variables['classes_array'][] = 'node-unpublished';
  }
  if ($variables['teaser']) {
    $variables['classes_array'][] = 'node-teaser';
  }
  if (isset($variables['preview'])) {
    $variables['classes_array'][] = 'node-preview';
  }

// Clean up name so there are no underscores.
  $variables['theme_hook_suggestions'][] = 'node__' . $node->type;
  $variables['theme_hook_suggestions'][] = 'node__' . $node->nid;

  // Add css class "node--NODETYPE--VIEWMODE" to nodes
  $variables['classes_array'][] = 'node--' . $variables['type'] . '--' . $variables['view_mode'];
  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes
  $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__' . $variables['view_mode'];
}

function _process_format_video($url, $height = 193) {
  $id = '';
  if ((strpos($url, 'youtube.com') !== FALSE) || (strpos($url, 'youtu.be') !== FALSE)) {
    $id = _get_youtube($url, $height);
  } else {
    $id = _get_vimeo($url, $height);
  }

  return $id;
}

function _get_vimeo($url, $v_heigh) {
  $html = '<div class="video">';
  $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
  preg_match($pattern, $url, $matches);
  if (count($matches)) {
    $id = $matches[2];

    $html .= '<iframe width="100%" height="' . $v_heigh . '" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="http://player.vimeo.com/video/' . $id . '"></iframe>';
  }
  $html .='</div>';
  return $html;
}

function _get_youtube($url, $v_heigh) {
  //youtube theme process.
  $html = '<div class="video">';
  preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
  //dsm($matches);
  if (!empty($matches[1])) {
    $id = $matches[1];
    $html .= '<iframe width="100%" height="' . $v_heigh . '" src="http://youtube.com/embed/' . $id . '" frameborder="0" allowfullscreen></iframe>';
  }

  $html .= '</div>';
  return $html;
}

/**
 * Theme function to allow any menu tree to be themed as a Superfish menu.
 */
function magnetto_superfish($variables) {
  global $user, $language;

  $id = $variables['id'];
  $menu_name = $variables['menu_name'];
  $mlid = $variables['mlid'];
  $sfsettings = $variables['sfsettings'];

  $menu = menu_tree_all_data($menu_name);

  if (function_exists('i18n_menu_localize_tree')) {
    $menu = i18n_menu_localize_tree($menu);
  }

  // For custom $menus and menus built all the way from the top-level we
  // don't need to "create" the specific sub-menu and we need to get the title
  // from the $menu_name since there is no "parent item" array.
  // Create the specific menu if we have a mlid.
  if (!empty($mlid)) {
    // Load the parent menu item.
    $item = menu_link_load($mlid);
    $title = check_plain($item['title']);
    $parent_depth = $item['depth'];
    // Narrow down the full menu to the specific sub-tree we need.
    for ($p = 1; $p < 10; $p++) {
      if ($sub_mlid = $item["p$p"]) {
        $subitem = menu_link_load($sub_mlid);
        $key = (50000 + $subitem['weight']) . ' ' . $subitem['title'] . ' ' . $subitem['mlid'];
        $menu = (isset($menu[$key]['below'])) ? $menu[$key]['below'] : $menu;
      }
    }
  }
  else {
    $result = db_query("SELECT title FROM {menu_custom} WHERE menu_name = :a", array(':a' => $menu_name))->fetchField();
    $title = check_plain($result);
  }

  $output['content'] = '';
  $output['subject'] = $title;
  if ($menu) {
    // Set the total menu depth counting from this parent if we need it.
    $depth = $sfsettings['depth'];
    $depth = ($sfsettings['depth'] > 0 && isset($parent_depth)) ? $parent_depth + $depth : $depth;

    $var = array(
      'id' => $id,
      'menu' => $menu,
      'depth' => $depth,
      'trail' => superfish_build_page_trail(menu_tree_page_data($menu_name)),
      'sfsettings' => $sfsettings
    );
    if ($menu_tree = theme('superfish_build', $var)) {
      if ($menu_tree['content']) {
        // Add custom HTML codes around the main menu.
        if ($sfsettings['wrapmul'] && strpos($sfsettings['wrapmul'], ',') !== FALSE) {
          $wmul = explode(',', $sfsettings['wrapmul']);
          // In case you just wanted to add something after the element.
          if (drupal_substr($sfsettings['wrapmul'], 0) == ',') {
            array_unshift($wmul, '');
          }
        }
        else {
          $wmul = array();
        }
        $output['content'] = isset($wmul[0]) ? $wmul[0] : '';
        $output['content'] .= '<ul id="main-menu"'; //'<ul id="superfish-' . $id . '"';
        $output['content'] .= ' class="menu sf-menu sf-' . $menu_name . ' sf-' . $sfsettings['type'] . ' sf-style-' . $sfsettings['style'];
        $output['content'] .= ($sfsettings['itemcounter']) ? ' sf-total-items-' . $menu_tree['total_children'] : '';
        $output['content'] .= ($sfsettings['itemcounter']) ? ' sf-parent-items-' . $menu_tree['parent_children'] : '';
        $output['content'] .= ($sfsettings['itemcounter']) ? ' sf-single-items-' . $menu_tree['single_children'] : '';
        $output['content'] .= ($sfsettings['ulclass']) ? ' ' . $sfsettings['ulclass'] : '';
        $output['content'] .= ($language->direction == 1) ? ' rtl' : '';
        $output['content'] .= '">' . $menu_tree['content'] . '</ul>';
        $output['content'] .= isset($wmul[1]) ? $wmul[1] : '';
      }
    }
  }
  return $output;
}