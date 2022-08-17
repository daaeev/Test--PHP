<?php

namespace App\Controllers;

use App\Controllers\Interfaces\AbstractController;
use App\Core\App;
use App\Models\User;
use App\Validators\AuthValidator;

class SiteController extends AbstractController
{
    /**
     * Экшен для отображения view с формой
     *
     * @return void
     */
    public function formAction()
    {
        return $this->view('form');
    }

    /**
     * Экшен для авторизации пользователя
     *
     * @return void
     */
    public function authAction()
    {
        header('Content-type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);

            exit();
        }

        $validator = new AuthValidator;
        $errors = $validator->validate($_POST);

        if (empty($errors)) {
            echo json_encode(User::getUserByEmail($_POST['email']));
        } else {
            http_response_code(404);

            echo json_encode(['errors' => $errors]);
        }

        $logger = App::getLogger();
        $logger->makeLog();
    }
}
