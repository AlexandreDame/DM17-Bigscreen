<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class FrontController extends Controller
{
    public function index(){
    	$questions = Question::all();

    	return view('front.index', ['questions' => $questions]);
    }
}
