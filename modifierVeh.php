<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // démarrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();


// DEBUT du contrôleur rechercher.php 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  if (count($_POST)==1)
  {
    
    $id=lireDonneePost("id", "");
    $veh = rechercherId($id, $tabErreurs);
    // Si une fleur est trouvée, on passe à l'étape suivante
    //var_dump($lafleur);
    if (count($veh)>0)
    {
      $etape = 2;
    }
    else
    {
      // Aucune lentille n'est trouvée
      // Afficher un message d'erreur
      $message="Echec de la modification : l'identifiant n'existe pas !";
      ajouterErreur($tabErreurs, $message);
      // Revenir à l'étape 1
      $etape = 1;
    }

  }
  else
  {
    $etape = 3;

$id=lireDonneePost("id", "");
$marq=lireDonneePost("marque", "");
$mod=lireDonneePost("modele", "");
$coul=lireDonneePost("couleur", "");
$km=lireDonneePost("km", "");
$typeessence=lireDonneePost("typeessence", "");
$plein=lireDonneePost("plein", "");
$defauts=lireDonneePost("defauts", "");

modifierVeh($id, $marq, $mod, $coul, $km, $typeessence, $plein, $defauts, $image, $tabErreurs);

   // Message de réussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le vehicule a été correctement modifié";
    }
  }
}




// Construction de la page Modifier
// pour l'affichage (appel des vues)

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");

switch ($etape)
{
  case 1 :
   include($repVues."vModifierRefFormVeh.php");
   break;
  case 2 :
   include($repVues."vModifierFormVeh.php");
   break;
}
include($repVues."pied.php") ;
?>
  
