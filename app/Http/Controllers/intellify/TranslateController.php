<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class TranslateController extends Controller
{
    public function index(){
        return view('app.pages.translate');
    }

    public function store(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Translate this from $request->from to $request->to: $request->prompt",
            'max_tokens' => 150,
        ]);

        $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['text'], "");

         return $response;
    }
}
