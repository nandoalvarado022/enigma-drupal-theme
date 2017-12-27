<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
	global $base_root, $base_url;

	if(!empty($node->field_images)){
	    $imageone = $node->field_images['und'][0]['uri'];
	    $ni = count($node->field_images['und']);
	    $image_url = file_create_url($imageone);
	} else {
	    $imageone = '';
	    $ni = 0;
	}

	if(!$page){ ?>

	<?php } else { ?>
	<div class="container">
	    <div class="row">
	        <div class="col-md-8">
	        	<?php if ($ni > 1): ?>
	            <div id="owl-slider-one-img" class="owl-carousel owl-theme oh">
	            	<?php
	            	foreach ($node->field_images['und'] as $key => $value) {
	            		$img = $node->field_images['und'][$key]['uri'];
	            		$img_url = image_style_url('image_768x624', $img);
	            	?>
	            	<div class="item">
	                    <a href="#">
	                    <img src="<?php print $img_url; ?>" alt="<?php print $title; ?>">
	                    </a>
	                </div>
	            	<?php } ?>
	            </div>
	            <!-- end owl carousel -->
	            <?php else: ?>
				<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>">
	        	<?php endif; ?>
	        </div>
	        <!-- end slider -->
	        <div class="col-md-4">
	            <div class="portfolio-description">
	                <h2><?php print $title; ?></h2>
	                <p>
	                	<?php
				          hide($content['links']);
				          hide($content['field_images']);
				          hide($content['comments']);
				          hide($content['field_portfolio_category']);
				          hide($content['field_client']);
				          print render($content);
				        ?>
	                </p>
	                <ul>
	                    <li><span><?php print t('Date') ?>:</span> <?php print format_date($node->created, 'custom', 'd F, Y'); ?></li>
	                    <li class="category"><span><?php print t('Category') ?>:</span> <?php print strip_tags(render($content['field_portfolio_category']), '<a>'); ?></li>
	                    <li><span><?php print t('Client') ?>:</span> <?php print strip_tags(render($content['field_client']), '<a>'); ?></li>
	                </ul>
	                <a href="<?php print $node_url; ?>" class="btn btn-sm btn-dark"><?php print t('View Project'); ?></a>
	                <div class="entry-share clearfix">
	                    <h6>Share:</h6>
	                    <div class="socials">
	                        <a href="http://www.facebook.com/sharer.php?u=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
	                        <a href="https://twitter.com/intent/tweet?text=<?php print $title; ?>&amp;url=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
	                        <a href="http://plus.google.com/share?url=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
	                        <a href="https://pinterest.com/pin/create/button/?url=&amp;media=<?php print $image_url; ?>&amp;description=<?php print $title ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- end description -->
	    </div>
	</div>
	<?php } ?>