<?php

function magnetto_form_system_theme_settings_alter(&$form, $form_state) {

  $path = drupal_get_path('theme', 'magnetto');

  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general'] = array(
      '#type' => 'fieldset',
      '#title' => t('General settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general']['homepage_title'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display homepage title'),
      '#default_value' => theme_get_setting('homepage_title'),
  );

  $form['settings']['general']['display_breadcrumb'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display breadcrumb'),
      '#default_value' => theme_get_setting('display_breadcrumb'),
  );

  $form['settings']['general']['display_frontpage_main_content'] = array(
      '#type' => 'checkbox',
      '#default_value' => theme_get_setting('display_frontpage_main_content'),
      '#title' => t('Display front page main content'),
      '#description' => t('Uncheck if you don\'t need show block Main content in front page, that you did setting <a href="!url">default front page</a> ', array('!url' => url('admin/config/system/site-information'))),
  );

  $form['settings']['general']['social_links'] = array(
      '#type' => 'textarea',
      '#title' => t('Social links HTML'),
      '#description' => t('Setup social links at footer'),
      '#default_value' => theme_get_setting('social_links'),
  );
  $form['settings']['maps'] = array(
      '#type' => 'fieldset',
      '#title' => t('Maps settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );
  $form['settings']['maps']['use_map'] = array(
      '#title' => t('Enable footer block maps'),
      '#type' => 'checkbox',
      '#default_value' => theme_get_setting('use_map'),
      '#description' => t('Check the checkbox if you would use footer block map.')
  );

  for ($i = 1; $i < 5; $i++) {
    $form['settings']['maps']['location_wrapper_' . $i] = array(
        '#type' => 'fieldset',
        '#title' => t('Contact adress') . ' ' . $i,
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['settings']['maps']['location_wrapper_' . $i]['location_' . $i] = array(
        '#type' => 'checkbox',
        '#title' => t('Use this address'),
        '#default_value' => theme_get_setting('location_' . $i),
        '#description' => t('check the checkbox if you would use this address as an office address on footer map block.')
    );

    $form['settings']['maps']['location_wrapper_' . $i]['location_' . $i . '_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Name'),
        '#default_value' => theme_get_setting('location_' . $i . '_title'),
    );
    $form['settings']['maps']['location_wrapper_' . $i]['location_' . $i . '_address'] = array(
        '#type' => 'textfield',
        '#title' => t('Office address'),
        '#default_value' => theme_get_setting('location_' . $i . '_address'),
    );
    $form['settings']['maps']['location_wrapper_' . $i]['location_' . $i . '_info'] = array(
        '#type' => 'textarea',
        '#title' => t('Office contact info'),
        '#default_value' => theme_get_setting('location_' . $i . '_info'),
    );
  }
}
