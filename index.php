<?php 
  // Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  
  try {

      if (isset($_REQUEST['action']) || !empty($_REQUEST['action'])) 
      {
        require "./controleur/controleur.php";
        $employe = new Employes();

        if ($_REQUEST['action'] == 'Supprimer') {
          
          $employe->setdelete(intval($_POST['ide']));
         
        } 

        if ($_REQUEST['action'] == 'Ajouter') {
          $employe->setAdd($_POST);
        } 

        if ($_REQUEST['action'] == 'Modifier') {
          $_POST['ide']=intval($_POST['ide']);
          $employe->setUpdate($_POST);
        } 

        if ($_REQUEST['action'] == 'Rechercher') {
          $tblEmp = $employe->Search($_POST);
          include "./vue/vue.php";
        }

        if ($_GET['action'] == 'Admin') {
          
          session_start();

        if (!empty($_SESSION['userId'])) {

          $employe = new Employes();
          $tblEmp = $employe->getSelect();
          
          include "./vue/vueDashboard.php"; 

          }else {

            include "./vue/vueLogin.php";         

          }
        

        if ($_GET['action'] == 'Util') {
          include "./vue/vueLogin.php";
        }
      }
        if ($_GET['action'] == 'Login') {
          session_start();
          $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
          $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
         
          require_once "controleur/membre.php";
          require_once  "controleur/controleur.php";
          $membre = new Membre();
          $employe = new Employes();
          $tblEmp = $employe->getSelect();
          
          $isLoggedIn = $membre->verifLogin($username, $password);


          if (! $isLoggedIn) {
              $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides !";
              include "vue/vueLogin.php";
              exit();
          }
          include "vue/vueDashboard.php";
          exit();
       
        }
        if ($_GET['action'] == 'Accueil') {
          $tblEmp = $employe->getSelect();
          include "./vue/vue.php";
        } 
        
      }else {
        require "./controleur/controleur.php";
        $employes = new Employes();
        $tblEmp = $employes->getSelect();
        include "./vue/vue.php";
      }

      if ( $_GET['action'] == 'Deco') {

        session_start();

        session_destroy();

        include "./vue/vueLogin.php";

    }
    }catch (Exception $e) {
      erreur($e->getMessage());
  }  
  
?>
