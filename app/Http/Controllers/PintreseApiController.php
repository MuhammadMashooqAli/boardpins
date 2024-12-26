<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PintreseApiController extends Controller
{
    //
    private $clientId = "1509018";
    private $redirectUri;

    public function __construct(){
        $this->redirectUri = url("save/pinterest/access/token");
    }

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

    public function savePinterestAccess(Request $request){

        if(auth()->user()){
            $user = User::where('id', auth()->user()->id)->first();
            $user->code = $request->code;
            $user->state = $request->state;
            $user->save();
        }
        return redirect()->to('/');
    }
}
