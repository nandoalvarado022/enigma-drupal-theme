<?php require_once(drupal_get_path('theme','enma').'/tpl/header.tpl.php');?>

<div class="main-wrapper-mp oh">
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
	<section class="section-wrap-mp pb-50">
		<div class="container">
		<?php
			if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
				print render($tabs);
			endif;
			print $messages;
		?>
		<?php print render($page['content']); ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ($page['section_content']): ?>
		<?php print render($page['section_content']); ?>
	<?php endif; ?>
	<?php require_once(drupal_get_path('theme','enma').'/tpl/footer.tpl.php');?>
	<div id="back-to-top">
		<a href="#top"><i class="fa fa-angle-up"></i></a>
	</div>
</div> <!-- end main-wrapper -->