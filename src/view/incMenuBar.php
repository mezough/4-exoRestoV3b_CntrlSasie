<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.2s">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand smoothie" href="<?= WEBAPP_ROOT ?>index">THE <span class="theme-accent-color">GRILL</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= WEBAPP_ROOT ?>index" class="page-scroll">About Us</a></li>
                <li><a href="<?= WEBAPP_ROOT ?>index.php#the-menu" class="page-scroll">Our Menu</a></li>
                <li><a href="<?= WEBAPP_ROOT ?>ajouter-un-plat" class="page-scroll">Les plats</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Extras <span class="pe-7s-angle-down"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= WEBAPP_ROOT ?>view/v404.php">404</a></li>
                    </ul>
                </li>
                <li><a href="#search"><i class="fa fa-search"></i></a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container-fluid -->
</nav>