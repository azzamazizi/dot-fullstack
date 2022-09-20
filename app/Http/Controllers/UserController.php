<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('pages.pengguna.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showarr_role = User::arr_role();
        return view('pages.pengguna.manage', compact('showarr_role'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        if(empty($id)){
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->role = $role;
            $user->save();
            $alert = 'Data berhasil ditambah';
        } else {
            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            if($user->password != $password) {
                $user->password = Hash::make($password);
            }
            $user->role = $role;
            $user->save();
            $alert = 'Data berhasil diperbarui';
        }

        return redirect('/user')->with('status', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showarr_role = User::arr_role();
        $user = User::find($id);
        return view('pages.pengguna.manage', compact('user','showarr_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('status','Data berhasil dihapus');
    }

    public function updateUser(Request $request)
    {
        $idusermod = $request->idusermod;
        $namemod = $request->namemod;
        $emailmod = $request->emailmod;
        $passwordmod_old = $request->passwordmod_old;
        $passwordmod_new = $request->passwordmod_new;

        $user = User::find($idusermod);
        $user->name = $namemod;
        $user->email = $emailmod;
        if($passwordmod_new != null){
            $user->password = Hash::make($passwordmod_new);
        }
        $user->save();
        $alert = 'User berhasil diperbarui';

        return redirect()->back()->with('status', $alert); 
    }
}
