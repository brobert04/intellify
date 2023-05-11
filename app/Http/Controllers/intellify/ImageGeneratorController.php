<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ImageGeneratorController extends Controller
{
    public function index(){
        return view('app.pages.image_generator');
    }

    public function store(Request $request){
        $result = OpenAI::images()->create([
            'prompt' => $request->prompt,
            'n' => 4,
            'size' => '256x256',
            'response_format' => 'url',
        ]);

        $imageUrls = [];
        foreach ($result->data as $data) {
            $imageUrls[] = $data->url; 
        }

        return response()->json(['imageUrls' => $imageUrls]);
    }
}
