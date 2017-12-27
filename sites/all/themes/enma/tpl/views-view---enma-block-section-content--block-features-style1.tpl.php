<?php print render($title_prefix); ?>
<div class="container">
	<div class="row">
	<?php if ($attachment_before): ?>
		<?php print $attachment_before; ?>
	<?php endif; ?>
	<?php if ($rows): ?>
		<div class="col-md-6">
			<div class="features-icons mt-80">
			<?php print $rows; ?>
			</div>
		</div>
<?php endif; ?>
	</div>
</div>