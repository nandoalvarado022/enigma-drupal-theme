<?php

	$node = node_load($row->nid) ;

	$imageone = $node->field_images['und'][0]['uri'];

    $ni = count($node->field_images['und']);

    $image_url = image_style_url('image_570x400', $imageone);

    $build_body = field_view_field('node', $node, 'body', 'teaser');

?>

<div class="blog-col">

<?php if ($ni == 1): ?>

	<div class="entry-img">

		<a href="<?php print url("node/" . $node->nid); ?>">

			<img src="<?php print $image_url; ?>" alt="<?php print $node->title; ?>">

		</a>

	</div>

<?php else: ?>

	<div class="entry-slider oh">

		<div class="flexslider" id="one-img-slide">

			<ul class="slides">

			<?php

			foreach ($node->field_images['und'] as $key => $value) {

				$image = $node->field_images['und'][$key]['uri'];

				$image_url = image_style_url('image_570x400', $image);

			?>

				<li>

					<a href="<?php print url("node/" . $node->nid); ?>">

						<img src="<?php print $image_url; ?>" alt="<?php print $node->title; ?>">

					</a>

				</li>

			<?php

			}

			?>

			</ul>

		</div>

	</div>

<?php endif; ?>

	<div class="entry-box">

		<div class="entry-title">

			<h4><a href="<?php print url("node/" . $node->nid); ?>"><?php print $node->title; ?></a></h4>

		</div>

		<ul class="entry-meta">

			<li><?php print t('by'); ?> <a href="<?php print url("node/" . $node->nid); ?>"><?php print $node->name; ?></a></li>

			<li>

				<a href="<?php print url("node/" . $node->nid); ?>"><?php print format_date($node->created, 'custom', 'F d, Y') ?></a>

			</li>

		</ul>

		<div class="entry-content">

			<p><?php print strip_tags(render($build_body)); ?></p>

			<a href="<?php print url("node/" . $node->nid); ?>" class="read-more"><?php print t('Read More'); ?></a>

		</div>

	</div>

</div>