<?php

namespace App\Http\Controllers\Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Group\Group;
use App\Models\Role;

use Illuminate\Support\Facades\Gate;

use Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param int $group_id
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        Gate::authorize('viewAny-group-roles',$group);
        return view('group.role.index')->with([
            'group'=>$group,
            'roles'=>$group->roles()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        Gate::authorize('create-group-roles',$group);
        return view('group.role.create')->with([
            'group'=>$group,
            'roles'=>$group->roles()->get(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Group $group)
    {
        Gate::authorize('create-group-roles',$group);
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'password'=>'required|alpha_num|min:4|max:255|confirmed',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        $role=$group->createRole($request->name,$request->password);
        return redirect()->route('group.role.index',$group->id);
    }

    //
    public function edit(Group $group,int $index)
    {
        Gate::authorize('update-group-role',[$group,$index]);
        return view('group.role.edit')->with([
            'group'=>$group,
            'role'=>$group->getRoleByIndex($index),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Group $group,int $index)
    {
        Gate::authorize('update-group-role',[$group,$index]);
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'now_password'=>'nullable|alpha_num|min:4|max:255',
            'password'=>'nullable|alpha_num|min:4|max:255|confirmed',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //
        $role=$group->getRoleByIndex($index);
        //
        if($role->role_name!=$request->name){
            $role->changeName($request->name);
        }
        //
        if($request->password&&$role->checkPassword($request->now_password)){
            $role->changePassword($request->password);
        }
        return redirect()->route('group.role.index',$group->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group,int $index)
    {
        Gate::authorize('delete-group-roles',$group);
        $group->deleteRoleByIndex($index);
        return redirect()->back();
    }
}
