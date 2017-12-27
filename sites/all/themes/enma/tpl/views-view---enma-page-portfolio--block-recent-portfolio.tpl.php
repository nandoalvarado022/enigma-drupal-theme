<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="customNavigation right">
		<a class="btn prev"><i class="fa fa-angle-left"></i></a>
		<a class="btn next"><i class="fa fa-angle-right"></i></a>
	</div>
	<div class="row mt-20">
		<div id="owl-related-works" class="owl-carousel owl-theme">
		<?php print $rows; ?>
		</div>
	</div>
<?php endif; ?>
</div>