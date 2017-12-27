<?php require_once(drupal_get_path('theme','enma').'/tpl/header.tpl.php');?>

<div class="main-wrapper-mp oh">
	<!-- Page Title -->
	<section class="page-title style-2">
		<div class="container relative clearfix">
			<div class="title-holder">
				<div class="title-text">
					<h1><?php  print drupal_get_title(); ?></h1>
					<?php if ($breadcrumb): ?>
					<?php print $breadcrumb ;?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->
	<?php if($page['content']): ?>
	<?php
		if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
			print render($tabs);
		endif;
		print $messages;
	?>

	<section class="section-wrap-mp portfolio-single">

		<?php print render($page['content']); ?>

	</section>

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
</div> <!-- end main-wrapper -->
