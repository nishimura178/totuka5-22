<?php

namespace App\Http\Controllers\Group\Components;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Group\Group;
use App\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class RescueController extends Controller
{
    //
    public function rescue(Group $group,User $user){
        $info=$user->getInfoBaseByTemplate(6)->first();
        $info->partlyUpdateInfo([
            'rescue'=>config('kaigohack.rescue.rescue'),
            'group'=>$group,
            'rescuer'=>Auth::user(),
        ]);
        return redirect()->back();
    }
    //
    public function unrescue(Group $group,User $user){
        $user->getInfoBaseByTemplate(6)->first()->partlyUpdateInfo([
            'rescue'=>config('kaigohack.rescue.unrescue'),
            'group'=>null,
            'rescuer'=>null,
        ]);
        return redirect()->back();
    }
    //
    public function rescued(Group $group,User $user){
        $user->getInfoBaseByTemplate(6)->first()->partlyUpdateInfo([
            'rescue'=>config('kaigohack.rescue.rescued'),
            'group'=>$group,
            'rescuer'=>Auth::user(),
        ]);
        return redirect()->back();
    }
}
