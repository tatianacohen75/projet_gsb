<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  



if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
$id=lireDonneePost("id","");
$marq=lireDonneePost("marq", "");
$mod=lireDonneePost("mod", "");
$coul=lireDonneePost("couleur", "");
$km=lireDonneePost("km", "");
$typeessence=lireDonneePost("typeessence", "");
$plein=lireDonneePost("plein", "");
$defauts=lireDonneePost("defauts", "");
$image=lireDonneePost("image", "");

$erreur=0;
 if ($id=="")
  {
    $erreur=1;
    $message = "Attention, l'identifiant ne peut &ecirc;tre vide !!!";
    ajouterErreur($tabErreurs, $message);
    $etape= 1;
  } 


  if($erreur==0)
  {
    ajouterVeh($id, $marq, $mod, $coul, $km, $typeessence, $plein, $defauts, $image, $tabErreurs);
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le v&#233;hicule a &#233;t&#233; ajouté";
    }

}
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterFormVeh.php") ;
include($repVues."pied.php") ;
?>
  
