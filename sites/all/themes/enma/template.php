<?php
global $base_url;

function enma_preprocess_html(&$variables) {
	//-- Google web fonts -->
	drupal_add_css('http://fonts.googleapis.com/css?family=Montserrat:400,700', array('type' => 'external'));
	drupal_add_css('http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic', array('type' => 'external'));
	drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic', array('type' => 'external'));
	drupal_add_js('http://maps.google.com/maps/api/js?sensor=false', array('type' => 'external'));

	if (arg(0) == 'node' && is_numeric(arg(1))) {

      $node = entity_load_unchanged('node', arg(1));

      if (isset($node ->field_menu_style['und'][0]['value']) && $node ->field_menu_style['und'][0]['value']) {

        $variables['menu_style'] = $node ->field_menu_style['und'][0]['value'];

      }

      if (isset($node ->field_body_font['und'][0]['value']) && $node ->field_body_font['und'][0]['value']) {

        $variables['body_font'] = $node ->field_body_font['und'][0]['value'];

      }

    }

}

// Add css Menu skin
//$menu_skin = theme_get_setting('built_in_skins', 'enma');
// if(!empty($setting_skin)){
// 	$skin_color = '/css/colors/'.$setting_skin;
// }else{
// 	$skin_color = '/css/colors/1.css';
// }

// Add css skin
$setting_skin = theme_get_setting('built_in_skins', 'enma');
if(!empty($setting_skin)){
	$skin_color = '/css/colors/'.$setting_skin;
}else{
	$skin_color = '/css/colors/default.css';
}
$css_skin = array(
	'#tag' => 'link', // The #tag is the html tag - <link />
	'#attributes' => array( // Set up an array of attributes inside the tag
	'href' => $base_url.'/'.path_to_theme().$skin_color,
	'rel' => 'stylesheet',
	'type' => 'text/css',
	'id' => 'site-color',
	'data-baseurl'=>$base_url.'/'.path_to_theme()
	),
	'#weight' => 4,
);
//drupal_add_html_head($css_skin, 'skin');


function enma_form_comment_form_alter(&$form, &$form_state) {
	$form['comment_body']['#after_build'][] = 'enma_customize_comment_form';
  	$form['your_comment']['subject'] = $form['subject'];
  	unset($form['subject']);
  	$form['your_comment']['subject']['#access'] = FALSE;
  	//Comment
  	$form['your_comment']['comment_body'] = $form['comment_body'];
  	unset($form['comment_body']);
  	$form['author']['name']['#title'] = 'Name';
  	$form['author']['mail']['#title'] = 'Mail';
  	$form['author']['mail']['#description'] = FALSE;
  	$form['author']['mail']['#access'] = TRUE;
  	$form['author']['homepage']['#title'] = 'Website';
  	$form['author']['homepage']['#access'] = TRUE;
  	$form['author']['mail']['#required'] = TRUE;
  	$form['author']['name']['#required'] = TRUE;
  	$form['actions']['submit']['#value'] = 'Submit';
  	$form['actions']['preview']['#access'] = FALSE;
  	$form['actions']['submit']['#attributes']['class'] = array('btn btn-lg btn-color btn-submit');

  	//echo '<pre>'; print_r($form['actions']);echo '</pre>';
}

function enma_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function enma_preprocess_page(&$vars) {

	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}

	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}

	//Taxonomy page
	if (arg(0) == 'taxonomy') {
    	$vars['theme_hook_suggestions'][] = 'page__taxonomy';
  	}

	//View portfolio template

	$views_page = views_get_page_view();

  	if(isset($views_page) && $views_page->name =='_enma_page_portfolio')   {

    	$vars['theme_hook_suggestions'][] = 'page__portfolios';

	}

}


// Remove superfish css files.
function enma_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}



function enma_form_alter(&$form, &$form_state, $form_id) {
	if ($form_id == 'search_block_form') {
		$form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
		$form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
		$form['search_block_form']['#attributes']['id'] = array("mod-search-searchword");
		//disabled submit button
		//unset($form['actions']['submit']);
		unset($form['search_block_form']['#title']);
		$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
		$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
	}
	if($form_id == 'contact_site_form'){
		$form['mail']['#attributes']['class'] = array("input-contact-form");
		$form['name']['#attributes']['class'] = array("input-contact-form");
		$form['subject']['#attributes']['class'] = array("input-contact-form");
		$form['message']['#attributes']['class'] = array("message-contact-form");
		$form['actions']['submit']['#attributes']['class'] = array('btn btn-success contact-form-button');
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}

}

