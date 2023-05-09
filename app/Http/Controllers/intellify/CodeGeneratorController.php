<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodeGeneratorController extends Controller
{
    public function index(){
        return view('app.pages.code_generator');
    }
}
