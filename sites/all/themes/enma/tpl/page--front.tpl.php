<?php require_once(drupal_get_path('theme','enma').'/tpl/header.tpl.php');?>
<div class="main-wrapper-mp oh">
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
	<?php require_once(drupal_get_path('theme','enma').'/tpl/footer.tpl.php');?>
	<div id="back-to-top">
		<a href="#top"><i class="fa fa-angle-up"></i></a>
	</div>
</div> <!-- end main-wrapper -->
