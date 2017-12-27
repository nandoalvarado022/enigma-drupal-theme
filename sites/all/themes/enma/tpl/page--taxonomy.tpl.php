<?php require_once(drupal_get_path('theme','enma').'/tpl/header.tpl.php');?>
<?php
	if (isset($node->field_page_title_style) && !empty($node->field_page_title_style)) {
		$page_title_style = $node->field_page_title_style['und'][0]['value'];
	} else {
		$page_title_style = 'style1';
	}
?>
<div class="<?php if ($page_title_style == 'style2') {print 'main-wrapper pt-100';} else print 'main-wrapper-mp';?> oh">
	<!-- Page Title -->
	<?php if ($page_title_style == 'style1') { ?>
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
	<?php } else { ?>
	<section class="page-title style-2">
		<div class="container relative clearfix">
			<div class="title-holder">
				<div class="title-text text-center">
					<h1><?php  print drupal_get_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<!-- end page title -->
	<?php if($page['content']): ?>
    <!-- Blog Standard -->
    <section class="section-wrap blog-standard">
        <div class="container relative">
            <div class="row">
                <?php
                    if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                        print render($tabs);
                    endif;
                    print $messages;
                ?>
                <!-- content -->
                <div class="col-sm-8 blog-content">
                    <?php print render($page['content']); ?>
                </div> <!-- end col -->
                <?php if($page['sidebar']): ?>
                <!-- sidebar -->
                <div class="col-sm-4 sidebar blog-sidebar">
                    <?php print render($page['sidebar']); ?>
                </div> <!-- end col -->
                <?php endif; ?>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end blog standard -->
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
