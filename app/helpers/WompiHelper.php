<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class WompiHelper
{
    public static function getToken()
    {
        $clientId = "e2439070-4953-43ed-9d72-de10e40ccc36";
        $clientSecret = "5b677c79-dab8-4c78-9be7-3ad6ecae4df4";

        $response = Http::asForm()
            ->post('https://id.wompi.sv/connect/token', [
                'grant_type' => 'client_credentials',
                'audience' => 'wompi_api',
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
