<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use App\Reponse;


class ReponsesController extends Controller
{
    public function store(Request $request) {
        $user_link = Str::uuid()->toString();
        
        //dump($request);
        $this->validate($request, [
            'reponse_typeA.*' => 'required',
            'reponse_typeB.*' => 'required|min:5|max:255', 
            'reponse_typeB.1' => 'required|email',
            'reponse_typeB.2' => 'required|numeric',
            'reponse_typeC.*' => 'required|regex:/[1-5]/'
        ],
        [
            
            'reponse_typeB.1.email' =>'Adresse email non valide',
            'reponse_typeB.2.numeric' =>'Veuillez saisir un nombre',
            'reponse_typeB.*.required' =>'Le champ est vide',
            'reponse_typeB.*.min'=> 'Le champ doit comporter 5 caractères minimum',
            'reponse_typeB.*.max'=> 'Le champ doit comporter 255 caractères maximum',
            'reponse_typeA.*.required' =>'Veuillez sélectionner une réponse',
            'reponse_typeC.*.required' =>'Veuillez sélectionner une note',
            'reponse_typeC.*.regex' =>'La note doit être comprise entre 1 et 5'
        ]
        


    );
        
                       
        $reponses = array_replace(
                        $request->reponse_typeA, 
                        $request->reponse_typeB, 
                        $request->reponse_typeC 
                        );
        
        ksort($reponses);
        
        foreach ($reponses as $key => $value) {
            Reponse::create([
                'question_id'   => $key,
                'reponse'      => $value,
                'user_link'     => $user_link
            ]);
        }
        
        
        $confirm_message ="Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
            votre investissement, nous vous préparons une application toujours plus
            facile à utiliser, seul ou en famille. <br>
            Si vous désirez consulter vos réponse ultérieurement, vous pouvez consulter
            cette adresse : <br> <a href='".url("/$user_link")."'/>" . url("/$user_link") . " </a>";
        
        

        return redirect('/')->withSuccess($confirm_message); 
        
        
        
    }
}
