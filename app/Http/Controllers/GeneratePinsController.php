<?php

namespace App\Http\Controllers;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Schedule;
use Barryvdh\Snappy\Facades\SnappyImage;

class GeneratePinsController extends Controller
{
    //
    public $hostname;

    public function index(){
    $boards = Board::where('user_id', auth()->user()->id)->select('id', 'name')->get();
       return view('generate.create', compact('boards'));    
    }

    public function pin(Request $request){
        $data = $this->scrape($request->url);

        return response()->json($data);
    }

    public function scrape($url)
    {
        $this->hostname = parse_url($url, PHP_URL_HOST);
        
        // Fetch the HTML content
        $response = Http::get($url);
        $html = $response->body();
    
        // Parse the HTML using DomCrawler
        $crawler = new Crawler($html);
    
        $data = [];
        $pageTitle = $crawler->filter('title')->count() 
            ? $crawler->filter('title')->text() 
            : 'No title found';
    
        // Process images
        $crawler->filter('img')->each(function (Crawler $node) use (&$data, $pageTitle) {
            // Extract image URLs from possible attributes
            // $image = $node->attr('data-src') 
            //    ??  $node->attr('data-src')
            //    ??  $node->attr('src')
            //     ?? $node->attr('data-hoversrc') 
            //     ?? $node->attr('srcset');
                
            $image = $node->attr('src') ?? $node->attr('data-src'); // Image src or data-src

            // Handle srcset to extract the first URL if it contains multiple URLs
        
    
              if ($image && str_ends_with(strtolower($image), '.png')) {
               return; // Skip images with .png extension
            }
            // Find the parent <a> tag for the link
            $link = $node->ancestors()->filter('a')->count()
                ? $node->ancestors()->filter('a')->first()->attr('href')
                : null;
    
            // Normalize the image URL
            // if ($image && !preg_match('/^https?:\/\//', $image)) {
            //     $image = "https://" . $this->hostname . '/' . ltrim($image, '/');
            // }
    
            // Normalize the link URL
            if ($link && !preg_match('/^https?:\/\//', $link)) {
                $link = "https://" . $this->hostname . '/' . ltrim($link, '/');
            }
    
            // Avoid duplicates
            $existingImages = array_column($data, 'image');
            if ($image && !in_array($image, $existingImages)) {
                $data[] = [
                    'link' => $link,
                    'description' => $node->attr('alt') ?? $pageTitle,
                    'image' => $image,
                ];
            }
        });
    
        return $data;
    }

    public function generateImage()
    {
        $data = `<div class="card card-template-1">
                                <div class="card-header">
                                    <h5 class="card-title">Upper For WOMEN - ENGINE</h5>
                                    <span class="card_published_date"></span>
                                    <span class="card_board_id"></span>
                                </div>
                                <div class="website-link">
                                    <span>engine.com.pk</span>
                                </div>
                                <img src="//engine.com.pk/cdn/shop/files/LR4019-WHT_4_800x1000_crop_center.jpg?v=1735815569" class="card-img" alt="Upper For WOMEN - ENGINE">
                            </div>`;
                            $base64Image = $this->imageToBase64("https://engine.com.pk/cdn/shop/files/LR4019-WHT_4_800x1000_crop_center.jpg?v=1735815569");

        $html = view('generate.renderImage', [
                                'data' => $base64Image, // Pass data to the Blade view
                            ])->render();
       // Generate the image using SnappyImage
            $image = SnappyImage::loadHTML($html)
            ->setOption('width', 24) // Set the width
            ->setOption('height', 545) // Optionally set height
            ->output();
        return response($image)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'inline; filename="example.png"');
    }

    public function imageToBase64($url) {
        return 'data:image/jpeg;base64,' . base64_encode(file_get_contents($url));
    }

    public function scheduling(){
        $schedule = Schedule::where('id', auth()->user()->id)->first();
        return view('generate.schedule', compact('schedule'));
    }

    public function saveSchedule(Request $request){
        $validated = $request->validate([
            'pins_per_day' => 'required|string',
            'time_from' => 'required|string',
            'time_to' => 'required|string',
            'status' => 'required'
        ]);

        Schedule::updateOrCreate(
            [
                'created_by' => auth()->id(), // Check if a schedule already exists for the logged-in user
            ],
            [
                'pins_per_day' => $validated['pins_per_day'], // Update or create with these values
                'time_from' => $validated['time_from'],
                'time_to' => $validated['time_to'],
                'status' => $validated['status']
            ]
        );        

        return response()->json(['message' => 'Schedule saved successfully!'], 200);
    }
    
}
