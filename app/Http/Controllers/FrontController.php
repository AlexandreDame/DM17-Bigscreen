<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Reponse;

class FrontController extends Controller
{
    public function index(){
    	$questions = Question::all();

    	return view('front.index', ['questions' => $questions]);
    }


    public function userReponse(string $userLink) {
        $questions = Question::all();
        $reponses = Reponse::UserLink($userLink)->pluck('reponse', 'question_id');
        
        return view('front.user_reponse', ['questions' => $questions, 'reponses' => $reponses]);
    }
}
