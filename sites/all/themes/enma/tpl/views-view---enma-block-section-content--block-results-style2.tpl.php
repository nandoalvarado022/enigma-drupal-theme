<?php print render($title_prefix); ?>
<div class="container-fluid">
<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php if ($rows): ?>
	<div class="row">
		<?php print $rows; ?>
	</div>
<?php endif; ?>
</div>
