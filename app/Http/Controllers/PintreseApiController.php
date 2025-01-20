<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use App\Models\Board;
use App\Models\Pin;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PintreseApiController extends Controller
{
    //
    private $clientId = "1509018";
    private $redirectUri;
    private $accessToken;
    private $clientSecretId = "324f1501b12f30feb304ad039f92778e5466304d";

    public function __construct(){
        $this->redirectUri = url("save/pinterest/access/token");
    }

    public function requestPinterestAccess(){

        $authUrl = "https://www.pinterest.com/oauth/?" . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'scope' => 'pins:read,pins:write,boards:read,boards:write', // Adjust based on required permissions
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
  
        try {
           
              // Base64 encode the client_id and client_secret
        $credentials = base64_encode($this->clientId . ':' . $this->clientSecretId);

        // Create the HTTP client
        $client = new Client();

        // Prepare the request
        $response = $client->post('https://api.pinterest.com/v5/oauth/token', [
            'headers' => [
                'Authorization' => "Basic {$credentials}",
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $request->code,
                'redirect_uri' => $this->redirectUri,
            ],
        ]);

        // Decode the response
        $data = json_decode($response->getBody()->getContents(), true);
           
            $accessToken = $data['access_token'] ?? null;
            $refreshToken = $data['refresh_token'] ?? null;

            if (auth()->user() && $accessToken) {
                // Save access token to the database for the authenticated user
                $user = User::find(auth()->user()->id);
                $user->access_token = $accessToken;
                $user->refresh_token = $refreshToken;
                $user->save();
            }
    
            return redirect('/')->with('success', 'Pinterest access token saved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to get access token: ' . $e->getMessage());
        }
    
        return redirect()->to('/');
    }

    public function savePinterestPins(Request $request)
{
    $user = Auth::user(); // Get the logged-in user

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
    }

    // Validate the request
    $request->validate([
        'cards' => 'required|array' // Ensure pins array exists
    ]);

    $savedPins = [];
    foreach ($request->cards as $index => $pin) {
        // Save the uploaded image
               // Save pin data to the database $pin
        $savedPin = Pin::create([
            'created_by' => $user->id,
            'card_html' => $pin['html'],
            'title' => $pin['title'] ?? "Pin",
            'description' => $pin['description'] ?? null,
            'board_id' => $pin['board_id'] ?? null,
            'publish_time' => $pin['publish_time'] ?? null,
            'btn_link' => $pin['btn_link'] ?? null,
            'image' => $pin['img'] ?? null,
            'status' => 'pending'
        ]);

        $savedPins[] = $savedPin;
    }

    return response()->json(['success' => true, 'savedPins' => $savedPins]);
}


public function updatePins(Request $request, $id)
{
    $user = Auth::user(); // Get the logged-in user

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
    }

    // Validate the request
    $request->validate([
        'cards' => 'required|array' // Ensure pins array exists
    ]);

    $savedPins = [];
    foreach ($request->cards as $index => $pin) {
        // Save the uploaded image
               // Save pin data to the database $pin
        $savedPin = Pin::where('created_by', auth()->user()->id)->where('id', $id)->update([
            'card_html' => $pin['html'],
            'title' => $pin['title'] ?? "Pin",
            'description' => $pin['description'] ?? null,
            'board_id' => $pin['board_id'] ?? null,
            'publish_time' => $pin['publish_time'] ?? null,
            'btn_link' => $pin['btn_link'] ?? null,
            'image' => $pin['img'] ?? null,
        ]);

        $savedPins[] = $savedPin;
    }

    return response()->json(['success' => true, 'savedPins' => $savedPins]);
}


public function deletePin(Request $request, $id)
{
    $user = Auth::user(); // Get the logged-in user

    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
    }

        // Save the uploaded image
               // Save pin data to the database $pin
        $savedPin = Pin::where('created_by', auth()->user()->id)->where('id', $id)->delete();


    return response()->json(['success' => true, 'savedPins' => $savedPins]);
}


   public function pinsHistory(Request $request){
      $user = Auth::user();
      $pins = Pin::where('created_by', auth()->user()->id)->paginate(10);
      $boards = Board::where('user_id', auth()->user()->id)->select('id', 'name')->get();
      $htmlTools = '<div class="card-toolbar">
                                    <div class="icon-group">
                                        <i class="fab fa-pinterest uploadtoPinterest"></i>
                                        <i class="fas fa-clock" onclick="enableEdit(this)"></i>
                                        <i class="fas fa-pen edit-icon" onclick="enableEdit(this)"></i>
                                        <i class="far fa-copy pin_copy"></i>
                                        <i class="fas fa-trash-alt delete_pin"></i>
                                    </div>
                                </div>';
       return view('generate.history', ['pins'=> $pins, 'boards' => $boards, 'htmlTools' => $htmlTools]);
   }

    public function getBoards()
    {
        try {
            $this->accessToken = auth()->user()->access_token;
            $this->client = new Client([
                'base_uri' => 'https://api.pinterest.com/v5/',
                'headers' => [
                    'Authorization' => "Bearer {$this->accessToken}"
                ],
            ]);
    
            $response = $this->client->get('boards');
            $boards = json_decode($response->getBody()->getContents(), true);
    
            $userId = Auth::id();
    
            foreach ($boards['items'] as $boardData) {
                Board::updateOrCreate(
                    [
                        'board_id' => $boardData['id'],
                        'user_id' => $userId
                    ],
                    [
                        'user_id' => $userId,
                        'name' => $boardData['name'],
                        'description' => $boardData['description'],
                        'privacy' => $boardData['privacy'],
                        'follower_count' => $boardData['follower_count'],
                        'collaborator_count' => $boardData['collaborator_count'],
                        'pin_count' => $boardData['pin_count'],
                        'image_cover_url' => $boardData['media']['image_cover_url'] ?? null,
                        'created_at_board' => $boardData['created_at'] ?? null,
                        'updated_at_board' => $boardData['board_pins_modified_at'] ?? null,
                    ]
                );
            }
    
            return $boards['items'] ?? [];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function uploadPintoPinterest(Request $request)
{
    try {
        // Ensure the user is authenticated
        $user = Auth::user();
        if (!$user || !$user->access_token) {
            return response()->json(['success' => false, 'message' => 'User not authenticated or missing access token'], 401);
        }

        // Validate the request
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'title' => 'required|string|max:100',
            'board_id' => 'nullable|string',
            'description' => 'nullable|string|max:500',
        ]);

        // Upload the image to a temporary location
        $image = $request->file('image');
        $imagePath = $image->store('uploads/temp', 'public');
        $imageUrl = asset('storage/' . $imagePath);

        // Prepare data for Pinterest API
        $data = [
            'board_id' => $request->board_id ?? "244531523456709811", // Default board if none provided
            'title' => "This is test",
            'description' => $request->description ?? '',
            'media_source' => [
                'source_type' => 'image_url',
                'url' => $imageUrl,
            ],
        ];

        // Send a POST request to the Pinterest API to create a pin
        $client = new Client();
        $response = $client->post('https://api.pinterest.com/v5/pins', [
            'headers' => [
                'Authorization' => "Bearer {$user->access_token}",
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $responseData = json_decode($response->getBody()->getContents(), true);

        return response()->json(['success' => true, 'data' => $responseData]);
    } catch (\Exception $e) {
        dd($e);
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

    public function contactus(Request $request){
        $request->validate([
            'question' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'textarea' => 'required|string|max:2000',
        ]);
            // Example: Contact::create($request->all());
        return response()->json(['message' => 'We have received your query! We will contact with you as soon as possible'], 200);
    }

}
