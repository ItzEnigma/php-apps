<?php

ini_set('session.use_only_cookies', 1);  // Cookies session management
ini_set('session.use_strict_mode', 1);  // Strict session management

session_set_cookie_params([
    'lifetime' => 1800,    // 30 minutes
    'path' => '/',         // The session cookie is available to the entire domain
    'domain' => 'localhost', // The session cookie is available to the example.com domain
    'secure' => true,   // The session cookie is only sent over HTTPS
    'httponly' => true,
]);

session_start();

if( isset($_SESSION["user_id"]) )
{
    if ( !isset($_SESSION["last_regeneration"]) )
    {
        regenerate_sessionID_loggedIn();
    }
    else
    {
        $interval = 60 * 30;    // 60 seconds * 30 minutes = 1800 seconds
        if ( time() - $_SESSION["last_regeneration"] >= $interval )
        {
            regenerate_sessionID_loggedIn();
        }
    }
}
else
{
    if ( !isset($_SESSION["last_regeneration"]) )
    {
        regenerate_sessionID();
    }
    else
    {
        $interval = 60 * 30;    // 60 seconds * 30 minutes = 1800 seconds
        if ( time() - $_SESSION["last_regeneration"] >= $interval )
        {
            regenerate_sessionID();
        }
    }
}

function regenerate_sessionID()
{
    session_regenerate_id();

    $user_id = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $user_id;
    session_id($sessionId);
    $_SESSION["last_regeneration"] = time();
}

function regenerate_sessionID_loggedIn()
{
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}