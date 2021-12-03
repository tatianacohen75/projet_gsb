
<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<script type="text/javascript">

</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend><center>Ajouter une panne </center></legend>

       <center>
    

      <div class="btn btn-info">

        
    <label>identifiant du vehicule :</label> 
      
      <?php 
    $connect = connecterServeurBD();
    $resultat = $connect->query('select distinct id from vehicules order by id ASC');
    $resultat-> setFetchmode(PDO::FETCH_OBJ);
    ?>
    <select name="id">
    <?php
        while ($ligne=$resultat->fetch())
        {
        ?><option><?php echo "".$ligne->id; ?></option><?php 
        }
        ?> 
    </select>
    
<label>description de la panne:</label> <input type="text" name="libellePanne" size="10" /><br />

      <button type="submit" class="btn btn-success">Enregistrer</button>
      
      </center><fieldset>
    </div>
  </form>
</div>


    <center>

    
   
  </fieldset>

  </center>
  <p />
</form>
</div>


