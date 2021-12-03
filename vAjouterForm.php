
<img  src="images/GSBlogo.png" alt="logo gsb" align = left hspace ="0"/>

<script type="text/javascript">
//<![CDATA[

//function valider(){
// frm=document.forms['formAjout'];
  // si le prix est positif
//  if(frm.elements['prix'].value >0) {
    // les données sont ok, on peut envoyer le formulaire    
   // return true;
//  }
  //else {
    // sinon on affiche un message
  //  alert("Le prix doit être positif !");
    // et on indique de ne pas envoyer le formulaire
  //  return false;
//}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <tr>
    <legend>Entrez les donn&eacute;es du visiteur &agrave; ajouter </legend>
    <table border=0>
    <label>matrciule :</label> <input type="text" name="mat" size="10" /><br />
                                                                     
    <label>nom :</label> <input type="text" name="nom" size="10" /><br />
      
   <label>pr&#233;nom:</label> <input type="text" name="pren" size="10" /><br />

  <label>adresse:</label> <input type="text" name="adresse" size="10" /><br />
   
    <label>code postal:</label> <input type="text" name="codepost" size="10" /><br />
  
    <label>ville:</label> <input type="text" name="ville" size="10" /><br /> 
  

  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


