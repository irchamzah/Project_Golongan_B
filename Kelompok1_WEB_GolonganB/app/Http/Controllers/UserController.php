<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function halamanLogin(){
        return view('layouts.login');
    }

    public function halamanSignup(){
        return view('layouts.signup');
    }

    public function halamanuser(){
        return view('layouts.homeuser');

    }

    public function postsignup(Request $request){

        // User::create($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('status', 'Berhasil Mendaftar!');
    }

    public function postLogin(Request $request){

        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                // return dd(Auth::user());

                return redirect('/homeuser');

                // $students = \App\Models\Student::all();
        
                // return view('students.index', ['students'=> $students]);
            };
            
            return redirect('/login');
        
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect('/');
        // }
        // return redirect('/login');

        // $data = User::where('email', $request->email)->firstOrFail();
        // if ($data){
        //     if(Hash::check($request->password, $data->password)){
        //         session(['berhasil_login' => true]);
        //         return redirect('/');
        //     }
        // }
    }

    public function logout(){
        \Auth::logout();
        return redirect() -> route('home');
    }

    











    // public function index()
    // {
    //     //
    //     $users = \App\Models\User::all();

    //     return view('layouts.user', ['users'=> $users]);
    // }

    // public function postlogin (Request $request){
    //     // dd($request->all());
    //     if (Auth::attempt($request->only('name', 'password'))){
    //         return redirect('home');
    //     }
    //     return redirect ('login');
    // }

    // public function login()
    // {
    //     $users = \App\Models\User::all();

    //     return view('layouts.login', ['users'=> $users]);
    // }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $users = \App\Models\user::all();
        // return view('layouts.navbaruser', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
    public function destroy(User $user)
    {
        //
    }
}
