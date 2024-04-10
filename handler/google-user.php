<?php

require_once ('../class/Database.php');

class Create
{
    private static $first_name;
    private static $last_name;
    private static $email;

    public static function main()
    {
        self::$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
        self::$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
        self::$email = (isset($_POST['email'])) ? $_POST['email'] : '';

        self::audit();
    }

    private static function audit()
    {
        if (!empty(self::$first_name) && !empty(self::$last_name) && !empty(self::$email)) {
            self::insert();
        }
    }

    private static function insert()
    {
        $sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `date`) VALUES (?, ?, ?, NOW())";
        $array = [self::$first_name, self::$last_name, self::$email];

        DataBase::insert($sql, $array);
    }
}

echo json_encode(Create::main());

