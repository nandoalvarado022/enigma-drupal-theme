<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<section class="entry-comments section-wrap pt-100 pb-100 bg-light">
	<div class="container">
		<h4 class="text-center mb-50"><?php print $content['#node']->comment_count; ?> <?php print t('Comments');?></h4>
  		<ul class="comment-list">
    		<?php print render($content['comments']); ?>
  		</ul> <!-- end comment list -->
	</div>
</section> <!--  end comments -->
<!-- Comment form -->
<section class="section-wrap contact-form pt-100 pb-100">
	<div class="container">
		<h5 class="text-center mb-50"><?php print t('Leave a comment') ?></h5>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
  				<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
