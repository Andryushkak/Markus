<?php

class DataBase
{
    private static $PDO_DB;

    public static function main()
    {
        self::$PDO_DB = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ]);
    }

    public static function checkEmailExists($email)
    {
        self::main();

        $sql = "SELECT COUNT(*) FROM `user` WHERE `email` = ?";
        $array = [$email];
        
        $Qdb = self::$PDO_DB->prepare($sql);
        $Qdb->execute($array);
        $result = $Qdb->fetchColumn();

        return $result > 0;
    }

    public static function insert($sql, $array)
    {
        self::main();

        $Qdb = self::$PDO_DB->prepare($sql);
        $Qdb->execute($array);
    }

    public static function select($sql, $array)
    {
        self::main();

        $Qdb = self::$PDO_DB->prepare($sql);
        $Qdb->execute($array);
        return $Qdb->fetch();
    }

    public static function selectAll($sql, $array)
    {
        self::main();

        $Qdb = self::$PDO_DB->prepare($sql);
        $Qdb->execute($array);
        $dbArr = [];
        do {
            $data = $Qdb->fetch();
            if ($data) array_push($dbArr, $data);
        } while ($data);
        return $dbArr;
    }

    public static function insertUser($userData)
    {
        self::main();

        $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `date`) VALUES (?, ?, ?, NOW())";
        $array = [$userData['first_name'], $userData['last_name'], $userData['email']];

        self::insert($sql, $array);
    }

    public static function insertGoogleUser($userData)
    {
        self::main();

        $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `date`) VALUES (?, ?, ?, NOW())";
        $array = [$userData['given_name'], $userData['family_name'], $userData['email']];

        self::insert($sql, $array);
    }
}


