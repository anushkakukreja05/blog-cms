<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UsersController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware() {
        return [
            new Middleware('validateUserForAdminRevoke',only: ['revokeAdmin']),
            new Middleware('validateUserForAdminAccess',only: ['makeAdmin'])
        ];
    }

    public function create(): View
    {
        return view('auth.register');
    }
    public function index()
    {
        $users = User::paginate(10);
        // dd($users);
        return view('admin-panel.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $data = $request->only(['role']);
       $user->update($data);
        // dd($request->role);

        // $user->role = $request->role;
        // // dd($user->role);

        // $user->save();
    //     // dd($user->role);


       return redirect(route('users.index'))->with('success','Role changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function makeAdmin(Request $request, User $user) {
        $data = $request->only(['role']);
        $user->update($data);
        return redirect(route('users.index'))->with('success','Role changed successfully');
    }
    public function revokeAdmin(Request $request, User $user) {
        $data = $request->only(['role']);
        $user->update($data);
        return redirect(route('users.index'))->with('success','Role changed successfully');
    }
}
