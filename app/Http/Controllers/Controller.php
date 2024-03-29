<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function failure($message, $internalCode, $statusCode) {
        $response = [
            'error' => [
                'code' => $internalCode,
                'description' => $message
            ]
        ];

        return response($response, $statusCode);
    }
}
