<?php
/**
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
 
$unRefVis=lireDonneePost("refVis", "");
$unRefMat=lireDonneePost("refMat", "");
$uneDateAtt=lireDonneePost("dateAttri", "");
$uneDateResti=lireDonneePost("dateResti", "");


if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  RestituerVehicules($unRefVis, $unRefMat, $uneDateAtt, $uneDateResti, $tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vRestituerVehicules.php");
include($repVues."pied.php") ;
?>