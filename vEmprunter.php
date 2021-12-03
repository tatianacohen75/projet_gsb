<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le prix doit être positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>


<!--Saisie des informations dans un formulaire!-->
<div class="container">
                                                                  
<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Emprunt d'un v&#233;hicule </legend>
    <label> Id du v&#233;hicule: </label> <input type="text" placeholder="" name="RefVehicule" size="10" /><br />
     <label> matricule du visiteur: </label> <input type="text" placeholder=""name="RefVisiteur" size="10" /><br />
    <label> justificatif: </label> <input type="text" placeholder="" name="justificatif" size="10" /><br />
    <label>date d&eacutebut emprunt :</label> <input type="text" name="DateAttribution" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>