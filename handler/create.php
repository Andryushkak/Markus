<?php

require_once ('../class/Database.php');

class create
{
    private static $first_name;
    private static $last_name;
    private static $email;
    private static $image;
    private static $password;

    public static function main()
{
    self::$first_name = (isset( $_POST['first_name'] ) ) ? $_POST['first_name'] : '';
    self::$last_name  = (isset( $_POST['last_name' ] ) ) ? $_POST['last_name' ] : '';
    self::$email      = (isset( $_POST['email'     ] ) ) ? $_POST['email'     ] : '';
    self::$image      = (isset( $_POST['image'     ] ) ) ? $_POST['image'     ] : '';
    self::$password   = (isset( $_POST['password'  ] ) ) ? $_POST['password'  ] : '';

    DataBase::connect(); // Establish database connection

    self::audit();
}


    private static function audit()
    {
        if ( !empty( self::$first_name) && !empty( self::$last_name) &&
         !empty( self::$email) && !empty( self::$password) )
         {
            self::email();
         }
    }

    private static function email()
    {
        if (filter_var(self::$email, FILTER_VALIDATE_EMAIL)) self::insert();
        
    }

    
    

    private static function insert()
{
    $password = password_hash(self::$password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `password`, `date`, `image` )
    VALUES (?, ?, ?, ?, NOW(), ?)";

    $array = [self::$first_name, self::$last_name, self::$email, $password, self::$image];

    try {
        DataBase::insert($sql, $array);
        echo json_encode(["status" => "success", "message" => "Ви успішно зареєстровані"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Помилка вставки даних в базу даних: " . $e->getMessage()]);
    }
}

}


echo json_encode( create::main() );

print "<pre>";
var_dump($_POST);
print "</pre>";
