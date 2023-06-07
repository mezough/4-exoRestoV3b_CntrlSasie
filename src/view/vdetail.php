        <?php ob_start(); ?>

        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="<?= PUBLIC_ROOT ?>img/bg/bg1.jpg" data-speed="0.8">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">
                            <h2 class="section-heading">your <span class="theme-accent-color">checked</span> menue</h2>
                            <hr class="thin-hr">
                            <h3 class="section-subheading secondary-font">Were very happy to see you.</h3>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="container">
                        <!-- plat consulté a partir du menu -->
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <h2 class="mb50 ">About: <u class="theme-accent-color 3rem"><span> <?= $plat->getLibelle() ?></span></u></h2>
                                <p class="lead 3rem">Categorie :<strong> <?= $plat->getCategorie()->getLibelle() ?></strong></p>
                                <p class="lead 3rem">Prix : <strong> <?= $plat->getPrixEuro() ?> €</strong> </p>
                            </div>
                        </div>

                        <!-- affichage de la liste des plats consultés -->
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <h2 class="mb50 mt120">
                                    Liste des plats consultés
                                    <a href="<?= WEBAPP_ROOT ?>clear-session?idplat=<?= $plat->getId() ?>"><i class="fa fa-trash-o"></i></a>
                                </h2>
                                <?php foreach ($listeSession as $platSession) { ?>
                                    <ul class=" social-links wow fadeIn" data-wow-delay="0.3s">
                                        <li><?= $platSession->getLibelle() ?> - <?= $platSession->getPrixEuro() ?> €</li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- fin liste -->
                    </div>
                </div>

            </div>
        </section>

        <?php $content = ob_get_clean(); ?>

        <?php require 'layout.php'; ?>