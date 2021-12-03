<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsbvisiteurs'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
 
    return $connect;
}

function lister_visiteurs()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT * FROM `visiteur` ";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
      
    {
    	
        $vis[$i]['mat']=$ligne['VIS_MATRICULE'];
        $vis[$i]['nom']=$ligne['VIS_NOM'];
        $vis[$i]['pren']=$ligne['VIS_PRENOM'];
        $vis[$i]['adresse']=$ligne['VIS_ADRESSE'];
        $vis[$i]['codepost']=$ligne['VIS_CP'];
        $vis[$i]['ville']=$ligne['VIS_VILLE'];
        
       
        

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $vis;


}

function lister_vehicules()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT * FROM `vehicules` ORDER BY (marque)";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
      
    {
      
        $veh[$i]['id']=$ligne['id'];
        $veh[$i]['marq']=$ligne['marque'];
        $veh[$i]['mod']=$ligne['modele'];
        $veh[$i]['coul']=$ligne['couleur'];
        $veh[$i]['km']=$ligne['km'];
        $veh[$i]['typeessence']=$ligne['typeessence'];
        $veh[$i]['plein']=$ligne['plein'];
        $veh[$i]['defauts']=$ligne['defauts'];
        $veh[$i]['image']=$ligne['imageVehicule'];
        

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $veh;
}


function lister_pannes()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT * FROM `pannes` ";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
      
    {
        $p[$i]['idP']=$ligne['idPanne'];
        $p[$i]['idVehicule']=$ligne['idVeh'];
        $p[$i]['libPanne']=$ligne['libellePanne'];
      

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $p;
}

function lister_Emprunter()
{
    $connexion = connecterServeurBD();
   
    $requete="SELECT * FROM `attribuer` ";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
      
    {
        $vis[$i]['refVis']=$ligne['RefVisiteur'];
        $vis[$i]['refVeh']=$ligne['RefVehicule'];
        $vis[$i]['justificatif']=$ligne['justificatif'];
        $vis[$i]['dateAttrib']=$ligne['DateAttribution'];
        $vis[$i]['dateRes']=$ligne['DateRestitution'];
        

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $vis;
}

function ajouter($mat, $nom, $pren, $adresse, $codepost, $ville, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE= '".$mat."';"; 

   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    echo $requete;
  $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet 
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la matricule existe d&#233;j&agrave; !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into visiteur"
       ."(VIS_MATRICULE, VIS_NOM, VIS_PRENOM ,VIS_ADRESSE, VIS_CP, VIS_VILLE) values ('"
       .$mat."','"
       .$nom."','"
       .$pren."','"
       .$adresse."','"
       .$codepost."','"
       .$ville."');";

   
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        echo $requete; 
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a &#233;t&#233; correctement ajout&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a &#233;chou&#233;!!!";
          ajouterErreur($tabErr, $message);
        } 
  
    }
}


function ajouterPannes($id, $idVehicule, $libPanne, &$tabErr)
{

// Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select idVeh from pannes";
    $requete=$requete." where idVeh= '".$id."';"; 

   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    echo $requete;
  $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet 
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : l'identifiant existe d&#233;j&agrave; !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into pannes"
       ."(idVeh,libellePanne) values ('"
       .$id."','"
       .$libPanne."');";
   
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        echo $requete; 
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le panne a &#233;t&#233; correctement ajout&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout de la panne a &#233;chou&#233; !!!";
          ajouterErreur($tabErr, $message);
        } 
  
    }
}

function ajouterVeh($id, $marq, $mod, $coul, $km, $typeessence, $plein, $defauts, $image,  &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicules";
    $requete=$requete." where id= '".$id."';"; 

   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    echo $requete;
  $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet 
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le v&#233;hicule existe d&#233;j&agrave; !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into vehicules"
       ."(id,marque,modele,couleur,km,typeessence,plein,defauts,imageVehicule) values ('"
       .$id."','"
       .$marq."','"
       .$mod."','"
       .$coul."','"
       .$km."','"
       .$typeessence."','"
       .$plein."','"
       .$defauts."','"
       .$image."');";
   
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        echo $requete; 
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le v&#233;hicule a &#233;t&#233; correctement ajout&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du v&#233;hicule a &#233;chou&#233;!!!";
          ajouterErreur($tabErr, $message);
        } 
  
    }
}