function enma_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}
function enma_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '<ol class="breadcrumb">';
		foreach($breadcrumb as $value) {

			$crumbs .= '<li>'.$value.'</li>';
		}
		$crumbs .= '<li class="active">'.drupal_get_title().'</li>';
		return $crumbs.'</ol>';
	}else{
		return NULL;
	}
}
//custom main menu
function enma_menu_tree__main_menu(array $variables) {
	$str = '';

	$str .= '<ul class="nav navbar-nav navbar-right">';

		$str .= $variables['tree'];

	$str .= '</ul>';



	return $str;
}

function enma_menu_tree__menu_mini_menu(array $variables) {
	$str = '';
	$str .= '<ul>';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function enma_menu_tree__menu_blog_menu(array $variables) {
	$str = '';
	$str .= '<ul class="nav navbar-nav local-scroll text-center">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

/**Override Menu theme */


function enma_links__system_menu_onepage_menu($variables) {
	$str = 'class="nav navbar-nav"';
		foreach ($variables['links'] as $link) {
        $str .= "<li class='menu-item'>".l($link['title'], $link['path'], $link)."</li>";
    }
	$str .= '</ul>';
	return $str;
}
function hook_preprocess_page(&$variables) {
	if (arg(0) == 'node' && is_numeric($nid)) {
		if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
			$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
			if (empty($variables['node_content']['field_show_page_title'])) {
			$variables['node_content']['field_show_page_title'] = NULL;
			}
		}
	}
}

function getRelatedPosts($ntype,$nid){
	$nids = db_query("SELECT n.nid, title FROM {node} n WHERE n.status = 1 AND n.type = :type AND n.nid <> :nid ORDER BY RAND() LIMIT 0,6", array(':type' => $ntype, ':nid' => $nid))->fetchCol();
	$nodes = node_load_multiple($nids);
	$return_string = '' ;
	if (!empty($nodes)):
		foreach ($nodes as $node) :
			$field_image = field_get_items('node', $node, 'field_image');
			$return_string .= '<div class="related-post"><figure>';
			$return_string .= '<a href="'.url("node/" . $node->nid).'">';
			$return_string .= theme('image_style', array('style_name' => 'image_112x70', 'path' => $field_image[0]['uri'], 'attributes'=>array('alt'=>$node->title)));
			$return_string .= '</a></figure>';
			$return_string .= '<p class="title"><a href="'.url("node/" . $node->nid).'">';
			$return_string .= $node->title.'</a></p>';
			$return_string .= '<p class="meta">'.format_date($node->created, 'custom', 'd M Y').', '.$node->comment_count.' Comments</p></div>';
		endforeach;
	endif;
	return $return_string.'<div class="riva-insert-menu-here"></div>';
}


function enma_preprocess_node(&$vars) {
	unset($vars['content']['links']['statistics']['#links']['statistics_counter']);
}

function enma_menu_link(array $variables) {
  	$element = $variables['element'];
  	$sub_menu = '';
  	if($element['#original_link']['menu_name'] == 'main-menu') {

	  	if ($element['#below'] && $element['#original_link']['depth'] == 1) {
	  		unset($element['#below']['#theme_wrappers']);
	  		$element['#attributes']['class'][] = 'dropdown level-' . $element['#original_link']['depth'];
	  		$element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
	    	$sub_menu = '<ul class="dropdown-menu">'.drupal_render($element['#below']).'</ul>';
	  	} elseif ($element['#below'] && $element['#original_link']['depth'] != 1) {
	  		$element['#attributes']['class'][] = 'dropdown-submenu mul level-' . $element['#original_link']['depth'];
	  		$sub_menu = drupal_render($element['#below']);
	  	} else {
	  		$element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
	  	}
	  	$output = l($element['#title'], $element['#href'], $element['#localized_options']);

	} else {
		if ($element['#below']) {
	    $sub_menu = drupal_render($element['#below']);
	  	}
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	}
	return '<li' . drupal_attributes($element ['#attributes']) . '>' . $output . $sub_menu . "</li>\n";

}



