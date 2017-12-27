<?php print render($title_prefix); ?>
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
<div id="owl-testimonials" class="owl-carousel owl-theme text-center">
	<?php print $rows; ?>
</div>
<?php endif; ?>
<!-- Wrapper End -->