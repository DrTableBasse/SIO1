<?php
session_start();

require_once "../app/modeles/Autoloader.php";
Samuel\Autoloader::register();

(isset($_GET['action']))?  $action = $_GET['action'] : $action = false;
(isset($_GET['page']))?  $page = $_GET['page'] : $page = "home";
\Samuel\Website\siteInterface::hideUrl();

$db = new \Samuel\Database\Database("Taff_Samuel");

ob_start();
switch ($action){
    case "logout":{
        session_destroy();
        header('Location: accueil');
        break;
    }

    default:{
        break;
    }
}

switch ($page){
    case "login":{
        \Samuel\Member\Member::logUser();
        require_once '../app/vues/connexion.inc.php';
        break;
    }

    case "register":{
        \Samuel\Member\Member::createUser();
        require_once '../app/vues/inscription.inc.php';
        break;
    }

    case "shop":{
        require_once '../app/vues/shop.inc.php';
        break;
    }

    case "information":{
        require_once '../app/vues/information.inc.php';
        break;
    }

    case "user":{
        require_once '../app/vues/user.inc.php';
        break;
    }

    case "error":{
        require_once "../app/vues/error.inc.php";
        break;
    }

    case "ajout":{
        require_once "../app/vues/ajoutProduit.inc.php";
        break;
    }

    case"afficherProduit":{
        require_once "../app/vues/afficherProduit.inc.php";
        break;
    }

    default:{
        require_once '../app/vues/accueil.inc.php';
        break;
    }
}

$content = ob_get_clean();
require '../app/vues/template/default.php';
