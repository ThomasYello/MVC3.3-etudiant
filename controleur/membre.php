<?php

class Membre
{

    function __construct()
    {
        require_once "./modele/modele.php";
        $this->ds = new DB();
    }

    function getMemberById($idMembre)
    {
        $strSQL = "select * FROM tbl_membre WHERE id_mbr = ?";
        $paramTab = array($idMembre);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        return $membreResultat;
    }

    public function verifLogin($username, $password) {
        $passwordHash = sha1($password);
        $strSQL = "select * FROM tbl_membre WHERE nom_mbr = ? AND mdp_mbr = ?";
        $paramTab = array($username, $passwordHash);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($membreResultat)) {
            $_SESSION["userId"] = $membreResultat[0]["id_mbr"];
            return true;
        }
    }
    
}
