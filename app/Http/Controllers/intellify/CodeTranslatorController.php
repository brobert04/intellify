<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use App\Models\CodeResponse;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;


class CodeTranslatorController extends Controller
{
    public function index(){
        return view('app.pages.code_translator');
    }

    public function store(Request $request){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Translate this code from $request->from to $request->to: $request->prompt",
            'max_tokens' => 150,
        ]);

        $response = array_reduce($result->toArray()['choices'], fn(string $result, array $choice) => $result . $choice['text'], "");

        $code = new CodeResponse();
        $code->prompt = $request->prompt;
        $code->response = $response;
        $code->user_id = auth()->user()->id;
        $code->response_id = $result->toArray()['id'];
        $code->section = 'Code Translator';
        $code->save();

        return $response;
    }
}
