<?php
session_start();
include('../config/conexion.php');

function login($username, $password) {
    global $conexion;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {  // En producción, usa password_verify()
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return is_logged_in() && $_SESSION['role'] === 'admin';
}

function is_employee() {
    return is_logged_in() && $_SESSION['role'] === 'employee';
}

function logout() {
    session_destroy();
}

function redirect_if_not_logged_in() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit();
    }
}

function redirect_if_not_admin() {
    if (!is_admin()) {
        header('Location: unauthorized.php');
        exit();
    }
}

function redirect_if_not_employee() {
    if (!is_employee()) {
        header('Location: unauthorized.php');
        exit();
    }
}
?>
