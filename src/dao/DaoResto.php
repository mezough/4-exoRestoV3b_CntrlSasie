<?php

namespace projet1\dao;
// require_once('Database.php');
// require_once('Requetes.php');
// require_once('Categorie.php');
// require_once('Plat.php');


// use Plat;

require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';

use projet1\metier\Categorie;
use projet1\metier\Plat;
use projet1\dao\Database;
use projet1\dao\Requetes;


class DaoResto
{

    private $conn;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    // TODO : gestion des erreurs
    public function insertPlat(Plat $newplat)
    {
        // query (si pas de parametres - pas de ?) prepare (si on a des parametres ?)
        $query = "insert into plat (idP, idC, libelleP, prixP) values (?,?,?,?)";
        $statement  = $this->conn->prepare($query);
        // OU
        // $statement  = $db->prepare("insert into plat (idP, idC, libelleP, prixP) values (?,?,?,?)");

        // lier les ? aux variables du programme
        $statement->bindValue(1, $newplat->getId());
        $statement->bindValue(2, $newplat->getCategorie()->getId());
        $statement->bindValue(3, $newplat->getLibelle());
        $statement->bindValue(4, $newplat->getPrix());

        $statement->execute();
    }
    // TODO : gestion des erreurs
    public function getPlats()
    {
        $query      = Requetes::S_PLATS;
        try {
            $statement  = $this->conn->query($query);
            $plats = [];
            while ($row = $statement->fetch()) {
                $id       = $row['idP'];
                $libelle  = $row['libelleP'];
                $prix     = $row['prixP'];
                $plat     = new Plat($id, $libelle, $prix, null);
                array_push($plats, $plat);
            }
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
        }
        return $plats;
    }

    // TODO : gestion des erreurs
    public function getCategories()
    {
        $query      = Requetes::S_CATEGORIES;
        try {
            $statement  = $this->conn->query($query);
            $categories = [];
            while ($row = $statement->fetch()) {
                $id       = $row['idC'];
                $libelle  = $row['libelleC'];
                $categorie = new Categorie($id, $libelle);
                array_push($categories, $categorie);
            }
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
        }
        return $categories;
    }

    // TODO : contrôles 
    // TODO : gestion des erreurs
    public function getPlatsByCategorie(Categorie $categorie)
    {
        $query      = Requetes::GET_PLATS_BY_CATEGORIE;
        try {
            $statement  = $this->conn->prepare($query);
            $statement->bindValue(1, $categorie->getId());
            $statement->execute();
            // autre syntaxe
            $statement->execute([$categorie->getId()]);
            $plats = [];
            while ($row = $statement->fetch()) {
                $id       = $row['idP'];
                $libelle  = $row['libelleP'];
                $prix     = $row['prixP'];
                $plat     = new Plat($id, $libelle, $prix, $categorie);
                array_push($plats, $plat);
            }
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
        }
        return $plats;
    }

    // TODO : contrôles 
    // TODO : gestion des erreurs
    public function getCategorieById(int $id)
    {
        $query      = Requetes::GET_CATEGORIE_BY_ID;
        $categorie = null;
        try {
            $statement  = $this->conn->prepare($query);
            $statement->bindValue(1, $id);
            $statement->execute();
            $row = $statement->fetch();
            $id       = $row['idC'];
            $libelle  = $row['libelleC'];
            $categorie = new Categorie($id, $libelle);
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
        }
        return $categorie;
    }

    public function getPlatById(int $id)
    {
        $plat = null;
        $query      = Requetes::GET_PLAT_BY_ID;
        try {
            
            $statement  = $this->conn->prepare($query); // if there is ? (parametre)
            $statement->bindValue(1, $id);              // (the first ?, iniciate an id)
            $statement->execute();                      // execute the statement
            $nb = $statement->rowCount();
            
            if ($nb != 0) {

                $row = $statement->fetch();

                $idPlat       = $row['idP'];
                $libellePlat  = $row['libelleP'];
                $prixPlat    = $row['prixP'];
                $idCategorie    = $row['idc'];
                $libelleCategorie    = $row['libellec'];

                $categorie = new Categorie($idCategorie, $libelleCategorie);
                $plat     = new Plat($idPlat, $libellePlat, $prixPlat, $categorie);
            }
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
        }

        return $plat;
    }

    // TODO : contrôles 
    // TODO : gestion des erreurs
    public function addPlat(Plat $plat)
    {
        $query      = Requetes::INSERT_PLAT;
        try {
            $statement  = $this->conn->prepare($query);
            $statement->bindValue(1, $plat->getId());
            $statement->bindValue(2, $plat->getLibelle());
            $statement->bindValue(3, $plat->getPrix());
            $statement->bindValue(4, $plat->getCategorie()->getId());
            $statement->execute();
        } catch (\Exception $e) {
            echo ('Erreur : ' .  $e->getCode() . ' - ' . $e->getMessage());
            throw $e;
        }
    }
}
