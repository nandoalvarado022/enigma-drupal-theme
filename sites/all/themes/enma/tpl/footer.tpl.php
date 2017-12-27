<?php
    $footer_copyright = theme_get_setting('footer_copyright_message', 'enma');
    if (isset($node->field_footer_style) && !empty($node->field_footer_style)) {
        $footer_style = $node->field_footer_style['und'][0]['value'];
    } else $footer_style = theme_get_setting('footer_style', 'enma');
    if (empty($footer_style)) $footer_style = 'footer1';
?>
<!-- Footer Type-2 -->
<?php if ($footer_style == 'footer1'): ?>
<footer class="footer footer-type-2 bg-dark">
    <div class="container">
    <?php if ($page['footer']): ?>
        <div class="footer-widgets">
            <div class="row">
                <?php print render($page['footer']); ?>
            </div>
            <!-- end row -->
        </div>
    <?php endif; ?>
        <!-- end footer widgets -->
    </div>
    <!-- end container -->
<?php if (!empty($footer_copyright)): ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 copyright">
                    <span>
                    <?php print $footer_copyright; ?>
                    </span>
                </div>
                <?php if ($page['bottom_right']): ?>
                    <?php print render($page['bottom_right']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!-- end bottom footer -->
</footer>
<!-- end footer -->
<?php elseif($footer_style == 'footer3' || $footer_style == 'footer2'): ?>
<!-- Footer -->
<footer class="footer minimal bg-dark <?php if ($footer_style == 'footer3') print 'angle-top';?>">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php if ($page['footer2']): ?>
                <?php print render($page['footer2']); ?>
                <?php endif; ?>
                <?php if (!empty($footer_copyright)): ?>
                <span class="copyright text-center">
                    <?php print $footer_copyright; ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<?php else: ?>
<!-- Footer -->
<footer class="footer footer-type-3">
    <div class="container">
        <div class="row">
            <?php if (!empty($footer_copyright)): ?>
            <div class="col-sm-4 col-xs-12">
                <span class="copyright">
                    <?php print $footer_copyright; ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if ($page['footer4']): ?>
                <?php print render($page['footer4']); ?>
            <?php endif; ?>
        </div>
    </div>
</footer>
<!-- end footer -->
<?php endif; ?>