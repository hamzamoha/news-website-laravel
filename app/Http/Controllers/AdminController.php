<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->check())
            return view("admin.index");
        return view("admin.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        if(request()->wantsJson()){
            return response()->json(auth()->user());
        }
    }

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
    public function login(Request $request)
    {
        $request->validate([
            "username"=> "required",
            "password"=> "required"
        ]);
        if(auth()->attempt($request->only("username","password")))
            return response()->redirectToRoute("admin.index");
        return back()->withInput()->withErrors(["error"=>"Username or Password Incorrect !"]);
    }
    public function logout(){
        auth()->logout();
        return response()->redirectToRoute("admin.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            auth()->user()[$key] = $value;
            auth()->user()->save();
        }
        return response()->json(auth()->user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($admin)
    {
        //
    }
}
