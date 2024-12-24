<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PintreseApiController extends Controller
{
    //
    private $clientId = "1509018";
    private $redirectUri = "http://localhost/pos/pointofsale/public/auth/pinterest/callback";

    public function requestPinterestAccess(){

        $authUrl = "https://www.pinterest.com/oauth/?" . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'scope' => 'pins:read,pins:write', // Adjust based on required permissions
            'state' => csrf_token(), // Protect against CSRF
        ]);

        return redirect($authUrl);
    }
}
