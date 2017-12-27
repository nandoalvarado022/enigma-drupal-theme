<?php

function enma_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['#submit'][] = 'enma_settings_form_submit';


  // Get all themes.

  $themes = list_themes();

  // Get the current theme

  $active_theme = $GLOBALS['theme_key'];

  $form_state['build_info']['files'][] = str_replace("/$active_theme.info", '', $themes[$active_theme]->filename) . '/theme-settings.php';

  $theme_path = drupal_get_path('theme', 'enma');
  $form['settings'] = array(
      '#type' => 'vertical_tabs',
      '#title' => t('Theme settings'),
      '#weight' => 2,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#attached' => array(
          'css' => array(drupal_get_path('theme', 'enma') . '/css/drupalet_base/admin.css'),
          'js' => array(
            drupal_get_path('theme', 'enma') . '/js/drupalet_admin/admin.js',
          ),
      ),
  );

  $form['settings']['general_setting'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['general_setting']['general_setting_tracking_code'] = array(
      '#type' => 'textarea',
      '#title' => t('Tracking Code'),
      '#default_value' => theme_get_setting('general_setting_tracking_code', 'enma'),
  );

  $form['settings']['general_setting']['homepage_style'] = array(

      '#title' => t('Homepage style'),

      '#type' => 'select',

      '#options' => array(
        'multi' => t('Multi page'),
        'one' => t('One page'),
        ),

      '#default_value' => theme_get_setting('homepage_style', 'enma'),

  );

  $form['settings']['general_setting']['menu_style'] = array(

      '#title' => t('Menu style'),

      '#type' => 'select',

      '#options' => array(
        'menu1' => t('Multipage menu'),
        'menu2' => t('Onepage menu'),
        'menu3' => t('Mini menu'),
        ),

      '#default_value' => theme_get_setting('menu_style', 'enma'),

  );

  $form['settings']['general_setting']['body_font'] = array(

      '#title' => t('Body font'),

      '#type' => 'select',

      '#options' => array(
        'Pt Serif' => t('Pt Serif'),
        'Open Sans' => t('Open Sans'),
        'Montserrat' => t('Montserrat'),
        ),

      '#default_value' => theme_get_setting('body_font', 'enma'),

  );

  $form['settings']['general_setting']['map_icon'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Map icon '),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('map_icon','enma'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );


   $form['settings']['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

    $form['settings']['header']['header_style'] = array(

      '#title' => t('Header version'),

      '#type' => 'select',

      '#options' => array(
        'headerv1' => t('Header version 1'),
        'headerv2' => t('Header version 2'),
        'headerv3' => t('Header version 3'),
        'headerv4' => t('Header version 4'),
        'headerv5' => t('Header version 5'),
        'headerv6' => t('Header version 6'),
        ),

      '#default_value' => theme_get_setting('header_style', 'enma'),

  );



   $form['settings']['portfolio'] = array(
      '#type' => 'fieldset',
      '#title' => t('Portfolio settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

   $form['settings']['portfolio']['portfolio_style'] = array(

      '#title' => t('Portfolio style'),

      '#type' => 'select',

      '#options' => array(
        '2cols' => t('2 Columns'),
        '3cols' => t('3 Columns'),
        '4cols' => t('4 Columns'),
        ),

      '#default_value' => theme_get_setting('portfolio_style', 'enma'),

  );


   $form['settings']['blogs'] = array(
      '#type' => 'fieldset',
      '#title' => t('Blogs settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['blogs']['page_title_background'] = array(

    '#type'     => 'managed_file',

    '#title'    => t('Page title background '),

    '#required' => FALSE,

    '#upload_location' => 'public://background-icon/',

    '#default_value' => theme_get_setting('page_title_background','enma'),

    '#upload_validators' => array(

    'file_validate_extensions' => array('gif png jpg jpeg'),

    ),

  );



  $form['settings']['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );

  $form['settings']['footer']['footer_style'] = array(

      '#title' => t('Footer style'),

      '#type' => 'select',

      '#options' => array(
        'footer1' => t('Footer style 1'),
        'footer2' => t('Footer style 2'),
        ),

      '#default_value' => theme_get_setting('footer_style', 'enma'),

  );

  $form['settings']['footer']['footer_copyright_message'] = array(
      '#type' => 'textarea',
      '#title' => t('Footer copyright message'),
      '#default_value' => theme_get_setting('footer_copyright_message', 'enma'),
  );


	$form['settings']['custom_css'] = array(
		  '#type' => 'fieldset',
		  '#title' => t('Custom CSS'),
		  '#collapsible' => TRUE,
		  '#collapsed' => FALSE,
	  );

	$form['settings']['custom_css']['custom_css'] = array(
		  '#type' => 'textarea',
		  '#title' => t('Custom CSS'),
		  '#default_value' => theme_get_setting('custom_css', 'enma'),
		  '#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	  );

 

}

function enma_settings_form_submit(&$form, $form_state) {

  $image_fid = $form_state['values']['map_icon'];
  $image_fid2 = $form_state['values']['page_title_background'];

  $image1 = file_load($image_fid);
  $image2 = file_load($image_fid2);

  //$image2 = file_load($image_fid2);

  if (is_object($image1)) {

  // Check to make sure that the file is set to be permanent.

    if ($image1->status == 0) {

    // Update the status.

    $image1->status = FILE_STATUS_PERMANENT;

    // Save the update.

    file_save($image1);

    // Add a reference to prevent warnings.

    file_usage_add($image1, 'enma', 'theme', 1);

    }

  }

  if (is_object($image2)) {

  // Check to make sure that the file is set to be permanent.

    if ($image2->status == 0) {

    // Update the status.

    $image2->status = FILE_STATUS_PERMANENT;

    // Save the update.

    file_save($image2);

    // Add a reference to prevent warnings.

    file_usage_add($image2, 'enma', 'theme', 1);

    }

  }

}