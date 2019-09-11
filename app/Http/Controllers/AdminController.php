<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\Reponse;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function  P_chart($Id_question){

    $labels = Question::ChoixReponse($Id_question)->pluck('choix_reponse');
    
    $labels = explode("," , $labels[0]);
    
    $question = Question::where('id', $Id_question)->pluck('question');
    
    $reponses = DB::table('reponses')->select(DB::raw('reponse,count(*)as nbReponse'))->where('question_id','=', $Id_question)->groupBy('reponse')->get();

    $data = [];
    $colors = [];
    $tabReponses = [];
           
    foreach($reponses as $reponse){
            
            $tabReponses[$reponse->reponse] = $reponse->nbReponse;
            
        }   
        foreach($labels as $value) {
            //dump($value);
            if(array_key_exists($value,$tabReponses)){
        
            array_push($data,$tabReponses[$value]);
            }
            else{
            array_push($data,0);
            }
           
            $string = random_bytes (3);
                if($string){
                    $hex = bin2hex($string);
                }
            $codeColor = "#".$hex;

            
            array_push($colors, $codeColor);
            

        }
    //dump($data);

       
    return array("question_id"=>$Id_question, "question"=>$question[0], "labels"=>$labels, "data"=>$data, "colors"=>$colors);

}

public function R_chart($Id_question){

    $labels=[];
    $reponse=[];
    
    foreach($Id_question as $value){
    
        array_push($labels, "question n°".$value);
        array_push($reponse,Reponse::all()->where('question_id', $value)->avg('reponse'));
    }
    
    return array("labels"=>$labels, "data"=>$reponse);
}


public function index() {

    $charts = array($this->P_chart('6'), $this->P_chart('7'),$this->P_chart('10'));
    $radar = $this->R_chart(array('11','12','13','14','15'));
   
    return view('back.stat', ['charts' =>$charts, 'radar'=>$radar]);

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
