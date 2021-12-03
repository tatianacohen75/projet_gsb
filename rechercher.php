<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");

$vis=array();
 
if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $vis=  rechercherMat($_POST['mat']);
}
 
// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php") ;
include($repVues."vRechercherForm.php") ;

if ($etape==2)
{

  include($repVues."vListerVis.php");
}
include($repVues."pied.php") ;
?>