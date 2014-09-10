<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php print $list_type_prefix; ?>
<?php
$html = '';
if (!empty($rows)) {

  for ($i = 0; $i < count($rows); $i = $i + 2) {
    $html .= '<li class="' . $classes_array[$i] . '">';
    $html .= $rows[$i];
    $html .= $rows[$i + 1];
    $html .= "</li> \n";
    // $i = $i + 2;
  }
}
?>
<?php print $html; ?>
<?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
