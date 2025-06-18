<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SentryTestController extends Controller
{
    public function test()
    {
        // Simulamos un error controlado
        try {
            throw new Exception('Este es un error real enviado a Sentry desde el controlador.');
        } catch (Exception $e) {
            // Captura el error con Sentry (si está instalado y configurado)
            if (app()->bound('sentry')) {
                \Sentry\captureException($e);
            }

            return response()->json([
                'status' => 'error capturado',
                'message' => $e->getMessage()
            ]);
        }
    }
}
