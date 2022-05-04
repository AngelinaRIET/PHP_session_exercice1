<?php
// 01 *** ICI : IL FAUT DÉMARRER LA SESSION (TOUJOURS)

session_start(); 



// VARIABLES (PAS TOUCHE)
$message = ''; // <= MESSAGE À DESTINATION DE L'UTILISATEUR (PAS TOUCHE)

/***************************************************************************************
*                  02 - DEMANDE D'AJOUT D'UNE VARIABLE VIA LE FORMULAIRE               *
****************************************************************************************/

// SI $_POST['varName'] EST DÉFINI ET $_POST['varValue'] EST DÉFINI ALORS

    // RÉCUPÉRER $_POST['varName'] DANS UNE VARIABLE

    // RÉCUPÉRER $_POST['varValue'] DANS UNE VARIABLE

    // ENREGISTRER varValue EN SESSION (EN UTILISANT LE varName)

    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR

    if (isset($_POST['varName']) && isset($_POST['varValue'])) {
        $varName = $_POST['varName'];
        $varValue = $_POST['varValue'];
        $_SESSION[$varName]= $varValue;
        $message = "La variable <strong>$varName</strong> a été ajoutée à la session, sa valeur est <strong>$varValue</strong>";
    }
   

// FIN SI

/***************************************************************************************
*                      03 - DEMANDE DE VIDAGE COMPLET DE LA SESSION                    *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "destroy" ALORS

    // VIDER LA SESSION

    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR

    if (isset($_GET['action']) && $_GET['action'] == 'destroy') {
        session_unset();
        $message = "La session a été vidée. Elle existe toujours mais, puisqu'elle est vide, on considère que l'utilisateur est déconnecté.";
    }

// FIN SI

/***************************************************************************************
*                 04 - DEMANDE DE SUPPRESSION D'UNE VARIABLE DE SESSION                *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "remove" ET QUE $_GET['varName'] EST DÉFINIE ALORS

    // RÉCUPÉRER $_GET['varName'] DANS UNE VARIABLE

    // SI LA VARIABLE DEMANDÉE EST BIEN DANS LA SESSION ALORS

        // DÉTRUIRE LA VARIABLE DE SESSION

        // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
        if (isset($_GET['action']) && isset($_GET['varName']) && $_GET['action'] == 'remove') {
            $varName = $_GET['varName'];

            if(isset($_SESSION[$varName])){
                unset($_SESSION[$varName]);
                $message = "La variable <strong>$varName</strong> a été supprimée de la session";

            }
           
        }

    // FIN SI
// FIN SI


// CHARGEMENT DU TEMPLATE (PAS TOUCHE)
require_once './templates/index.phtml';
