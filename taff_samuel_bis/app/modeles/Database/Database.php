<?php
namespace Samuel\Database;
use \PDO;


class Database
{
    private static $db_name;
    private static $db_user;
    private static $db_pass;
    private static $db_host;
    private static $pdo;

    public function __construct($db_name, $db_user = "root", $db_pass = "", $db_host = "localhost")
    {
        self::$db_name = $db_name;
        self::$db_user = $db_user;
        self::$db_pass = $db_pass;
        self::$db_host = $db_host;
    }

    private function getPDO()
    {
        if (self::$pdo == null) {
            $pdo = new PDO('mysql:dbname=' . self::$db_name . ';host=' . self::$db_host . '', self::$db_user, self::$db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }


    public static function query($statement, $one = null)
    {
        $req = self::getPDO()->query($statement);
        if ($one) {
            $datas = $req->fetch(PDO::FETCH_CLASS);
        } else {
            $datas = $req->fetchAll(PDO::FETCH_CLASS);
        }
        return $datas;
    }

    public static function prepare($statement, $attributes, $return = true ,$one = null)
    {
        $req = self::getPDO()->prepare($statement);
        $req->execute($attributes);
        if($return) {
            if ($one) {
                $datas = $req->fetch();
            } else {
                $datas = $req->fetchAll();
            }
        }
        (isset($datas))?  $datas = $datas : $datas = false;
        return $datas;
    }

    public static function count($statement, $attributes)
    {
        $req = self::getPDO()->prepare($statement);
        $req->execute($attributes);

        $datas = $req->rowCount();

        return $datas;
    }
}
