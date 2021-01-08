<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\IFTTTHandler;
use mysql_xdevapi\Exception;
use Psy\CodeCleaner\UseStatementPass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('list_user', $user);
        $users = User::with('posts')->get();
        $roles = Role::all();
        return view('admin.ajax-user', compact('users', 'roles'));
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
    public function store(Request $request, User $user)
    {

        $this->authorize('list_user', $user);
        try {
            DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level
            ]);

            $user->roles()->attach($request->role_id);
            DB::commit();
            return  \response()->json($user);
        } catch (\Exception $exception) {
            DB::rollBack();
        }

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
    public function edit($id, User $user)
    {
        $this->authorize('edit_user', $user);
        $userData = User::find($id);
        $userData->roles;
        return response()->json($userData);
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

        $user = User::find($id);
        $password = $user->password;
        if ($request->password) {
            $password = Hash::make($request->password);
        }
        $user->username = $request->username;
        $user->password = $password;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();
        $user->roles()->sync($request->role_id);
        return response()->json($user);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, User $user)
    {
        $this->authorize('delete_user', $user);
        User::find($id)->delete();
        return response()->json();
    }
}
