<?php

namespace App\Http\Controllers;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GeneratePinsController extends Controller
{
    //
    public $hostname;

    public function index(){
       return view('generate.create');    
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


        // Extract the page title
        $pageTitle = $crawler->filter('title')->count() 
        ? $crawler->filter('title')->text() 
        : 'No title found';
 
         $crawler->filter('img')->each(function (Crawler $node) use (&$data, $pageTitle) {
            $image = $node->attr('src') ?? $node->attr('data-src'); // Image src or data-src
            $description = $node->attr('alt');                     // Image alt
            $link = null;  
        
            // Find parent <a> tag if it exists for the image link
            if ($node->ancestors()->filter('a')->count()) {
                $link = $node->ancestors()->filter('a')->first()->attr('href');
            }
        
            // Fallback: if alt is missing, use title or null
            if (!$description) {
                $description = $pageTitle ?? null;
            }
        
            // Add data only if image exists
            if ($image) {
                $data[] = [
                    'link' => "https://".$this->hostname.'/'.$link,                // Link from ancestor <a> or null
                    'description' => $description, // Alt or title
                    'image' => $image,             // Image source
                ];
            }
        });
        
 
         return $data;
        }
}
