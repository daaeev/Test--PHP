<?php

require_once './functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    exit();
}

header('Content-type: application/json');

$users = [
    0 => [
        'id' => 1,
        'name' => 'David',
        'email' => 'test1@gmail.com',
    ],
    1 => [
        'id' => 2,
        'name' => 'Egor',
        'email' => 'test2@gmail.com',
    ]
];

$errors = [];

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$confirm_password = $_POST['confirm_password'] ?? null;

// Введен ли емайл
if (!$email) {
    $errors['email'][] = 'Email field is required';
}

// Имеется ли в почте символ '@'
if (mb_strpos($email, '@') === false) {
    $errors['email'][] = 'Email field must contain "@"';
}

// Введен ли пароль
if (!$password) {
    $errors['password'][] = 'Password field is required';
}

// Введено ли поле для подтверждения пароля
if (!$confirm_password) {
    $errors['confirm_password'][] = 'Confirm password field is required';
}

// Проверка на равенство пароля и подтверждения пароля
if ($password !== $confirm_password) {
    $errors['password'][] = 'Password field must be equal to confirm password field';
}

$user = getUserByEmail($email, $users);

// Имеется ли такой пользователь в 'базе'
if ($user === false) {
    $errors['email'][] = 'User not found';
}

if (empty($errors)) {
    echo json_encode($user);

    exit;
} else {
    http_response_code(404);
    echo json_encode(['errors' => $errors]);

    exit;
}