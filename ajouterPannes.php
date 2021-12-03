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
$idVehicule=lireDonneePost("idVeh","");
$libPanne=lireDonneePost("libellePanne", "");
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
    ajouterPannes($id, $idVehicule, $libPanne, $tabErreurs);
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "L'identifiant a &#233;t&#233; ajout &eacute;";
    }

}
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterPanne.php") ;   
include($repVues."pied.php") ;

  