function rechercherMat($mat)
{
    $connexion = connecterServeurBD();
    
    $vis = array();
   
    $requete="SELECT * FROM `visiteur` ";
      $requete=$requete." where  VIS_MATRICULE like '%".$mat."%';";
      
    echo $requete;
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        
        $vis[$i]['mat']=$ligne['VIS_MATRICULE'];
        $vis[$i]['nom']=$ligne['VIS_NOM'];
        $vis[$i]['pren']=$ligne['VIS_PRENOM'];
        $vis[$i]['adresse']=$ligne['VIS_ADRESSE'];
        $vis[$i]['codepost']=$ligne['VIS_CP'];
        $vis[$i]['ville']=$ligne['VIS_VILLE'];

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $vis;
}

function rechercherId($id)
{
    $connexion = connecterServeurBD();
    
    $veh = array();
   
    $requete="SELECT * FROM `vehicules` ";
      $requete=$requete." where  id like '%".$id."%';";
      
    echo $requete;
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        
        $veh[$i]['id']=$ligne['id'];
        $veh[$i]['marq']=$ligne['marque'];
        $veh[$i]['mod']=$ligne['modele'];
        $veh[$i]['coul']=$ligne['couleur'];
        $veh[$i]['km']=$ligne['km'];
        $veh[$i]['typeessence']=$ligne['typeessence'];
        $veh[$i]['plein']=$ligne['plein'];
        $veh[$i]['defauts']=$ligne['defauts'];
        $veh[$i]['image']=$ligne['imageVehicule'];

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $veh;
}

function rechercherPannes($idP)
{
    $connexion = connecterServeurBD();
    
    $p = array();
   
    $requete="SELECT * FROM `pannes` ";
      $requete=$requete." where  idPanne like '%".$idP."%';";
      
    echo $requete;
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        
        $p[$i]['idP']=$ligne['idPanne'];
        $p[$i]['idVehicule']=$ligne['idVeh'];
        $p[$i]['libPanne']=$ligne['libellePanne'];
       

        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $p;
}
function modifier($mat, $nom, $pren, $adresse, $codepost, $ville, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();

  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {

    // Vérifier que le matricule saisie n'existe pas déja
$requete="select * from `visiteurs`";
    $requete=$requete." where VIS_MATRICULE= '".$mat."';";
              

    $jeuResultat=$connexion->query($requete);

     // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    
      // Créer la requête d'ajout 
       $requete="UPDATE visiteur SET VIS_NOM = '$nom',
      VIS_PRENOM = '$pren', VIS_ADRESSE= '$adresse', VIS_CP='$codepost', VIS_VILLE='$ville'
     WHERE visiteur.VIS_MATRICULE='$mat';";
     echo $requete;

        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a &#233;t&#233; correctement modifi&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur a &#233;chou&#233; !!!";
          ajouterErreur($tabErr, $message);
        } 


    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
  
function modifierVeh($id, $marq, $mod, $coul, $km, $typeessence, $plein, $defauts, &$tabErr)
{
  
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from `vehicules`";
    $requete=$requete." where id = '".$id."';";
              
   
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    // Cr�er la requ�te de modification 
  
    $requete= "UPDATE `vehicules` SET
    `marque` = '$marq',
    `modele` = '$mod',
    `couleur`='$coul',
    `km`='$km',
    `typeessence`='$typeessence',
    `plein`='$plein',
    `defauts`='$defauts',
    `imageVehicule`='image'
    
     WHERE `vehicules`.`id`='".$id."';";
     echo $requete;
         
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le v&#233;hicule a &#233;t&#233; correctement modifi&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du v&#233;hicule a &#233;chou&#233;!!!";
          ajouterErreur($tabErr, $message);
        } 
    }
  


function supprimer($mat, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $vis = array();
    $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE = '".$mat."';";
  
      $jeuResultat=$connexion->query($requete);
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ);
     $ligne = $jeuResultat->fetch();
     if ($ligne)
     { 
          
    $requete="delete from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';";
    
    // Lancer la requ�te supprimer
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "La matricule a &#233;t&#233; correctement supprim&#233;e";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression de la matricule a &#233;chou&#233; !!!";
          ajouterErreur($tabErr, $message);
        }
       }
       else
       {
        $message="Echec de la suppression : la matricule du visiteur n'existe pas";
        ajouterErreur($tabErr, $message);
       } 
 echo $requete;
}

