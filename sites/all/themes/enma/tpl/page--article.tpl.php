<!-- Navigation -->
<?php global $base_url; ?>
<?php
    $page_title_background = theme_get_setting('page_title_background','enma');

    if (!empty($page_title_background)) {
        $page_title_bg = file_create_url(file_load($page_title_background)->uri);
    } else $page_title_bg = $base_url.'/'.base_path().path_to_theme().'/images/blog_title_bg.jpg';
    $footer_copyright = theme_get_setting('footer_copyright_message', 'enma');
?>
<header class="nav-type-1" id="home">
    <nav class="navbar navbar-fixed-top">
        <div class="navigation-overlay">
            <div class="container-fluid relative">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap local-scroll">
                                <a href="<?php print $base_url; ?>">
                                <img class="logo" src="images/logo-drupal.png" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end navbar-header -->
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <?php if ($page['blog_menu']): ?>
                        <?php print render($page['blog_menu']); ?>
                        <?php endif; ?>
                    </div>
                    <!-- end col -->
                    <?php if ($page['header_social']): ?>
                    <?php print render($page['header_social']); ?>
                    <?php endif; ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navigation nand -->
    </nav>
    <!-- end navbar -->
</header>
<!-- end navigation -->
<div class="main-wrapper-onepage main oh">
    <!-- Page Title -->
    <?php // print "<pre>"; print_r($node->field_image["und"][0]["uri"]); 
    // $page_title_bg = file_create_url(file_load($page_title_background)->uri);
    $image_uri=$node->field_image["und"][0]["uri"];
    $image_article=file_create_url($image_uri);
    ?>
    <section class="page-title text-center" style="background-image: url(<?php print $image_article; ?>);">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="color-white heading-frame"><?php  print drupal_get_title(); ?></h1>
                    <?php if ($breadcrumb): ?>
                    <?php print $breadcrumb ;?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
<?php if($page['content']): ?>
    <!-- Blog Standard -->
    <?php if (arg(0) == 'blog'): ?>
    <section class="section-wrap blog-standard">
        <div class="container relative">
            <div class="row">
                <?php
                    if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                        print render($tabs);
                    endif;
                    print $messages;
                ?>
                <!-- content -->
                <div class="col-sm-8 blog-content">
                    <?php print render($page['content']); ?>
                </div> <!-- end col -->
                <?php if($page['sidebar']): ?>
                <!-- sidebar -->
                <div class="col-sm-4 sidebar blog-sidebar">
                    <?php print render($page['sidebar']); ?>
                </div> <!-- end col -->
                <?php endif; ?>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end blog standard -->
    <?php else: ?>
        <?php
            if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
            print render($tabs);
            endif;
            print $messages;
        ?>
        <?php print render($page['content']); ?>
    <?php endif; ?>
<?php endif; ?>
    <footer class="footer minimal bg-dark">
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
    <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>
</div> <!-- end main-wrapper -->
