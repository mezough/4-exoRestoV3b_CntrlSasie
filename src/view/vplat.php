
<?php ob_start();?>

        <section class="dark-wrapper opaqued parallax" data-parallax="scroll" data-image-src="<?= PUBLIC_ROOT ?>img/bg/bg1.jpg" data-speed="0.8">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">
                            <h2 class="section-heading">Créer <span class="theme-accent-color">vos</span> Plats</h2>
                            <h3 class="section-heading theme-accent-color:white"><?= $message ?></h3>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <form method="POST" action="<?= WEBAPP_ROOT ?>ajouter-un-plat" class="form-group  col-md-12 wow fadeIn" data-wow-delay="0.2s">
                                    <!-- <input type="number" class="form-control col-md-4" name="id" placeholder="Ref *" id="id" required data-validation-required-message="Entrer une référence." /> -->
                                    <input type="text" class="form-control col-md-4" name="id" placeholder="Ref *" id="id" />
                                    <input type="text" class="form-control col-md-4" name="libelle" placeholder="Nom du plat *" id="libelle" required data-validation-required-message="Entrer le nom du plat." />
                                    <!-- <input type="number" class="form-control col-md-4" name="prix" placeholder="Prix en centimes *" id="prix" required data-validation-required-message="Entrer le tarif en centimes." /> -->
                                    <input type="text" class="form-control col-md-4" name="prix" placeholder="Prix en centimes *" id="prix" />
                                    <select id="idCat" name="idCat" class="form-control col-md-4 text-white">
                                        <?php foreach ($categories as $cat) { ?>
                                            <!-- <option value="1">Entrée</option> -->
                                            <option value="<?= $cat->getId() ?>"> <?= $cat->getLibelle() ?></option>
                                        <?php } ?>
                                    </select>
                                    <input class="btn btn-primary btn-white mt30 pull-right" type="submit" name="submit" value="Valider" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php $content= ob_get_clean();?>

        <?php require 'layout.php';?>