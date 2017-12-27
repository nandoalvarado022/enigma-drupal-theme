<?php require_once(drupal_get_path('theme','enma').'/tpl/header.tpl.php');?>
<?php
	global $base_url;
    if (isset($node->field_menu_style) && !empty($node->field_menu_style)) {
        $menu_style = $node->field_menu_style['und'][0]['value'];
    } else $menu_style = theme_get_setting('menu_style', 'enma');
    if (empty($menu_style)) $menu_style = 'menu1';

	$map_icon = theme_get_setting('map_icon','enma');

        if (!empty($map_icon)) {

            $map_icon_img = file_create_url(file_load($map_icon)->uri);

        } else $map_icon_img = $base_url.'/'.base_path().path_to_theme().'/images/map_pin.png';
    if (isset($node->field_footer_style) && !empty($node->field_footer_style)) {
        $footer_style = $node->field_footer_style['und'][0]['value'];
    } else $footer_style = theme_get_setting('footer_style', 'enma');
    if (empty($footer_style)) $footer_style = 'footer1';

    if (isset($node->field_menu_style) && !empty($node->field_menu_style)) {
        $menu_style = $node->field_menu_style['und'][0]['value'];
    } else $menu_style = theme_get_setting('menu_style', 'enma');
    if (empty($menu_style)) $menu_style = 'menu1';
?>
<div class="<?php if ($footer_style == 'footer3') { print 'main-wrapper-onepage angles';} else print 'main-wrapper-mp'; ?> oh">
	<?php if($page['content']): ?>
	<?php
		if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
		endif;
		print $messages;
		unset($page['content']['system_main']['default_message']);
	?>
	<?php print render($page['content']) ?>
	<?php endif; ?>
	<?php if ($page['section_content']): ?>
		<?php print render($page['section_content']); ?>
	<?php endif; ?>
	<?php if ($page['pages_bottom']): ?>
		<?php print render($page['pages_bottom']); ?>
	<?php endif; ?>
	<?php require_once(drupal_get_path('theme','enma').'/tpl/footer.tpl.php');?>
	<div id="back-to-top">
		<a href="#top"><i class="fa fa-angle-up"></i></a>
	</div>
	<input type="hidden" value="<?php print $map_icon_img; ?>" id="map-icon" />
</div> <!-- end main-wrapper -->
<?php if ($menu_style == 'menu4') print '</div>'; ?> <!-- end content wrap -->
