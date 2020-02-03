<?php
$page =  (!empty($_GET['page']) ? $_GET['page'] : 0 );
$page = ($page <= 0 ? 1 :$page);
include "vueHeader.php";

include "vueMenu.php";

?>
  <section id="pageContent">
  <article>
    <br><h1> Annuaire des employés </h1>
  </article>
    <article>
      <!-- ------------------------------------------- Formulaire Recherche  ---------------------------------------- -->
      <form action='index.php?action=Rechercher' method='POST'>
        <table class="table_annuaire">
          <tr> 
            <td> <input type='text' name='id' id='id' disabled > </td>
            <td> <input type='text' name='nom' id='nom' ></td> 
            <td> <input type='text' name='prenom' id='prenom' ></td>
            <td> <input type='text' name='tel' id='tel' ></td> 
            <td colspan='2'> <input type='submit' name='action' value='Rechercher'></td>
          </tr>
        </table>
      </form>
    </article>
    <article>
      <!-- ------------------------------------------- Formulaire accueil  ---------------------------------------- -->
 <?php
$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$limite = 5;

$debut = ($page - 1) * $limite;
?>

      <table class="table_annuaire">
        <?php
        echo "<thead>";
          echo "<tr>";
            echo "<th>#</th>";
             echo "<th>Nom</th>";
            echo "<th>Prénom</th>";
            echo "<th>Téléphone</th>";
          echo "</tr>";
        echo "</thead>";
        
        echo "<tbody>";
          $tblEmp = (empty($tblEmp) ? $tblEmp=array() : $tblEmp);
          foreach ($tblEmp as $employe) {
            echo "<form action='index.php?action=Accueil' method='POST'>";
            echo 
            "<tr>" 
                ."<td>"."<input readonly type='text' name='ide' id='ide' value=".$employe['emp_id']."></td>"
                ."<td>"."<input type='text' name='nom' id='nom' value='".$employe['emp_nom'] . "'></td>"  
                ."<td>"."<input type='text' name='prenom' id='prenom' value='".$employe['emp_pnom'] . "'></td>" 
                ."<td>"."<input type='text' name='tel' id='tel' maxlength='10' value='".$employe['emp_tel'] . "'></td>".
            "</tr>";
            echo "</form>";
          }
        echo "</tbody>";
        ?>
      </table>
      <a href="?page=<?php echo $page - 1; ?>">Page précédente</a> 
      — 
      <a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
      </article>
      <?php include "vueAjout.php"; ?>
  </section>
<?php include "vueFooter.php"; ?>
