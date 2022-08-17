<?php

/**
 * Получить пользователя по полю email
 *
 * @param string $email
 * @param array $users
 * @return array|false
 */
function getUserByEmail(string $email, array $users): array|false
{
    $key = array_search($email, array_column($users, 'email'));

    if ($key === false) {
        createTxtAuthLog($email, false);

        return false;
    }

    createTxtAuthLog($email);
    return $users[$key];
}

/**
 * Создать лог в текстовом формате
 *
 * @return void
 */
function createTxtAuthLog(string $email, bool $success = true): void
{
    $date = date('d-j-m H:i:s');
    $response_code = http_response_code();
    $status = $success ? 'success' : 'failed';

    $data = $date . ' | code:' . $response_code . ' | email:' . $email . ' | status:' . $status . PHP_EOL;

    file_put_contents('./log.log', $data, FILE_APPEND);
}