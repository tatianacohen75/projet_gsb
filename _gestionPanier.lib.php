<?php
/**
 * Regroupe les fonctions de gestion d'un panier
 * @package default
 * @todo  RAS
 */

/**
 * Ajoute au panier la référence de fleur sélectionnée
 *
 * Conserve en variable session la référence de la fleur
 * @param string ref de la fleur
 * @return void
 */
function creationPanier()
{

    //Si le visiteur est connecte
    
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['id'] = array();
        $_SESSION['panier']['designation'] = array();
        $_SESSION['panier']['prix'] = array();


    }
    return true;
}

function ajouterPanier($id, $designation, $prix)
{
    
    //Si le panier existe
    if (creationPanier()) {
        //Si le produit existe déjà on ajoute seulement la quantité
        $existeProduit = array_search($id, $_SESSION['panier']['id']);

        if ($existeProduit !== false) {

            $_SESSION['panier']['quantite'][$existeProduit] += 1;
            $_SESSION['panier']['totalProduit'][$existeProduit] += $prix;


        } else {
            //Sinon on ajoute le produit
            array_push($_SESSION['panier']['id'], $id);
            array_push($_SESSION['panier']['designation'], $designation);
            array_push($_SESSION['panier']['prix'], $prix);
            array_push($_SESSION['panier']['quantite'], 1);
            array_push($_SESSION['panier']['totalProduit'],$prix) ;


        }
    } else
        echo "Un problème est survenu !";

}


function supprimerArticle($id)
{
    //Si le panier existe
    if (creationPanier()) {
        // panier temporaire
        $tmp = array();
        $tmp['id'] = array();
        $tmp['designation'] = array();
        $tmp['prix'] = array();
        $tmp['quantite'] = array();
        $tmp['totalProduit'] = array();


        $i = 0;
        while ($i < count($_SESSION['panier']['id'])) {
            if ($_SESSION['panier']['id'][$i] !== $id) {
                array_push($tmp['id'], $_SESSION['panier']['id'][$i]);
                array_push($tmp['designation'], $_SESSION['panier']['designation'][$i]);
                array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
                array_push($tmp['quantite'], $_SESSION['panier']['quantite'][$i]);
                array_push( $tmp['totalProduit'],$_SESSION['panier']['totalProduit'][$i]);


            }
            $i++;

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] = $tmp;
        //On efface notre panier temporaire
        unset($tmp);
    } else
        echo "Un problème est survenu.";
}


function modifierQTeArticle($id,$qteProduit){
  //Si le panier éxiste
  if (creationPanier())
  {
    //Si la quantité est positive on modifie sinon on supprime l'article
    if ($qteProduit > 0)
    {
      //Recharche du produit dans le panier
      $positionProduit = array_search($id,  $_SESSION['panier']['id']);

      if ($positionProduit !== false)
      {
        $_SESSION['panier']['quantite'][$positionProduit] = $qteProduit ;
        $_SESSION['panier']['totalProduit'][$positionProduit] = $qteProduit * $_SESSION['panier']['prix'][$positionProduit];


      }
    }
    else
      supprimerArticle($id);
  }
  else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Obtenir le nombre d'éléments du panier
 *
 * @return int
 */
function comptePanier()
{
    $compte = 0;
    if (isset($_SESSION["panier"])) {
        $compte = count($_SESSION["panier"]);
    }
    return ($compte);
}

/**
 * Supprimer la fleur passer en GET
 *
 * @param string : référence de la fleur
 * @return void : retrait effectué
 */
function supprimerPanier($ref)
{
    /**
     * Le probleme dans un panier c'est qu'il s'agit d'un tableau
     * On ne peut pas supprimer l'element d'un tableau en plein milieu on peut supprimer qu'a la fin
     * Il faut deplacer tout les elements du tableau, et supprimer le dernier element du tableau
     */
    array_splice($_SESSION["panier"], array_search($ref, $_SESSION["panier"]), 1);
}

/**
 * Obtenir les références de fleurs du panier
 *
 * @return array
 */
function obtenirPanier()
{
    return ($_SESSION["panier"]);
}

/**
 * supprimer tout les elements du panier
 *
 * @return void
 */


function viderPanier()
{
    unset($_SESSION["panier"]);
}


function totalPanier(){
    $total=0;
    $i=0;
    while($i < count($_SESSION['panier']['id']))
    {
        $total += $_SESSION['panier']['totalProduit'][$i];
        $i++;
    }
    return $total ;
}

?>


