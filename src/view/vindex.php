        <?php ob_start(); ?>
        <!-- Header -->
        <header id="headerwrap" class="backstretched fullheight">
            <div class="container-fluid fullheight">
                <div class="vertical-center row">
                    <div class="col-sm-1 pull-left text-center slider-control match-height">
                        <a href="#" class="prev-bs-slide vertical-center wow fadeInLeft" data-wow-delay="0.8s"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    <div class="intro-text text-center smoothie col-sm-10 match-height">
                        <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.8s"><img src="<?= PUBLIC_ROOT ?>img/intro-logo.png"></div>
                    </div>
                    <div class="col-sm-1 pull-right text-center slider-control match-height">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <?php $header = ob_get_clean(); ?>

<?php ob_start();?>

        <section id="the-menu">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">
                            <h2 class="section-heading">Browse <span class="theme-accent-color">The</span> Menu</h2>
                            <hr class="thin-hr">
                            <h3 class="section-subheading secondary-font">Your tastebuds will thank you.</h3>
                            <!-- <h3 class="primary-font">Dernier <span class="theme-accent-color">Plat</span> Consultes: </h3> -->
                            <p><?php if (isset($libelleDernierPlat)) { ?> Dernier Plat Consultes: <?= $libelleDernierPlat ?></p>
                        <?php } ?>
                        <!-- <h3 class="primary-font">Dernier <span class="theme-accent-color">Date</span> Consultes: </h3> -->
                        <p><?php if (isset($dateConsultation)) { ?> Dernier Date Consultes: <?= $dateConsultation ?></p>
                    <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="container">

                    <div class="row mb100">
                        <!-- // on veut [categorie1,[plat1,plat2 ... ],[categorie2,[plat1,plat2 ... ], ... ]
                    //               partie 1                     , partie 2 -->
                        <?php foreach ($liste as $partie) { ?>
                            <div class="col-md-6 wow fadeIn">
                                <h2 class="mb50 text-primary"><span class="heading-font text-uppercase"><?= $partie[0]->getLibelle() ?></span></h2>
                                <?php foreach ($partie[1] as $plat) { ?>
                                    <h3><?= $plat->getLibelle() ?> <span class="theme-accent-color">€ <?= $plat->getPrixEuro() ?></span>
                                        <a href="<?= WEBAPP_ROOT ?>infos-plat?idplat=<?= $plat->getId() ?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i></a>
                                    </h3>
                                    <p></p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

        <?php $content = ob_get_clean(); ?>

        <?php require 'layout.php'; ?>