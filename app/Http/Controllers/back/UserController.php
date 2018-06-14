<?php

namespace App\Http\Controllers\back;

use App\Country;
use App\Http\Requests\back\UserCreateRequest;
use App\Http\Requests\back\UserEditRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('country')->get();
        return view('back.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRoles = Role::all();
        $countriesSelect = Country::countriesSelect();
        return view('back.users.create', compact('allRoles', 'countriesSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->roles()->sync($input['roles']);
        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        $allRoles = Role::all();
        $roles = $user->roles()->pluck('roles.id')->toArray();
        $countriesSelect = Country::countriesSelect();
        return view('back.users.edit', compact('user', 'allRoles', 'countriesSelect', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $input = $request->all();
        // If password field is left empty, keep old password, else bcrypt the input
        if($input['password'] == null){
            $input = array_except($input, ['password']);
        }else{
            $input['password'] = bcrypt($input['password']);
        }
        $user = User::findOrFail($id);
        $user->update($input);
        $user->roles()->sync($input['roles']);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Soft delete user and delete user-role relationship
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return redirect('admin/users');

    }
}
