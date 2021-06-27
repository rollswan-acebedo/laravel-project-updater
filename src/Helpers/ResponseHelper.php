<?php

namespace Rollswan\LaravelProjectUpdater\Helpers;

use Illuminate\Support\Facades\Http;

class ResponseHelper
{
    /**
     * Make json response
     *
     * @param int $status
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public static function make($status = 200, $message = null, $data = [])
    {
        return response()->json([
            'message' => $message,
            'result' => $data
        ], $status);
    }
    
    /**
     * Post notification message to config webhook url
     *
     * @param string $notificationMessage
     * @return \Illuminate\Support\Facades\Http
     */
    public static function postToWebhook($header = "", $notificationMessage = "")
    {
        return Http::post(config('lpu.webhook_url'), ['text' => "{$header} {$notificationMessage}"]);
    }
}