function supprimerVeh($id, &$tabErr)
{
    $connexion = connecterServeurBD();
    
    $veh= array();
    $requete="select * from `vehicules` ";
      $requete=$requete." where id='".$id."';";
  echo $requete;
      $jeuResultat=$connexion->query($requete);
     $ligne = $jeuResultat->fetch();
     if ($ligne)
     { 
          
    $requete="delete from vehicules";
    $requete=$requete." where id='".$id."';";
    
    // Lancer la requ�te supprimer
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le v&#233;hicule a &#233;t&#233; correctement supprim&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du v&#233;icule a &#233;chou&#233; !!!";
          ajouterErreur($tabErr, $message);
        }
       }
       else
       {
        $message="Echec de la suppression : l'identifiant du v&#233;hicule n'existe pas";
        ajouterErreur($tabErr, $message);
       } 

}


function emprunter($uneRefVisiteur, $uneRefVeh, $unJustificatif, $uneDateAtt, $tabErreurs)
{
 // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
    // Vérifier que la référence saisie existe
    $requete="select * from  attribuer";
    $requete=$requete." where RefVehicule = '".$uneRefVeh."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if(!$ligne)
    {
    // Vérifier que le matricule du visiteur existe
    
      $requete="select * from visiteur";
      $requete=$requete." where VIS_MATRICULE  = '".$uneRefVisiteur."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
      
      $ligne = $jeuResultat->fetch();
      
      if(!$ligne)
        {
          $message="la matricule du visiteur n'existe pas !";
          ajouterErreur($tabErr, $message); 
        }
        
     else
        {    
          
          // Vérifier que le véicule n'est pas déjà emprunté et que le véhicule a été restitué
          $requete="select * from attribuer";
          $requete=$requete." where RefVehicule = '".$uneRefVeh."'";
          $requete=$requete." and DateRestitution is null";
          
          echo $requete;

          $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
           
           $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
           
           $ligne = $jeuResultat->fetch();
           
            if($ligne)
              {
                $message="le v&#233;hicule est d&eacutej&agrave emprunt&eacute !";
                ajouterErreur($tabErr, $message);
              }
              
              else 
              {
                  // Vérifier que le format de la date est conforme
                  if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $uneDateAtt))
                    {
                        echo 'La date ' . $uneDateAtt . ' n\'est pas valide ! Le format attendu est yyyy-mm-dd.';
                    }
                
                  else
                    {                              
                      // Créer la requête d'ajout d'un emprunt
                       $requete="insert into attribuer"
                       ."(RefVisiteur,RefVehicule,justificatif,DateAttribution) values ('"
                       .$uneRefVisiteur."','"
                       .$uneRefVeh."','"
                       .$unJustificatif."','"
                       .$uneDateAtt."');";
                   echo $requete;
                       
                        // Lancer la requête d'ajout
                        
                        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
                               
                           // Si la requête a réussi
                          if ($ok==TRUE)
                          {
                            $message = "L'emprunt a &#233;t&#233; correctement ajout&#233;";
                            ajouterErreur($tabErr, $message);
                          }
                        
                          else
                          {
                            $message = "L'emprunt n'a pas &#233;t&#233; ajout&#233;";
                            ajouterErreur($tabErr, $message);
                          }
                }
            }
        }
        
      
      
    }
    
    else
    {
        $message="Echec de l'ajout : l'identifiant du v&#233;hicule n'existe pas !";
      ajouterErreur($tabErr, $message);
    }
}   
  else
  {
    $message = "probl&egrave;me &agrave; la connexion <br />";
    ajouterErreur($tabErr, $message);
  }

}

function RestituerVehicules($uneRefVisiteur, $uneRefVeh, $uneDateAtt, $uneDateResti, $tabErreurs)
{
// Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
 
  // Si la connexion au SGBD à réussi
  if (TRUE)
  {
    // Vérifier que la référence n'a pas déjà été restituer
    $requete="select * from attribuer";
    $requete=$requete." where DateRestitution = '".$uneDateResti."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet    
   
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la mat&#233;riel a d&#233;j&agrave; &#233;t&#233; restitu&#233;!";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout
       $requete="update attribuer set  DateRestitution = '".$uneDateResti."' where RefVisiteur = '".$uneRefVisiteur."' and RefVehicule = '".$uneRefVeh."';";
       
        // Lancer la requête d'ajout
        
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le v&#233;hicule a &#233;t&#233; correctement restitu&#233;";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Le v&#233;hicule n'a pas &#233;t&#233; restitu&#233;";
          ajouterErreur($tabErr, $message);
        }

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl&egrave;me &agrave; la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
 



?>
