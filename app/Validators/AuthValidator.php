<?php

namespace App\Validators;

use App\Models\User;
use App\Validators\Interfaces\ValidatorInterface;

class AuthValidator implements ValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate(array $data): array|false
    {
        $errors = [];

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $confirm_password = $data['confirm_password'] ?? '';

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

        // Проверка на существование пользователя
        if (!User::getUserByEmail($email)) {
            $errors['email'][] = 'User not exists';
        }

        if (empty($errors)) {
            return false;
        }

        return $errors;
    }
}