<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_id']) AND !isset($_COOKIE['admin_access'])) {
    $_SESSION['error_message'] = "Unauthorized access!";
    header("Location: index.php");
    exit;
}

$secret_key = "9d@X!vP5bG8&kLz2";

// Decrypt the Allowed Pages from Cookies
$allowedPages = json_decode(openssl_decrypt($_COOKIE['admin_access'], 'AES-128-ECB', $secret_key), true);

// If decryption fails, expire session and redirect
if (!$allowedPages || !is_array($allowedPages)) {
    setcookie("admin_access", "", time() - 3600, "/");
    unset($_COOKIE['admin_access']);
    $_SESSION['error_message'] = "Session Expired! Please login again.";
    header("Location: index.php");
    exit;
}

// Get Current Page Name
$currentPage = basename($_SERVER['PHP_SELF']);

// Prevent Redirect Loop (Don't restrict dashboard)
if ($currentPage !== 'welcome.php' && !in_array($currentPage, $allowedPages)) {
    $_SESSION['error_message'] = "Access Denied ! You are not authorized to view this page.";
    header("Location: welcome.php"); // Redirect to dashboard
    exit;
}

?>