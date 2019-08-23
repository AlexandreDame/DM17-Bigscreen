<?php

namespace App\Http\Controllers;
use App\Question;
use App\Reponse;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.stat');
    }
    

    public function questionnaire() {
        $questions = Question::all();
        return view('back.sondage', ['questions' => $questions]);
    
    }

    public function reponses() {
        $questions = Question::all();
        $reponses = Reponse::all();
        $user_link = [];
        foreach($reponses as $reponse) {
            $user_link[$reponse->user_link] = Reponse::userLink($reponse->user_link)->pluck('reponse', 'question_id');
        }
        return view('back.reponses', ['reponse' => $user_link, 'questions' => $questions]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
