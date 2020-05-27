<?php
namespace Samuel\Member;

use Samuel\Database\Database;
use Samuel\ListingError\Member\MemberMessageError;

class Member
{

    public static function createUser(){

        if(isset($_POST['inscription'])){
            $pseudo = trim($_POST['pseudo']); // trim = enlever les espaces
            $pass = $_POST['psw'];
            $repass = $_POST['repass'];

            $password_crypt = password_hash($pass, PASSWORD_BCRYPT);

            if(empty($pseudo) || empty($pass) || empty($repass)){
                MemberMessageError::emptyField();
            }else{
                if ($pass != $repass){
                    MemberMessageError::samePass();
                }else{
                    $req = Database::count("SELECT id FROM members where pseudo = :pseudo",array(':pseudo' => $pseudo));

                    if($req != 0){
                        MemberMessageError::userAlreadyUse();
                    }else{
                        $req = Database::prepare("INSERT INTO members(pseudo,password,date_inscription) VALUES(:pseudo,:password,Now())",array(':pseudo' => $pseudo,':password' => $password_crypt), false);

                        MemberMessageError::registerSuccess();
                    }

                }
            }
        }
    }

    public static function logUser()
    {
        if (isset($_POST['connexion'])) {
            $pseudo = trim($_POST['pseudo']); // trim = enlever les espaces
            $pass = $_POST['psw'];

            if (empty($pseudo) || empty($pass)) {
                MemberMessageError::emptyField();
            } else {

                $req = Database::prepare("SELECT * FROM members where pseudo = :pseudo",array(':pseudo' => $pseudo),true,true);
                $count_user = Database::count("SELECT * FROM members where pseudo = :pseudo",array(':pseudo' => $pseudo));

                if ($count_user != 0) {
                    if (password_verify($pass, $req["password"])) {

                        $_SESSION['user'] = $pseudo;
                        $_SESSION['id'] = $req["id"];
                        if($req['admin'] == 1){
                            $_SESSION['admin'] = 1;
                        }

                        header('Location: user');
                    } else {
                        MemberMessageError::wrongPassword();
                    }

                } else {
                    MemberMessageError::userNotExist();
                }

            }
        }
    }
}