<?php

namespace App\Http\Controllers\intellify;

use App\Http\Controllers\Controller;
use App\Models\CodeResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    
    
    public function index(){
        $responses = CodeResponse::where('user_id', auth()->user()->id)->get(); 
        return view('app.pages.history', compact('responses'));
    }

}
