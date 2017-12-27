<?php print render($title_prefix); ?>
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
<!-- Wrapper -->
<div id="owl-promo" class="owl-carousel owl-theme">
	<?php print $rows; ?>
</div>
<?php endif; ?>
<!-- Wrapper End -->