<?php
namespace projet1\metier;

class Categorie {
    private int     $id;
    private String  $libelle;

    public function __construct($id, $libelle) {
        $this->id       = $id;
        $this->libelle  = $libelle;
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

    public function __toString() {
        return '[Categorie : '.$this->id . ',' . $this->libelle .']';
    }
}