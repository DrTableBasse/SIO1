<?php
namespace Samuel\ListingError\Member;

class MemberMessageError
{

    public static function emptyField(){
        echo "<p class='error'>Veuillez remplir tout les champs</p>";
    }

    public static function userAlreadyUse(){
        echo "<p class='error'>Pseudo déja utilisé </p>";
    }

    public static function samePass(){
        echo "<p class='error'>Veuillez rentrer le même mot de passe </p>";
    }

    public static function registerSuccess(){
        echo "<p class='error'>Inscription effectuée avec succès</p>";
    }

    public static function wrongPassword(){
        echo "<p class='error'>Mot de passe incorrect </p>";
    }

    public static function userNotExist(){
        echo "<p class='error'>Utilisateur inexistant </p>";
    }

}