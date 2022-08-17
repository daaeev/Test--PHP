<?php

namespace App\Loggers;

use App\Loggers\Interfaces\LoggerInterface;

class TextLogger implements LoggerInterface
{
    public function makeLog(): void
    {
        $date = date('d-j-m H:i:s');
        $response_code = http_response_code();
        $email = $_POST['email'] ?? '---';
    
        $data = $date . ' | code:' . $response_code . ' | email:' . $email . PHP_EOL;
    
        file_put_contents('./log.log', $data);
    }
}
