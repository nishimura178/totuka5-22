<?php

namespace App\Http\Controllers\User\Components;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Info\InfoBase;

class QuestionnaireController extends Controller
{
    public function update(Request $request,InfoBase $info_base){
        $validator = Validator::make($request->all(),[
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        $info_base->updateInfoEmptyFillDefault($request->toArray()['info']); 
        return redirect()->route('user.show');
    }
    //
    public function settingForm(InfoBase $info_base){
        return view('user.components.questionnaire.setting_form')->with([
            'base'=>$info_base,
            'info'=>$info_base->info(),
            ]);
    }
    //
    public function setting(Request $request,InfoBase $info_base){
        $validator = Validator::make($request->all(),[
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        $info_base->partlyUpdateInfo($request->toArray()['info']);
        return redirect()->route('user.show');
    }
}
