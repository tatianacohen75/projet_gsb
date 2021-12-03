<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

    <fieldset>
      <legend>Entrez les donn&#233;es sur le v&#233;hicule &agrave; modifier </legend>
      <label> identifiant:</label>
      <label> <? php echo $veh["id"]; ?> </label>
      <input type="text" name="id" value="<?php echo $id; ?>" size="10" /><br />
      
      <label>marque :</label>
      <input type="text" name="marque" size="10" /><br />
      
      <label>mod&egrave;le:</label>
      <input type="text" name="modele" size="10" /><br />

      <label>couleur :</label>
      <input type="text" name="couleur" size="10" /><br />

      <label>km :</label>
      <input type="text" name="km" size="10" /><br />

      <label>type d'essence :</label>
      <input type="text" name="typeessence" size="10" /><br />

      <label>plein :</label>
      <input type="text" name="plein" size="10" /><br />

      <label>d&#233;fauts:</label>
      <input type="text" name="defauts" size="10" /><br />



    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
 
   
  </form> 
</div>



