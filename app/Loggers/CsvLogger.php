<?php

namespace App\Loggers;

use App\Loggers\Interfaces\LoggerInterface;

class CsvLogger implements LoggerInterface
{
    public function makeLog(): void
    {
        $date = date('d-j-m H:i:s');
        $response_code = http_response_code();
        $email = $_POST['email'] ?? '---';

        $file = fopen('log.log', 'a');

        fputcsv(
            $file,
            [
                'date' => $date,
                'code' => $response_code,
                'email' => $email,
            ]
        );
    }
}
