<?php

namespace App\Http\Controllers;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Board;

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
    
}
