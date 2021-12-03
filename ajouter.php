<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$erreur=0;


if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
$mat=lireDonneePost("mat", "");
$nom=lireDonneePost("nom", "");
$pren=lireDonneePost("pren", "");
$adresse=lireDonneePost("adresse", "");
$codepost=lireDonneePost("codepost", "");
$ville=lireDonneePost("ville", "");

 if (strlen($ville)>8)
  {
    $erreur=1;
    $message = "Attention, la ville ne doit pas d&#233;passer 8 caracteres !!!";
    ajouterErreur($tabErreurs, $message);
   
  } 



 if ($mat=="")
  {
    $erreur=1;
    $message = "Attention, la matricule ne peut &ecirc;tre vide !!!";
    ajouterErreur($tabErreurs, $message);
    $etape= 1;
  } 


  if($erreur==0)
  {
    ajouter($mat, $nom, $pren, $adresse, $codepost, $ville,$tabErreurs);
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "La matricule a &#233;t&#233; ajout&#233;e";
    }

}
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterForm.php") ;
include($repVues."pied.php") ;
?>
  
