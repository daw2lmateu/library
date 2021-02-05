<?php
    session_start();
    $userType = $_SESSION['type'] ?? 'guest';
    $userName = $_SESSION['userName'] ?? '';
    $userId = $_SESSION['userId'] ?? -1;
    $cookies = "_31_library_cookies_31_31";

    setcookie("test_cookie", "test", time() + 3600, '/');
    $cookiesEnabled = count($_COOKIE) > 0 ? true : false;
?>