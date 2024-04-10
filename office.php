<?php

require_once 'vendor/autoload.php';
require_once 'handler/google-login.php';
require_once 'class/Content.php';
require_once 'class/Database.php';

$parameters = [
    'client_id' => GOOGLE_CLIENT_ID,
    'client_secret' => GOOGLE_CLIENT_SECRET,
    'redirect_uri' => GOOGLE_REDIRECT_URI,
    'grant_type' => 'authorization_code',
    'code' => $_GET['code'],
];

$client = new \GuzzleHttp\Client();
$response = $client->post(GOOGLE_TOKEN_URI, ['form_params' => $parameters]);
$data = json_decode($response->getBody()->getContents(), true);

$token = $data['access_token'];

$response = $client->get(GOOGLE_USER_INFO_URI, [
    'headers' => [
        'Authorization' => 'Bearer ' . $token
    ]
]);

$data = json_decode($response->getBody()->getContents(), true);

// Перевірка наявності користувача з вказаною електронною адресою
$email = $data['email']; // Електронна адреса користувача отримана від Google

if (!empty($data) && !DataBase::checkEmailExists($email)) {
    // Якщо користувача з такою електронною адресою не існує, то додайте його в базу даних
    DataBase::insertGoogleUser($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>office</title>
    
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="/js/jQuery-v3.7.1.js"></script>
    
</head>
<body>
    <div class="my-account">Привіт</div>

    <?= $content[0] ?>
    <?= $content[1] ?>
</body>
</html>