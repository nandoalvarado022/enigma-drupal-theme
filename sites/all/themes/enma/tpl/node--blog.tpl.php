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
	    $alt = $node->field_images['und'][0]['alt'];
	} else {
	    $imageone = '';
	    $ni = 0;
	}

	if(!empty($node->field_post_format)) {
		$post_format = $node->field_post_format['und'][0]['value'];
	} else {
		$post_format = 'standard';
	}

	if(!$page){ ?>
	<!-- Begin post entry-->
	<div class="entry-item">
	<?php if ($post_format == 'blockquote') { ?>
		<div class="entry blockquote mt-0">
			<blockquote class="blockquote-style-1 text-center mb-0">
				<i class="fa fa-quote-left"></i>
				<p>
					<a href="<?php print $node_url; ?>">
					<?php
			          hide($content['links']);
			          hide($content['field_tags']);
			          hide($content['comments']);
			          hide($content['field_categories']);
			          hide($content['field_images']);
			          hide($content['field_post_format']);
			          hide($content['field_embedded_video']);
			          print strip_tags(render($content));
			        ?>
					</a>
				</p>
				<span>– <?php print $title; ?></span>
			</blockquote>
		</div>
	<?php } else { ?>
		<?php if (!empty($node->field_embedded_video)): ?>
		<div class="entry-video video-wrap">
			<?php print render($content['field_embedded_video']); ?>
		</div>
		<?php elseif ($ni == 1): ?>
		<div class="entry-img">
			<a href="<?php print $node_url; ?>">
			<?php print theme('image_style', array('path' => $imageone, 'style_name' => 'image_750x420', 'attributes'=>array('alt'=>$title)));?>
			</a>
		</div>
		<?php elseif ($ni > 1): ?>
		<div class="entry-slider">
			<div class="flexslider" id="one-img-slide">
				<ul class="slides">
				<?php foreach ($node->field_images['und'] as $key => $value) {
					$img = $node->field_images['und'][$key]['uri'];
					$alt = $node->field_images['und'][$key]['alt'];
					?>
					<li>
						<a href="<?php print $node_url; ?>">
							<?php print theme('image_style', array('path' => $img, 'style_name' => 'image_750x420', 'alt' => $alt));?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div> <!-- end slider -->
		<?php else: ?>
		<?php endif; ?>
		<div class="entry-date hidden-sm hidden-xs">
			<span><?php print format_date($node->created, 'custom', 'd');?></span>
			<span><?php print format_date($node->created, 'custom', 'M');?></span>
		</div>
		<div class="entry-title">
			<h2>
			<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
			</h2>
		</div>
		<ul class="entry-meta">
			<li class="entry-date">
				<a href="<?php print $node_url; ?>"><?php print format_date($node->created, 'custom', 'd F, Y');?></a>
			</li>
			<li class="entry-author">
				<?php print t('by') ?> <?php print $name; ?>
			</li>
			<li class="entry-category">
				<?php print t('in') ?> <?php print strip_tags(render($content['field_categories']), '<a>'); ?>
			</li>
			<li>
				<a href="<?php print $node_url; ?>" class="entry-comments"><?php print $comment_count; ?> <?php print t('Comments'); ?></a>
			</li>
		</ul>
		<div class="entry">
			<div class="entry-content">
				<p>
					<?php
			          hide($content['links']);
			          hide($content['field_tags']);
			          hide($content['comments']);
			          hide($content['field_categories']);
			          hide($content['field_images']);
			          hide($content['field_post_format']);
			          hide($content['field_embedded_video']);
			          print render($content);
			        ?>
				</p>
				<a href="<?php print $node_url; ?>" class="read-more"><?php print 'Read More'; ?></a>
				<i class="icon arrow_right"></i>
			</div>
		</div>
	<?php } ?>
	</div>
	<!-- End post endtry-->
	<?php } else { ?>
	<section class="section-wrap pb-100 blog-single">
		<div class="container relative">
			<div class="row">
			<!-- content -->
				<div class="col-sm-12 blog-content">
					<div class="entry-item">
					    <div class="entry-img">
					        <?php print theme('image', array('path' => $imageone, 'style_name' => 'image_750x420', 'alt' => $alt));?>
					    </div>
					    <div class="row">
					        <div class="col-sm-10 col-sm-offset-1">
					            <div class="entry-title">
					                <h2><?php print $title; ?></h2>
					            </div>
					            <ul class="entry-meta bottom-line">
					                <li class="entry-date">
					                    <a href="<?php print $node_url; ?>"><?php print format_date($node->created, 'custom', 'd F, Y');?></a>
					                </li>
					                <li class="entry-author">
					                    <?php print t('by'); ?> <a href="<?php print $node_url; ?>"><?php print $name; ?></a>
					                </li>
					                <li class="entry-category">
					                    <?php print t('in'); ?> <?php print strip_tags(render($content['field_categories']), '<a>'); ?>
					                </li>
					                <li>
					                    <a href="<?php print $node_url; ?>" class="entry-comments"><?php print $comment_count; ?> <?php print t('Comments'); ?></a>
					                </li>
					            </ul>
					            <div class="entry">
					                <div class="entry-content">
					                    <?php
								          hide($content['links']);
								          hide($content['field_tags']);
								          hide($content['comments']);
								          hide($content['field_categories']);
								          hide($content['field_images']);
								          hide($content['field_post_format']);
								          hide($content['field_embedded_video']);
								          print render($content);
								        ?>
					                    <div class="row mt-30">
					                        <div class="col-md-8">
					                            <div class="entry-tags">
					                                <h6><?php print t('Tags'); ?>:</h6>
					                                <?php print strip_tags(render($content['field_tags']), '<a>'); ?>
					                            </div>
					                        </div>
					                        <!-- end tags -->
					                        <div class="col-md-4 clearfix">
					                            <div class="entry-share">
					                                <h6><?php print t('Share'); ?>:</h6>
					                                <div class="socials">
					                                    <a href="http://www.facebook.com/sharer.php?u=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								                        <a href="https://twitter.com/intent/tweet?text=<?php print $title; ?>&amp;url=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								                        <a href="http://plus.google.com/share?url=<?php print $base_root.$node_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
								                        <a href="https://pinterest.com/pin/create/button/?url=&amp;media=<?php print $image_url; ?>&amp;description=<?php print $title ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                    <!-- end share -->
					                </div>
					            </div>
					            <!-- end entry -->
					        </div>
					    </div>
					    <!-- end row -->
					</div>
				</div>
			</div>
		</div>
	</section><!-- end blog single -->
	<!-- Comments -->
	<?php print render($content['comments']); ?>
	<?php } ?>