<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;

class GoogleDriveController extends Controller
{
    //
    public function auth()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/credentials.json'));
        $client->setRedirectUri(route('google-drive.callback'));
        $client->addScope('https://www.googleapis.com/auth/drive');

        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }

    public function callback()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/credentials.json'));
        $client->setRedirectUri(route('google-drive.callback'));

        $code = request()->get('code');

        $token = $client->fetchAccessTokenWithAuthCode($code);
        // Aqui você tem os tokens de acesso e de atualização no array $token.

        // Você também pode armazenar os tokens no banco de dados para uso posterior.

        return "Tokens obtidos com sucesso!";
    }


}
