<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Restitution d'un v&#233;hicule </legend>
    <label> votre r&#233;f&#233;rence: </label> <input type="text" placeholder=""name="refVis" size="10" /><br />
    <label> r&#233;f&#233;rence du v&#233;hicule: </label> <input type="text" name="refMat" size="20" /><br />
    <label> date d'emprunt: </label> <input type="text" name="dateAttri" size="20" /><br />
    <label> date de restitution: </label> <input type="text" name="dateResti" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p/>
</form>
</div>