<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  if (count($_POST)==1)
  {
   $mat=lireDonneePost("mat", "");
   $vis = rechercherMat($mat, $tabErreurs);
    // Si une fleur est trouvée, on passe à l'étape suivante
    //var_dump($lafleur);
    if (count($vis)>0)
    {
      $etape = 2;
    }
    else
    {
      // Aucune fleur n'est trouvée
      // Afficher un message d'erreur
      $message="Echec de la modification : le visiteur n'existe pas !";
      ajouterErreur($tabErreurs, $message);
      // Revenir à l'étape 1
      $etape = 1;
    }
     }
  else
  {
    $etape = 3;
    $mat=$_POST["VIS_MATRICULE"];
    $nom=$_POST["VIS_NOM"];
    $pren=$_POST["VIS_PRENOM"];
    $adresse=$_POST["VIS_ADRESSE"];
    $codepost=$_POST["VIS_CP"];
    $ville=$_POST["VIS_VILLE"];
    
    
    modifier($mat, $nom, $pren, $adresse, $codepost, $ville, $tabErreurs);
    // Message de réussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le visiteur a &eacute;t&eacute; correctement modifi&eacute;";
    }
  }
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1 )
{
include($repVues."vModifierRefForm.php") ;   
}
if ($etape==2)
{
include ($repVues."vModifierForm.php") ; 
}
if ($etape==3)
{
  include($repVues."vAccueil.php");
}
include($repVues."pied.php") ;
?>