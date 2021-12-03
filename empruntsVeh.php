<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$uneRefVisiteur=lireDonneePost("RefVisiteur", ""); 
$uneRefVeh=lireDonneePost("RefVehicule", ""); 
$unJustificatif=lireDonneePost("justificatif", ""); 
$uneDateAtt=lireDonneePost("DateAttribution", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  emprunter($uneRefVisiteur, $uneRefVeh, $unJustificatif, $uneDateAtt, $tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vEmprunter.php");
include($repVues."pied.php") ;
?>
  
