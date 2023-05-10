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
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        // $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['url'], "");
        $imageUrls = [];
        foreach ($result->data as $data) {
            $imageUrls[] = $data->url; 
        }

        // $code = new CodeResponse();
        // $code->prompt = $request->prompt;
        // $code->response = $response;
        // $code->user_id = auth()->user()->id;
        // $code->response_id = $result->toArray()['id'];
        // $code->section = 'Code Generator';
        // $code->save();

        return response()->json(['imageUrls' => $imageUrls]);
    }
}
