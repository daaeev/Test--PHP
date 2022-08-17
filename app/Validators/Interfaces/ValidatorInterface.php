<?php

namespace App\Validators\Interfaces;

interface ValidatorInterface
{
    /**
     * Валидирует переданные в виде массива данные
     *
     * @param array $data
     * @return array|false ошибки валидации
     */
    public function validate(array $data): array|false;
}