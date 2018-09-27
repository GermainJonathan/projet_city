<?php

//retourne l'alerte correcte
function choixAlert($message)
{
  $alert = array();
  switch($message)
  {
    case 'connexion':
      $alert['messageAlert'] = ERREUR_CONNECT_BDD;
      break;
    case 'login' :
      $alert['messageAlert'] = ERREUR_INSCRIPTION;
      break;
    case 'query' :
      $alert['messageAlert'] = ERREUR_QUERY_BDD;
      break;
    case 'url_non_valide' :
      $alert['messageAlert'] = TEXTE_PAGE_404;
      break;
    default :
      $alert['messageAlert'] = MESSAGE_ERREUR;
  }
  return $alert;
}

function getLangage(){

    if(isset($_SESSION["lang"]))
        return $_SESSION["lang"];
    else
    {
        $lang = explode('-',$_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];

        $manager = new manager();
        $listPays = $manager->getPays();

        foreach ($listPays as $pays){
            if($pays->getLibelleCourt() == $lang) {
                $_SESSION["lang"] = $pays->getFicher();
                return $pays->getFicher();
            }
        }
        return "FR-fr";
    }

}