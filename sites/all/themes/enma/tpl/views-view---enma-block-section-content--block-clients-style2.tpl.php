<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="row">
		<div id="owl-partners" class="owl-carousel owl-theme">
		<?php print $rows; ?>
		</div>
	</div>
<?php endif; ?>
</div>