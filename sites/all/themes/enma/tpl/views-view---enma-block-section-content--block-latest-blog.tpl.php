<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="container">
		<div class="row">
			<div id="owl-blog" class="owl-carousel owl-theme">
			<?php print $rows; ?>
			</div>
			<div class="customNavigation mt-40 text-center">
				<a class="prev"><i class="icon arrow_left"></i></a>
				<a class="next"><i class="icon arrow_right"></i></a>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>
