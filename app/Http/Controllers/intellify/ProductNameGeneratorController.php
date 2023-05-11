<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ProductNameGeneratorController extends Controller
{
    public function index(){
        return view('app.pages.product_name_generator');
    }

    public function store(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Crate some business name ideas based on these keywords: $request->prompt",
            'max_tokens' => 150,
        ]);

        $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['text'], "");

        return $response;
    }
}
