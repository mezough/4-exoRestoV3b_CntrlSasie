<?php

namespace projet1\dao;

class Requetes
{

    const S_PLATS                   = "SELECT idP, libelleP, prixP FROM plat";
    const S_CATEGORIES              = "SELECT idC, libelleC FROM categorie order by idC";
    const GET_PLATS_BY_CATEGORIE    = "SELECT idP, libelleP, prixP FROM plat where idC = ?";
    const GET_CATEGORIE_BY_ID       = "SELECT idC, libelleC from categorie where idC = ?";
    const INSERT_PLAT               = "INSERT into plat (idP, libelleP, prixP, idC) values (?,?,?,?)";
    const GET_PLAT_BY_ID            = "select idP, libelleP, prixP, categorie.idc,libellec
                                        from plat,categorie where plat.idc=categorie.idc and idP = ? order by idp";
}
