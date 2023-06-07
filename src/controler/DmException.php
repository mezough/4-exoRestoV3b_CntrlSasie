<?php
namespace projet1\controler;

use Exception;
// enumeration
enum MyExceptionCase {
    case ID_MUST_BE_NUMERIC;
    case MIN_LONGUEUR_3;
    case PRIX_MUST_BE_NUMERIC;
    case PRIX_MUST_BE_POSITIF;
    case PLAT_ID_DOUBLON;
    case PLAT_LIBELLE_DOUBLON;
    case FK_CATEGORIE;
    case USER_ERREUR;
}

class DmException extends Exception {
    // private MyExceptionCase $case;

    function __construct(private MyExceptionCase $case){
        // $this->$case = $case;

        match($case){
            MyExceptionCase::ID_MUST_BE_NUMERIC     =>    parent::__construct("L'identifiant doit être un entier numérique", 100),
            MyExceptionCase::PLAT_ID_DOUBLON        =>    parent::__construct("Cet identifiant existe déjà", 101),
            MyExceptionCase::MIN_LONGUEUR_3         =>    parent::__construct("Le nom du plat doit contenir au moins 3 caractères", 200),
            MyExceptionCase::PLAT_LIBELLE_DOUBLON   =>    parent::__construct("Ce nom de plat existe déjà", 201),
            MyExceptionCase::PRIX_MUST_BE_NUMERIC   =>    parent::__construct("Le prix doit être un nombre en centimes", 300),
            MyExceptionCase::PRIX_MUST_BE_POSITIF   =>    parent::__construct("Le prix doit être supérieur à zéro", 301),
            MyExceptionCase::FK_CATEGORIE           =>    parent::__construct("Erreur de sélection de la catégorie", 400),
            MyExceptionCase::USER_ERREUR            =>    parent::__construct("Erreur inattendue !!", 999),
        };
    }
}