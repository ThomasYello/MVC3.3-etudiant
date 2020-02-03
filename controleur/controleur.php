<?php

require_once("./modele/modele.php");

class Employes extends DB {

  function getSelect(){

    $strSQL = "SELECT * FROM employe";
    $tabValeur = array("*");
    $sel = $this->Requete($strSQL, $tabValeur);
    return $sel;
  }

  function setDelete($id){

    $strSQL = "DELETE FROM employe WHERE emp_id = ?";
    $tabValeur = array($id);
    $del = $this->Requete($strSQL, $tabValeur);
    return $del;
  }

  function setAdd($tblemp){

    $strSQL = "INSERT INTO employe (emp_pnom,emp_nom,emp_tel) VALUES (UCASE(?), UCASE(?),UCASE(?) )";
    $tabValeur = array(
      $tblemp['nom'],
      $tblemp['prenom'],
      $tblemp['tel']

    );
    $ins = $this->Requete($strSQL, $tabValeur);
    return $ins;
}

  function setUpdate($tblemp){

    $strSQL = "UPDATE employe SET emp_pnom = UCASE(:pnom), emp_nom = UCASE(:nom), emp_tel = :tel WHERE emp_id = :ide;";

    $tabValeur = array(
      'pnom'  => $tblemp['prenom'], 
      'nom'   => $tblemp['nom'], 
      'tel'   => $tblemp['tel'],
      'ide'   => $tblemp['ide'],
    );
    
    $upd = $this->Requete($strSQL, $tabValeur);
    return $upd;
  }

  function Search($tblemp){

    $strSQL = "SELECT * FROM employe 
                WHERE emp_pnom LIKE  :pnom 
                OR emp_nom     LIKE  :nom 
                OR emp_tel     LIKE  :tel 
              ";

    empty($tblemp['prenom'])  ? $tblemp['prenom'] = '*' : $tblemp['prenom']; 
    empty($tblemp['nom'])     ? $tblemp['nom']    = '*' : $tblemp['nom']; 
    empty($tblemp['tel'])     ? $tblemp['tel']    = '*' : $tblemp['tel']; 

    $tabValeur = array(
          'pnom'  => "%".$tblemp['prenom']."%", 
          'nom'   => "%".$tblemp['nom']."%", 
          'tel'   => "%".$tblemp['tel']."%"
        );

    $sch = $this->Requete($strSQL, $tabValeur);
    return $sch;
    }

   
}

class Pagination extends DB {
 
  private $requete;            // valeur liée à une fonction
  private $value_bind_func;    // valeur liée à une fonction
  private $page;
  private $limite;
  private $nombreLignes;
  private $nombreElementsTotal;
  private $nombreDePages;
  private $debut;

  function compteLignes() {

    $strSQL = "SELECT SQL_CALC_FOUND_ROWS * FROM tbl_employe ORDER BY emp_nom  LIMIT :limite OFFSET :debut";
    $strSQL->bindValue('limite',$limite,PDO::PARAM_INT);
    $strSQL->bindValue('debut',$debut,PDO::PARAM_INT);
    $tabValeur = array("*");
    ;
    return $this->Requete($strSQL, $tabValeur);
  }

}


?>