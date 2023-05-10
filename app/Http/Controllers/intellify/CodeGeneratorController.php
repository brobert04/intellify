<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use OpenAI\Laravel\Facades\OpenAI;

class CodeGeneratorController extends Controller
{
    public function index(){
        return view('app.pages.code_generator');
    }

    public function store(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $request->prompt,
            'max_tokens' => 150,
        ]);

        $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['text'], "");

        return $response;
    }
}
