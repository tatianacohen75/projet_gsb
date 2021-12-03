<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

    <fieldset>
      <legend>Entrez la matricule du visiteur &agrave; modifier </legend>
      <label> matricule :</label>
      <input type="text" name="VIS_MATRICULE" value="<?php echo $mat; ?>" size="10" /><br />
      <label>nom :</label>
      <input type="text" name="VIS_NOM"  size="10" /><br />
      <label>pr&#233;nom :</label>
      <input type="text" name="VIS_PRENOM"  size="10" /><br />
      <label>adresse:</label> <input type="text" name="VIS_ADRESSE" size="10" /><br />
   
    <label>code postal:</label> <input type="text" name="VIS_CP" size="10" /><br />
  
    <label>ville:</label> <input type="text" name="VIS_VILLE" size="10" /><br /> 
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>