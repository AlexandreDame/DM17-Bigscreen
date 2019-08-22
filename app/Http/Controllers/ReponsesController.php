<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Reponse;

class ReponsesController extends Controller
{
    public function store(Request $request) {
        $user_link = Str::uuid()->toString();
        
        $this->validate($request, [
            'reponse_typeA.*' => 'required',
            'reponse_typeB.*' => 'required|min:1|max:255',
            'reponse_typeC.*' => 'required|regex:/[1-5]/'
        ]);

        
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
