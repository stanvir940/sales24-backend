<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('authentication.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $validator =  Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('reg.create');
            // return redirect()->route('registration')->withInput()->withErrors($validator);
        }


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        //echo $request->input('name').' '.$request->input('email').' '.$request->input('password'); 
        return redirect()->route('products.index')->with('success','Registration Successful');


    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        return "hello";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the login form.
     */

    public function showLoginForm()
    {
        return view('authentication.login');
    }

    

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('login.form')
                            ->withErrors($validator)
                            ->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            // Authentication successful
            // You might want to store user information in session here
            $request->session()->put('user', $user);
            return redirect()->route('products.index')->with('success', 'Login successful');
        }

        // Authentication failed
        return redirect()->route('login.form')
                        ->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        // Clear user session
        Session::flush();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login form with success message
        return redirect()->route('login.form')->with('success', 'Logged out successfully');
    }



}
