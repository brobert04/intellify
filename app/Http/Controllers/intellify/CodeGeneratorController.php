<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use App\Models\CodeResponse;
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
            'max_tokens' => 200,
        ]);

        $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['text'], "");

        $code = new CodeResponse();
        $code->prompt = $request->prompt;
        $code->response = $response;
        $code->user_id = auth()->user()->id;
        $code->response_id = $result->toArray()['id'];
        $code->section = 'Code Generator';
        $code->save();

        return $response;
    }
}
