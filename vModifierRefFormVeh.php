
<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<script type="text/javascript">
//<![CDATA[


</script>

<?php 
if (isset($message))
  {
?>
    <div class="container"><?php echo $message ?> </div>
<?php
  }
?>
 
<!--Saisir les informations dans un formulaire!-->
<!--Formulaire de suppression à partir de l'identifiant -->

<div class="container">

<form action="" method=post>
<fieldset>
<legend>Entrez l'identifiant du v&#233;hicule &agrave; modifier</legend>
<label>identifiant:</label>
       <input type="text" name="id" size="10" /><br />
</fieldset>
<button type="submit" class="btn btn-primary">Enregistrer</button>
<button type="reset" class="btn">Annuler</button>
</form>

</div>




