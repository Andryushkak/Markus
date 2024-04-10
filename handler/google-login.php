<?php
// Права доступа
const GOOGLE_SCOPES = [
    'https://www.googleapis.com/auth/userinfo.email', // доступ до адреси електронної пошти
    'https://www.googleapis.com/auth/userinfo.profile' // доступ до інформації профілю
];

// Посилання на аутентифікацію
const GOOGLE_AUTH_URI = 'https://accounts.google.com/o/oauth2/auth';

// Посилання на отримання токена
const GOOGLE_TOKEN_URI = 'https://accounts.google.com/o/oauth2/token';

// Посилання на отримання інформації про користувача
const GOOGLE_USER_INFO_URI = 'https://www.googleapis.com/oauth2/v1/userinfo';

// Client ID з кроку #3
const GOOGLE_CLIENT_ID = '1033591775727-0ppj2h2j5onkaaqi812ia550cgm3ft1m.apps.googleusercontent.com';

// Client Secret з кроку #3
const GOOGLE_CLIENT_SECRET = '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';

// Посилання з секції "Authorized redirect URIs" з кроку #3
const GOOGLE_REDIRECT_URI = 'http://markus.com/office.php';

$parameters = [
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'client_id'     => GOOGLE_CLIENT_ID,
    'scope'         => implode(' ', GOOGLE_SCOPES),
];
$url = GOOGLE_AUTH_URI . '?' . http_build_query($parameters);

