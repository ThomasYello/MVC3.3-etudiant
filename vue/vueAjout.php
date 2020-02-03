      <!-- ------------------------------------------- Formulaire ajout ---------------------------------------- -->
      <article>
        <h1>Ajouter un employé</h1>
        <br>
        <form action="index.php?action=Accueil" method="POST">
          <fieldset>
            <input type="text" name="nom" id="nom"  minlength='2' maxlength='50' placeholder="Nom"><br><br>
            <input type="text" name="prenom" id="prenom"  minlength='2' maxlength='50' placeholder="Prénom"> <br><br>
            <input type="text" name="tel" id="tel" placeholder="Numéro de Téléphone"><br><br>
            <input type="submit" name="action" value="Ajouter">
            <br><br>
          </fieldset>
        </form>
      </article>