<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'incHeader.php' ?>

</head>

<body id="page-top" class="regular-navigation">
    <div class="master-wrapper">

        <div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="<?= PUBLIC_ROOT ?>img/loading.GIF" alt="loading" /></span>
            </div>
        </div>

        <?php include 'incMenuBar.php' ?>
        <div id="search-wrapper">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="Enter Search Term" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- Header -->
        <?= $header ?>

        <!-- Section -->
        <?= $content ?>

        <footer class="white-wrapper">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-12 wow fadeIn mb30" data-wow-delay="0.2s">
                        <span class="copyright">Copyright 2019. Designed by DISTINCTIVE THEMES</span>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-inline social-links wow fadeIn" data-wow-delay="0.2s">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <div id="bottom-frame"></div>

        <a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    </div>

    <script src="<?= PUBLIC_ROOT ?>js/jquery.js"></script>
    <script src="<?= PUBLIC_ROOT ?>js/bootstrap.min.js"></script>
    <script src="<?= PUBLIC_ROOT ?>js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?= PUBLIC_ROOT ?>js/init.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        $(document).ready(function() {
            'use strict';
            jQuery('#headerwrap').backstretch([
                "<?= PUBLIC_ROOT ?>img/bg/bg1.jpg",
                "<?= PUBLIC_ROOT ?>img/bg/bg2.jpg",
                "<?= PUBLIC_ROOT ?>img/bg/bg3.jpg",
            ], {
                duration: 8000,
                fade: 500
            });
        });
    </script>

</body>

</html>