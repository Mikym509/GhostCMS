<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    function dashboardLoggedUser()
    {
        return view('welcome');
    }

    function login()
    {
        return view('auth.Login');
    }

    function register()
    {
        return view('auth.Register');
    }

    function save(Request $request)
    {
        //validate requests
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:4|max:15',
        ]);

        //insert data into database
        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return redirect('/')->with('Success', 'New user has been successfully added to database');
        } else {
            return back()->with('Fail', 'something gone wrong,try again!');
        }
    }

    function check(Request $request)
    {
        //validate requests
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:4|max:15',
        ]);

        $userinfo = User::where('username', '=', $request->username)->first();

        if (!$userinfo) {
            return back()->with('Fail', 'Incorrect username or password');
        } else {
            //check password
            if (Hash::check($request->password, $userinfo->password)) {
                $request->session()->put('LoggedUser', $userinfo->id);
                return redirect('/dashboard')->with("Success", "Welcome" . " " . $userinfo->name . " " . $userinfo->surname . "!");
            } else {
                return back()->with('Fail', 'Incorrect username or password');
            }
        }
    }

    function LogOut()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }

    function getUtenti()
    {
        $utenti = User::all();
        return view('welcome', ['utenti' => $utenti]);
    }

    /**
     * edit a post
     * @param string $username
     * @return \Illuminate\Http\Response;
     */

    public function editProfile($username)
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('auth.editProfile')->with($data);
    }


    /**
     * edit a post
     * @param string $username
     * @return \Illuminate\Http\Response;
     */
    public function update(Request $request, $username)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'email' => 'required',
        ]);

        User::where('username', '=', $username)
            ->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
            ]);

        return back();
    }
}