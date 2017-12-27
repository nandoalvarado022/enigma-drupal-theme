<?php global $base_url; ?>
<?php
    if (isset($node->field_menu_style) && !empty($node->field_menu_style)) {
        $menu_style = $node->field_menu_style['und'][0]['value'];
    } else $menu_style = theme_get_setting('menu_style', 'enma');
    if (empty($menu_style)) $menu_style = 'menu1';
?>
<?php if ($menu_style == 'menu1'): ?>
<header class="nav-type-2">
    <nav class="navbar navbar-static-top">
        <div class="navigation">
            <div class="container relative">
                <?php
                $block = module_invoke('search', 'block_view', 'search');
                print render($block);
                ?>
                <div class="row">
                    <div class="navbar-header">
                        <!-- Logo -->
                        <?php if($logo){ ?>
                        <div class="logo-container">
                            <div class="logo-wrap">
                                <a href="<?php print $base_url; ?>">
                                <img class="logo" src="<?php print $logo; ?>" alt="logo">
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end navbar-header -->
                    <div class="col-md-9 nav-wrap right">
                        <?php if ($page['main_menu']): ?>
                        <?php print render($page['main_menu']); ?>
                        <?php endif; ?>
                        <!-- end collapse -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navigation -->
    </nav>
    <!-- end navbar -->
</header>
<?php elseif ($menu_style == 'menu2'): ?>
<!-- Navigation -->
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
                                <a href="#home">
                                <img class="logo" src="<?php print base_path().path_to_theme(); ?>/logo_light.png" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end navbar-header -->
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                            <ul class="nav navbar-nav local-scroll text-center">
                                <li class="active">
                                    <a href="#home"><?php print t('Home'); ?></a>
                                </li>
                            </ul>
                        </div>
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
        <!-- end navigation -->
    </nav>
    <!-- end navbar -->
</header>
<!-- end navigation -->
<?php elseif ($menu_style == 'menu3'): ?>
<!-- Navigation -->
<header class="nav-type-3">
    <div class="fs-menu" id="overlay">
        <nav class="overlay-menu">
        <?php if ($page['mini_menu']): ?>
        <?php print render($page['mini_menu']); ?>
        <?php endif; ?>
        </nav>
    </div>
    <div class="container-fluid nav-wrap clearfix">
        <?php if($logo){ ?>
        <div class="logo-container">
            <a href="<?php print $base_url; ?>" class="logo">
                <img src="<?php print $logo; ?>" alt="logo">
            </a>
        </div>
        <?php } ?>
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div> <!-- end container -->
</header>
<?php else: ?>
<div class="content-wrap oh">
    <!-- Navigation -->
    <header class="nav-type-4">
        <nav class="navbar">
            <div class="nav-left">
                <div class="container header-wrap relative">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <!-- Logo -->
                            <?php if($logo){ ?>
                            <div class="logo-container">
                                <div class="logo-wrap local-scroll-no-offset">
                                    <a href="#home">
                                    <img class="logo" src="<?php print $logo; ?>" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- end navbar-header -->
                        <div class="col-md-8 col-xs-12 nav-wrap">
                            <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                                <ul class="nav navbar-nav local-scroll-no-offset text-center">
                                    <li class="active">
                                        <a href="#home"><?php print t('Home') ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end col -->
                        <?php if ($page['header_social']): ?>
                        <?php print render($page['header_social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- end container -->
            </div>
            <!-- end navigation -->
        </nav>
        <!-- end navbar -->
    </header>
    <!-- end navigation -->
<?php endif; ?>