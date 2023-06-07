<?php
namespace projet1\metier;
// require_once('Categorie.php');



require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';
use projet1\metier\Categorie;




class Plat {
    private int         $id;
    private String      $libelle;
    private int         $prix;
    private ? Categorie   $categorie;

    public function __construct(int $id, String $libelle, int $prix, ? Categorie $categorie) {
        $this->id           = $id;
        $this->libelle      = $libelle;
        $this->setPrix($prix);        // en centimes
        $this->categorie    = $categorie;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
    }

    public function getLibelle(): String {
        return $this->libelle;
    }
    public function setLibelle(String $libelle) {
        $this->libelle = $libelle;
    }

    public function getPrix(): int {
        return $this->prix;
    }
    public function getPrixEuro(): float {
        return $this->prix /100;
    }
    public function setPrix(int $prix) {
        if ($prix <100) $prix = 100;
        $this->prix = $prix;
    }

    public function getCategorie(): Categorie {
        return $this->categorie;
    }
    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }
        
    public function __toString() {
        return '[Plat : '.$this->id .', '. $this->libelle .', '. $this->getPrixEuro() .', '. $this->categorie .']';
    }
}