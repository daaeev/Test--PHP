<?php

namespace App\Models;

class User
{
    /**
     * Получить всех пользователей
     *
     * @return array[]
     */
    public static function getAll(): array
    {
        return [
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
    }

    /**
     * Получить пользователя по полю email
     *
     * @param string $email
     * @return array
     */
    public static function getUserByEmail(string $email): array|false
    {
        $users = self::getAll();

        $key = array_search($email, array_column($users, 'email'));

        if ($key === false) {
            return false;
        }

        return $users[$key];
    }
}
