<?php print render($title_prefix); ?>
<div class="container">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
<!-- Wrapper -->
	<div class="row">
		<?php print $rows; ?>
	</div>
<?php endif; ?>
<!-- Wrapper End -->
</div>