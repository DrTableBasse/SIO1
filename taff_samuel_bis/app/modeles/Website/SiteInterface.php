<?php
namespace Samuel\Website;

class siteInterface
{

    private function findWord($word,$phrase)
    {
        $findWord = strpos($phrase, $word);

        /*
         * @return true -> Word doesn't find
         * @return false -> Word as been find
         */
        if ($findWord == false) {
            return true;
        } else {
            return false;
        }
    }

    public static function hideUrl(){
        $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
        $banWord = array(
            "?page",
            "?test"
        );
        $count_BanList = count($banWord);
        for ($i = 0; $i < $count_BanList; $i++ ){
            $findWord = self::findWord($banWord[$i],$url);
            if($findWord == false){
                header("Location: ../index.php");
            }
        }
    }
    public static function slugify($string)
    {
        $cleanedString = trim(strtolower($string));
        // Delete special characters
        $cleanedString = preg_replace("/[^a-z0-9-'_ ]/", "", $cleanedString);
        // Replace whitespace by -
        $cleanedString = preg_replace("/[' ]/", "-", $cleanedString);
        // Too much -
        $cleanedString = preg_replace("/[-]{2,}/", "-", $cleanedString);
        $cleanedString = preg_replace("/[-]{2,}[_' ]/", "-", $cleanedString);

        return $cleanedString;
    }
    public static function banWordList($message){
        //un json, un fichier txt que t'explode en php ou une bdd
        $banWord = array(
            "fils de pute",
            "fdp",
            "f d p",
            "f.d.p",
            "nique ta mere",
            "ntm",
            "n t m",
            "n.t.m",
            "nazi",
            "pd"
        );
        $count_BanList = count($banWord);
        for ($i = 0; $i < $count_BanList; $i++ ){
            $findWord = self::findWord($banWord[$i],$message);
            if($findWord == false){
                return true;
            }
        }

    }


}