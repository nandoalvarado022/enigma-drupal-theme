<?php print render($title_prefix); ?>

<?php if ($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<!-- filter -->
<div class="row">
	<div class="col-md-12">
		<div class="portfolio-filter">
			<a href="#" class="filter active" data-filter="*"><?php print t('All'); ?></a>
			<?php
				$name = 'portfolio_categories';
				$myvoc = taxonomy_vocabulary_machine_name_load($name);
				$tree = taxonomy_get_tree($myvoc->vid);
				foreach ($tree as $term) {
				 echo '<a href="#" class="filter" data-filter=".'.$term->tid.'">'.$term->name.'</a>';
				}
			?>
		</div>
	</div>
</div> <!-- end filter -->
<?php if ($rows): ?>
	<div class="row portfolio">
		<div class="works-grid titles">
		<?php print $rows; ?>
		</div>
	</div>
<?php endif; ?>
<?php if ($pager): ?>
<div class="row">
	<?php print $pager; ?>
</div>
<?php endif; ?>
