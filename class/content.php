<?php

session_start();

class Content
{
    public static function main()
    {
        $content = ( isset( $_SESSION[ 'mysession' ] ) && !empty( $_SESSION[ 'mysession' ] ) )
            ? self::getContent()
            : self::getForm();

        return [
            '<section>' . $content[0] . '</section>' ,
            $content [1]
        ];
    }

    private static function getContent()
    {
        $tdb = DataBase::select(" SELECT * FROM `user` WHERE id = ? ",[ $_SESSION[ 'mysession' ] ] );

        $content = '
        <div class="content">
            <h2> Вітаю! </h2>
            <h1> '.$tdb[ 'first_name' ].' '.$tdb[ 'last_name' ].' </h1>
            <p> Ви авторизувалися </p>
            <a> Вийти </a>
        </div>';
        
        return [
            $content , 
            '<script type="text/javascript" src="/js/content.js"></script>'
         ];
    }

    private static function getForm()
    {
        $form = '
        <div class="container">
            <div class="box">
                <h2>Реєстрація</h2>
                <form action="/handler/create.php" method="post" id="form-create">
                    <div>
                        <input type="text" name= "first_name" required="required">
                        <span> Ім`я </span>
                        <i></i>
                    </div>
                    
                    <div>
                        <input type="text" name= "last_name" required="required">
                        <span> Прізвище </span>
                        <i></i>
                    </div>

                    <div>
                        <input type="text" name= "email" required="required">
                        <span> Поштова скринька </span>
                        <i></i>
                    </div>

                    <div>
                        <input type="password" name= "password" required="required">
                        <span> Пароль </span>
                        <i></i>
                    </div>
                    </button>
                    <input type="submit" class="register" value="Надіслати">
                </form>
                
                <div class="box-form">
                    <h2>Увійти</h2>
                    <form action="/handler/create.php" method="post" id="form-create">
                        <div>
                            <input type="text" name= "email" required="required">
                            <span> Поштова скринька </span>
                            <i></i>
                        </div>

                        <div>
                            <input type="password" name= "password" required="required">
                            <span> Пароль </span>
                            <i></i>
                        </div>

                        <input type="submit" value="Надіслати">
                        <a href="face_scan.php" type="button" class="Face-auntefication"></a>
                    </form>
                    <div class="close"></div>
                </div>
            </div>
        </div>';

        return [
            $form ,
            '<script type="text/javascript" src="/js/form.js"></script>'
        ];
    }
}
