<?php

namespace App\Controllers\Interfaces;

use Exception;

class AbstractController
{
    public function view(string $name, array $vars = [])
    {
        $view_name = __DIR__ . '/../../../views/' . $name . '.php';

        if (!file_exists($view_name)) {
            throw new Exception('Файл вида не найден', 500);
        }

        extract($vars);
        
        require_once $view_name;
    }
}
