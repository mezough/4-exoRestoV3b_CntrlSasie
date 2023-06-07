<?php

namespace projet1\webapp;

use projet1\dao\DaoResto;
use projet1\metier\Categorie;
use projet1\metier\Plat;
use projet1\controler\DmException;
use projet1\controler\BadPrixException;
use projet1\controler\RestoException;
use projet1\controler\MyExceptionCase;
use projet1\src\config;


require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';

class CtrlRestau
{
    public function getInfos()
    {
        // get the id of the plat
        $idDuPlat = $_GET['idplat'];
        // echo $idDuPlat;

        //search the id in the DB
        $dao = new DaoResto();
        $plat = $dao->getPlatById($idDuPlat);
        // echo $plat;

        // if any session exist before than start new session:
        if (session_status() != PHP_SESSION_ACTIVE) session_start();

        // create a table for display all plats in a session
        if (!$_SESSION['tabplat']) $_SESSION['tabplat'] = [];
        array_push($_SESSION['tabplat'], $plat);

        // print_r($_SESSION);
        $listeSession = $_SESSION['tabplat'];

        require './src/view/vdetail.php';
    }

    public function clearSession()
    {
        if (session_status() != PHP_SESSION_ACTIVE) session_start();
        unset($_SESSION['tabplat']);
        $this->getInfos();
    }

    public function getIndex()
    {

        // liste des plats
        $dao = new DaoResto();
        $categories = $dao->getCategories();
        // on veut [categorie1,[plat1,plat2 ... ]],[categorie2,[plat1,plat2 ... ]], ... ]
        //          partie 1                     , partie 2
        $liste = [];
        foreach ($categories as $categorie) {
            $plats = $dao->getPlatsByCategorie($categorie);
            $partie = [$categorie, $plats];
            array_push($liste, $partie);
        }
        // $libelleDernierPlat = $_COOKIE['dernierLibelle'];
        // setcookie('dernierLibelle', $libelleDernierPlat, time() + 606024, '/', 'localhost');

        $dateConsultation = $_COOKIE['dateConsultation'];

        $derniereConsultation = (new \DateTime())->setTimezone(new \DateTimeZone('Europe/Paris'));
        $derniereConsultation = $derniereConsultation->format('d-m-Y h:i:s');
        setcookie('dateConsultation', $derniereConsultation, time() + 606024, '/', 'localhost');

        require './src/view/vindex.php';
    }
    // OU
    // setcookie('dateConsultation', $this->getDateJourString(), time() + 606024, '/', 'localhost');

    private function getDateJourString()
    {
        $derniereConsultation = new \DateTime();
        $timeZone = new \DateTimeZone('Europe/Paris');
        $dateDecale = $derniereConsultation->setTimezone($timeZone);
        $date2 = $dateDecale->format('d-m-Y h:i:s');
        return $date2;
    }

    // **************************************************

    public function createPlat()
    {
        $dao = new DaoResto();
        $message = "";
        // inserer le plat dans la BDD
        // !!! attention utiliser POST !!!!!!!
        if (isset($_POST['id'])) {
            $id         = $_POST['id'];
            $libelle    = $_POST['libelle'];
            $prix       = $_POST['prix'];
            $idCat      = $_POST['idCat'];

            try {

                // controle de la saisie utilisateur
                // libelle doit etre renseigne
                if (strlen(trim($libelle)) < 3)  throw new DmException(MyExceptionCase::MIN_LONGUEUR_3);

                // prix doit etre superieur a 200
                if ($prix < 200) throw new DmException(MyExceptionCase::PRIX_MUST_BE_POSITIF);

                // creation des objets
                $categorie = new Categorie($idCat, "");
                $plat = new Plat($id, $libelle, $prix, $categorie);

                // appeler un service (methode / function) qui insere dans la BDD
                $dao = new DaoResto();
                $dao->insertPlat($plat);
                // $dao->insertPlat($id,$libelle, $prix, $idCat);

            } catch (DmException $e) {
                $message = $e->getMessage();
            } catch (\Exception $e) {
                // pas d action
            }
        }

        // code pour recuperer la liuste des categories pour le select html
        $dao = new DaoResto();
        // liste des categories et des plats
        $categories = $dao->getCategories();

        require './src/view/vplat.php';
    }
}
